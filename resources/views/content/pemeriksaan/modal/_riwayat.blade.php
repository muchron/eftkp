<div class="card">
    <div class="card-status-top bg-success"></div>
    <div class="card-body">
        <h5 class="card-title">RIWAYAT PERIKSA</h5>
        <div class="accordion" id="listRiwayat" style="max-height: 460px;overflow:scroll">

        </div>
    </div>
</div>
@push('script')
    <script>
        function salinCppt(no_rawat, nip) {
            const formCpptRajal = $('#formCpptRajal');
            const noResep = $('#no_resep').val();
            const noRawat = formCpptRajal.find('input[name=no_rawat]').val();
            const dokter = formCpptRajal.find('input[name=nip]').val();

            // set pemeriksaan
            getPemeriksaanRalan(no_rawat, nip).done((response) => {
                Object.keys(response).map((key, index) => {
                    const select = formCpptRajal.find(`select[name=${key}]`)
                    const input = formCpptRajal.find(`input[name=${key}]`)
                    const textarea = formCpptRajal.find(`textarea[name=${key}]`)

                    if (textarea.length) {
                        textarea.val(response[key] ? response[key] : '-')
                    } else {
                        textarea.val('0')
                    }
                    if (input.length) {
                        if (key != 'no_rawat') {
                            input.val(response[key])
                        }
                    } else {
                        input.val('-')
                    }
                    if (select.length) {
                        select.find(`option:contains("${response[key]}")`).attr('selected', 'selected')
                    }
                })

            })

            //copy resep
            getResep({
                no_rawat: no_rawat
            }).done((resep) => {
                if (resep.length || (resep.resep_dokter || resep.resep_racikan)) {
                    Swal.fire({
                        title: "Terdapat resep pada pemeriksaan ini",
                        html: "apakah anda akan menggunakan resep yang sama ?",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Iya, Salin",
                        cancelButtonText: "Tidak"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (!noResep) {
                                createResepObat(noRawat, 'ralan', dokter).done((response) => {
                                    btnTambahResep.removeClass('btn-primary').addClass('btn-danger');
                                    btnTambahResep.attr('onclick', `hapusResep('${noRawat}')`)
                                    btnTambahResep.text('Hapus Resep')
                                    btnCetakResep.attr('onclick', `cetakResep('${noRawat}')`)
                                    btnCetakResep.removeClass('d-none')
                                    $('#no_resep').val(response.no_resep)
                                }).fail((request) => {
                                    alertErrorAjax(request)
                                })
                            }

                            getResep({
                                no_rawat: no_rawat
                            }).done((resep) => {
                                if (resep.length) {
                                    resep.forEach((res, index) => {
                                        let dataObat = '';
                                        let resepRacik = '';
                                        let resepRacikDetail = '';
                                        if (res.resep_dokter.length) {
                                            dataObat = res.resep_dokter.map((resDokter) => {
                                                delete resDokter.obat
                                                resDokter.no_resep = $('#no_resep').val();
                                                return resDokter
                                            })
                                            $.post('resep/dokter/create', {
                                                dataObat
                                            }).done((response) => {
                                                setResepDokter(dataObat[0].no_resep)
                                                alertSuccessAjax('Resep umum berhasil ditambah');
                                            })

                                        }
                                        if (res.resep_racikan.length) {
                                            resepRacik = res.resep_racikan.map((resRacik) => {
                                                delete resRacik.metode
                                                resepRacikDetail = resRacik.detail;
                                                resRacik.no_resep = $('#no_resep').val();
                                                delete resRacik.detail
                                                return resRacik
                                            })

                                            resepRacikDetail = resepRacikDetail.map((resRacikDetail) => {
                                                delete resRacikDetail.obat;
                                                resRacikDetail.no_resep = $('#no_resep').val();
                                                return resRacikDetail;
                                            })
                                            createResepRacikan(resepRacik).done((resposeRacik) => {
                                                createDetailRacikan(resepRacik.no_resep, resepRacik.no_racik, resepRacikDetail).done((responseDetail) => {
                                                    setResepRacikan(resepRacik[0].no_resep)
                                                    alertSuccessAjax('Resep racikan berhasil ditambah');
                                                })
                                            })
                                        }
                                    })
                                } else {
                                    deleteResep(no_rawat).done((response) => {
                                        $('#no_resep').val('');
                                        btnTambahResep.removeClass('btn-danger').addClass('btn-primary');
                                        btnTambahResep.text('Buat Resep')
                                        btnTambahResep.attr('onclick', `tambahResep('${noRawat}')`)

                                        btnSimpanObat.addClass('d-none')
                                        btnTambahObat.addClass('d-none')
                                        tabelResepUmum.addClass('d-none')
                                        tabelResepUmum.find('tbody').empty();

                                        btnTambahRacikan.addClass('d-none')
                                        tabelResepRacikan.addClass('d-none')
                                        btnSimpanRacikan.addClass('d-none')
                                        tabelResepRacikan.find('tbody').empty();
                                        btnCetakResep.addClass('d-none')
                                    }).fail((request) => {
                                        alertErrorAjax(request)
                                    })
                                }
                            })
                        }
                    });

                }
            })

            // copy diagnosa
            getDiagnosaPasien(no_rawat).done((resDiagnosa) => {
                if (resDiagnosa.length) {
                    const diagnosa = resDiagnosa.map((dx) => {
                        return {
                            no_rawat: noRawat,
                            kd_penyakit: dx.kd_penyakit,
                            prioritas: dx.prioritas,
                        }
                    })
                    // copy diagnosa
                    $.post('diagnosa/pasien/create', {
                        data: diagnosa
                    }).fail((request) => {
                        alertErrorAjax(request)
                    })
                }

            })

            // copy tindakan/prosedur
            getTindakanPasien(no_rawat).done((resTindakan) => {
                if (resTindakan.length) {
                    const tindakan = resTindakan.map((px) => {
                        return {
                            no_rawat: noRawat,
                            kode: px.kode,
                            prioritas: px.prioritas
                        }
                    });

                    $.post('prosedur/pasien/create', {
                        data: tindakan
                    }).fail((request) => {
                        alertErrorAjax(request)
                    })
                }
            })

        }
        $('#listRiwayat').on('show.bs.collapse', function(e) {
            const id = e.target.id;
            const no_rawat = $(`#${id}`).data('id');
            const body = $(`#${id}`).find('.accordion-body')
            const isShow = $(`#${id}`).hasClass('collapse')

            if (isShow) {
                body.empty()
                getPemeriksaanRalan(no_rawat).done((response) => {
                    response.map((result) => {
                        const ttv = `<div class="card mb-1">
                                <div class="ribbon bg-red">TTV</div>
                                <div class="card-body card-text">
                                    <div class="row gy-2">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Suhu : ${result.suhu_tubuh} °C
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Tinggi : ${result.tinggi} cm
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Berat : ${result.berat} Kg
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Tensi : ${result.tensi} mmHg
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Respirasi : ${result.respirasi} x/mnt
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Nadi : ${result.nadi} x/mnt
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            SpO² : ${result.spo2} %
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            GCS : ${result.gcs} (E,V,M)
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Kesadaran : ${result.kesadaran}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Alergi : ${result.alergi}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            Lingkar Perut : ${result.lingkar_perut} cm
                                        </div>
                                    </div>
                                </div>
                            </div>`
                        const pemeriksaan = `<div class="card mb-1">
                                <div class="ribbon bg-red">SOAP</div>
                                <div class="card-body card-text">
                                    <div class="row gy-2">
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <strong>Petugas/Dokter </strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${result.rujuk_internal ? result.rujuk_internal.dokter.nm_dokter : result.pegawai.nama}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <strong>Poliklinik</strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${result.rujuk_internal ? result.rujuk_internal.poliklinik.nm_poli : result.reg_periksa.poliklinik.nm_poli}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <strong>Subjek </strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${stringPemeriksaan(result.keluhan)}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <strong>Objek </strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${stringPemeriksaan(result.pemeriksaan)}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                           <strong> Asesmen </strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${stringPemeriksaan(result.penilaian)}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <strong>Plan </strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${stringPemeriksaan(result.rtl)}
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <strong>Instruksi </strong>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                             : ${stringPemeriksaan(result.instruksi)}
                                        </div>
    
                                    </div>
                                    <button class="btn btn-sm btn-primary mt-3" type="button" onclick="salinCppt('${result.no_rawat}', '${result.nip}')">
                                        <i class="ti ti-copy"></i> Copy CPPT
                                    </button>
                                </div>
                            </div>`
                        body.append([ttv, pemeriksaan]).hide().fadeIn()
                    })
                    // }
                })
            }
        });

        function setRiwayat(no_rkm_medis) {
            $('#listRiwayat').empty()
            $.get('pasien/riwayat', {
                no_rkm_medis: no_rkm_medis
            }).done((response) => {
                const regPeriksa = response.reg_periksa.map((regPeriksa, index) => {
                    const diagnosa = regPeriksa.diagnosa.map((diagnosa) => {
                        if (diagnosa.prioritas == 1) {
                            return `${diagnosa.kd_penyakit} ${diagnosa.penyakit.nm_penyakit}`
                        }
                    }).join('')
                    return `<div class="accordion-item">
                                <h2 class="accordion-header" id="heading-${index}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${index}" aria-expanded="true" aria-controls="collapse-${index}">
                                        ${formatTanggal(regPeriksa.tgl_registrasi)} : ${diagnosa}
                                    </button>
                                </h2>
                                <div id="collapse-${index}" class="accordion-collapse collapse" data-bs-parent="#listRiwayat" data-id="${regPeriksa.no_rawat}">
                                    <div class="accordion-body pt-0">
                                        
                                    </div>
                                </div>
                            </div>`
                })
                $('#listRiwayat').append(regPeriksa)
            })
        }
    </script>
@endpush
