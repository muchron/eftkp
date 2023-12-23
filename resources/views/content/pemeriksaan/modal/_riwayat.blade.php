<div class="card">
    <div class="card-status-top bg-success"></div>
    <div class="card-body">
        <h5 class="card-title">RIWAYAT PERIKSA</h5>
        <div class="accordion" id="listRiwayat">

        </div>
    </div>
</div>
@push('script')
    <script>
        function salinCppt(no_rawat) {
            const formCpptRajal = $('#formCpptRajal');
            const noResep = $('#no_resep').val();
            const noRawat = formCpptRajal.find('input[name=no_rawat]').val();
            const dokter = formCpptRajal.find('input[name=nip]').val();
            // set pemeriksaan
            getPemeriksaanRalan(no_rawat).done((response) => {
                Object.keys(response).map((key, index) => {
                    const select = formCpptRajal.find(`select[name=${key}]`)
                    const input = formCpptRajal.find(`input[name=${key}]`)
                    const textarea = formCpptRajal.find(`textarea[name=${key}]`)

                    if (textarea.length) {
                        textarea.val(response[key])
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
                                                // console.log('no_RESEP', bodyResepUmum);
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
        }
        $('#listRiwayat').on('show.bs.collapse', function(e) {
            const id = e.target.id;
            const no_rawat = $(`#${id}`).data('id');
            const body = $(`#${id}`).find('.accordion-body')
            const isShow = $(`#${id}`).hasClass('collapse')

            if (isShow) {
                body.empty()
                getPemeriksaanRalan(no_rawat).done((response) => {
                    const ttv = `<div class="card mb-1">
                            <div class="ribbon bg-red">TTV</div>
                            <div class="card-body card-text">
                                <div class="row gy-2">
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Suhu : ${response.suhu_tubuh} °C
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Tinggi : ${response.tinggi} cm
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Berat : ${response.berat} Kg
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Tensi : ${response.tensi} mmHg
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Respirasi : ${response.respirasi} x/mnt
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Nadi : ${response.nadi} x/mnt
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        SpO² : ${response.spo2} %
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        GCS : ${response.gcs} (E,V,M)
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Kesadaran : ${response.kesadaran}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Alergi : ${response.alergi}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Lingkar Perut : ${response.lingkar_perut} cm
                                    </div>
                                </div>
                            </div>
                        </div>`
                    const pemeriksaan = `<div class="card mb-1">
                            <div class="ribbon bg-red">SOAP</div>
                            <div class="card-body card-text">
                                <div class="row gy-2">
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <strong>Subjek </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.keluhan)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <strong>Objek </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.pemeriksaan)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                       <strong> Asesmen </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.penilaian)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <strong>Plan </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.rtl)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <strong>Instruksi </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.instruksi)}
                                    </div>

                                </div>
                                <button class="btn btn-sm btn-primary mt-3" type="button" onclick="salinCppt('${response.no_rawat}')">
                                    <i class="ti ti-copy"></i> Copy CPPT
                                </button>
                            </div>
                        </div>`
                    body.append([ttv, pemeriksaan]).hide().fadeIn()
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
