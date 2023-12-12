<form action="" method="post" id="formCpptRajal">
    <div class="row">
        <div class="col-md-6 col-xl-3 col-lg-3">
            <div class="mb-1">
                <label class="form-label">No. Rawat</label>
                <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="no_rawat" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 col-lg-6">
            <div class="mb-1">
                <label class="form-label">Pasien</label>
                <div class="input-group mb-2">
                    <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="no_rkm_medis" readonly>
                    <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control w-50" name="nm_pasien" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-lg-3">
            <div class="mb-1">
                <label class="form-label">Tgl. Lahir / Umur</label>
                <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="tgl_lahir" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-lg-4">
            <div class="mb-1">
                <label class="form-label">Pembiayaan</label>
                <div class="input-group mb-2">
                    <input autocomplete="off" value="-" type="text" class="form-control" name="pembiayaan" readonly>
                    <input autocomplete="off" value="-" type="text" class="form-control w-50" name="no_peserta" readonly>
                    <input autocomplete="off" value="-" type="hidden" name="kdDiagnosa1" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-lg-3">
            <div class="mb-1">
                <label class="form-label">Poliklinik</label>
                <input autocomplete="off" value="-" type="text" class="form-control" name="nm_poli" readonly>
                <input autocomplete="off" value="-" type="hidden" name="kd_poli_pcare" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-5 col-lg-5">
            <div class="mb-1">
                <label class="form-label">Alergi</label>
                <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="alergi">
            </div>
        </div>
    </div>
    <fieldset class="form-fieldset">
        <div class="row">
            <div class="col-xl-12">
                <div class="mb-1">
                    <label class="form-label">Dokter</label>
                    <div class="input-group mb-2">
                        <input class="form-control" name="nip" id="nip" readonly>
                        <input class="form-control w-50" name="nm_dokter" readonly>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="mb-1">
                    <label class="form-label">Subjek</label>
                    <textarea class="form-control" rows="6" autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="keluhan">-</textarea>
                </div>
            </div>
            <div class="col-xl-12 mb-2">
                <div class="mb-1">
                    <label class="form-label">Objek</label>
                    <textarea class="form-control" rows="6" autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="pemeriksaan">-</textarea>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Suhu</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="suhu_tubuh">
                        <span class="input-group-text">
                            °C
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Tinggi</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tinggi">
                        <span class="input-group-text">
                            cm
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Berat</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="berat">
                        <span class="input-group-text">
                            Kg
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Tensi</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tensi">
                        <span class="input-group-text">
                            mmHg
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Respirasi</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="respirasi">
                        <span class="input-group-text">
                            x/mnt
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Nadi (/mnt)</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="nadi">
                        <span class="input-group-text">
                            x/mnt
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">SpO²</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="spo2">
                        <span class="input-group-text">
                            %
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">GCS</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="gcs">
                        <span class="input-group-text">
                            (E,V,M)
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Kesadaran</label>
                    <select class="form-select" name="kesadaran">
                        <option value="01">Compos Mentis</option>
                        <option value="02">Somnolence</option>
                        <option value="03">Sopor</option>
                        <option value="04">Coma</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Lingkar Perut</label>
                    <div class="input-group input-group-flat">
                        <input autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="lingkar_perut">
                        <span class="input-group-text">
                            cm
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">
                        Asesmen
                        <a href="javascript:void(0)" id="btnDiagnosaPasien">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="-5 -5 24 30" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg>
                        </a>
                    </label>
                    <textarea class="form-control" rows="6" autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="penilaian">-</textarea>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">
                        Instruksi
                        <a href="javascript:void(0)" id="btnTindakanPasien">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="-5 -5 24 30" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg>
                        </a>
                    </label>
                    <textarea class="form-control" rows="6" autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="instruksi">-</textarea>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Plan</label>
                    <textarea class="form-control" rows="6" autocomplete="off" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="rtl">-</textarea>
                </div>
            </div>
    </fieldset>
</form>
@include('content.pemeriksaan.modal._modalKunjunganPcare')
@include('content.pemeriksaan.modal._modalReferensiSpesialis')
@include('content.pemeriksaan.modal._modalReferensiSubSpesialis')
@include('content.pemeriksaan.modal._modalReferensiRujukan')
@push('script')
    <script>
        var btnTambahResep = $('#btnTambahResep')
        var btnTambahObat = $('#btnTambahObat')
        var btnTambahRacikan = $('#btnTambahRacikan')
        var btnSimpanObat = $('#btnSimpanResep')
        var btnSimpanRacikan = $('#btnSimpanRacikan')
        var btnCetakResep = $('#btnCetakResep')
        var tabelResepUmum = $('#tabelResepUmum')
        var tabelResepRacikan = $('#tabelResepRacikan')

        function insertDiagnosaPasien(no_rawat, kd_diagnosa, status) {
            const insert = $.post('diagnosa/pasien/create', {
                no_rawat: no_rawat,
                kd_penyakit: kd_diagnosa,
                status: status,
            })

            return insert;
        }

        function getPemeriksaanRalan(no_rawat) {
            const pemeriksaan = $.get('pemeriksaan/ralan/show', {
                no_rawat: no_rawat
            })
            return pemeriksaan;
        }

        $('#selecInstruksi').select2({
            dropdownParent: $('#modalCppt'),
            ajax: {
                url: 'penyakit/get',
                dataType: 'JSON',
                data: (params) => {
                    const query = {
                        penyakit: params.term,
                    }
                    return query
                },
                processResults: (data) => {
                    return {
                        results: data.map((item) => {
                            const res = {
                                text: `${item.kd_penyakit} - ${item.nm_penyakit}`,
                                id: item.kd_penyakit
                            }
                            return res;
                        })
                    }
                },
                cache: true,

            }
        })

        $('#selecInstruksi').on('select2:select', function(e) {
            const element = e.params.data.element
            const kdPenyakit = e.params.data.id;
            const noRawat = $('#modalCppt input[name=no_rawat]').val();
            const status = 'Ralan';
            insertDiagnosaPasien(noRawat, kdPenyakit, status).done((response) => {}).fail((request) => {
                alertErrorAjax(request)
                element.detach()

            });
        });



        function modalCppt(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                console.log('RESPONSE ===', response);
                $('#formCpptRajal input[name=no_rawat]').val(no_rawat)
                $('#formCpptRajal input[name=no_rkm_medis]').val(response.no_rkm_medis)
                $('#formCpptRajal input[name=nm_pasien]').val(`${response.pasien.nm_pasien} / ${response.pasien.jk == 'L' ? 'Laki-laki' : 'Perempuan'}`)
                $('#formCpptRajal input[name=tgl_lahir]').val(`${formatTanggal(response.pasien.tgl_lahir)} / ${response.umurdaftar} ${response.sttsumur}`)
                $('#formCpptRajal input[name=keluarga]').val(`${response.pasien.keluarga} : ${response.pasien.namakeluarga}`)
                $('#formCpptRajal input[name=pembiayaan]').val(`${response.penjab.png_jawab}`)
                $('#formCpptRajal input[name=nip]').val(`${response.kd_dokter}`)
                $('#formCpptRajal input[name=nm_dokter]').val(`${response.dokter.nm_dokter}`)
                $('#formCpptRajal input[name=pembiayaan]').val(`${response.penjab.png_jawab}`)
                $('#formCpptRajal input[name=no_peserta]').val(`${response.pasien.no_peserta}`)
                $('#formCpptRajal input[name=kd_poli]').val(`${response.kd_poli}`)
                $('#formCpptRajal input[name=nm_poli]').val(`${response.poliklinik.nm_poli}`)
                $('#formCpptRajal input[name=kd_poli_pcare]').val(`${response.poliklinik.maping.kd_poli_pcare}`)
                $('#formKunjunganPcare input[name=tgl_daftar]').val(`${splitTanggal(response.tgl_registrasi)}`)
                $('#formKunjunganPcare input[name=nm_poli_pcare]').val(`${response.poliklinik.maping.nm_poli_pcare}`)
                $('#formKunjunganPcare input[name=kd_dokter_pcare]').val(`${response.dokter.maping.kd_dokter_pcare}`)
                $('#btnTambahResep').attr('onclick', `tambahResep('${no_rawat}')`)
                $('#btnDiagnosaPasien').attr('onclick', `diagnosaPasien('${no_rawat}')`);
                $('#btnTindakanPasien').attr('onclick', `tindakanPasien('${no_rawat}')`);
                setRiwayat(response.no_rkm_medis)
                getResep({
                    no_rawat: no_rawat,
                }).done((resep) => {
                    tabelResepUmum.find('tbody').empty()
                    if (resep.length) {
                        resep.map((res) => {
                            btnTambahResep.attr('onclick', `hapusResep('${no_rawat}')`)
                            $(`#no_resep`).val(res.no_resep);

                            if (res.resep_dokter.length)
                                setResepDokter(res.no_resep);
                            if (res.resep_racikan.length)
                                setResepRacikan(res.no_resep)
                        })
                        btnTambahResep.removeClass('btn-primary').addClass('btn-danger');
                        btnTambahResep.text('Hapus Resep')
                        btnCetakResep.attr('onclick', `cetakResep({no_rawat:'${no_rawat}'})`)
                        tabelResepUmum.removeClass('d-none')
                        tabelResepRacikan.removeClass('d-none')
                        btnSimpanObat.removeClass('d-none')
                        btnSimpanRacikan.removeClass('d-none')
                        btnTambahObat.removeClass('d-none')
                        btnTambahRacikan.removeClass('d-none')
                        btnCetakResep.removeClass('d-none')
                    }
                });

                getPemeriksaanRalan(no_rawat).done((pemeriksaan) => {
                    if (pemeriksaan) {
                        Object.keys(pemeriksaan).map((key, index) => {
                            select = $(`#formCpptRajal select[name=${key}]`);
                            input = $(`#formCpptRajal input[name=${key}]`);
                            textarea = $(`#formCpptRajal textarea[name=${key}]`);

                            if (textarea.length) {
                                textarea.val(pemeriksaan[key])
                            }
                            if (input.length) {
                                input.val(pemeriksaan[key])
                            }
                            if (select.length) {
                                select.find(`option:contains("${pemeriksaan[key]}")`).attr('selected', 'selected')
                            }
                        })
                    }
                })
            })
            $('#modalCppt').modal('show')
        }


        function simpanPemeriksaanRalan() {

            const element = ['input', 'textarea'];
            // const exception = ['keluarga', 'no_rkm_medis', 'nm_pasien', 'tgl_lahir', 'pembiayaan', 'nm_dokter', 'no_resep', 'no_peserta', 'kdDiagnosa1', 'alamat', 'heartRate', 'nm_poli'];
            const data = getDataForm('formCpptRajal', element);
            const selectKesadaran = $('#formCpptRajal select[name=kesadaran]');
            const pembiayaan = $('#formCpptRajal input[name=pembiayaan]').val();
            const no_peserta = $('#formCpptRajal input[name=no_peserta]').val();
            const heart_rate = $('#formCpptRajal input[name=heartRate]').val();
            const no_rkm_medis = $('#formCpptRajal input[name=no_rkm_medis]').val();
            const nm_pasien = $('#formCpptRajal input[name=nm_pasien]').val();
            data['kesadaran'] = selectKesadaran.find('option:selected').text();
            console.log('DATA ===', data);
            $.post('pemeriksaan/ralan/create', data).done((response) => {

                if (pembiayaan === 'BPJS') {
                    data['no_peserta'] = no_peserta;
                    data['heart_rate'] = heart_rate;
                    data['no_rkm_medis'] = no_rkm_medis;
                    data['nm_pasien'] = nm_pasien;
                    data['kd_sadara'] = selectKesadaran.val();
                    showModalKunjunganPcare(data);
                    // $.post('bridging/pcare/kunjungan/post', data).done((result) => {
                    //     console.log('RESULT ===', result);
                    // })
                }


                // alertSuccessAjax(response).then(() => {
                //     loadTabelRegistrasi(localStorage.getItem('tglAwal'), localStorage.getItem('tglAkhir'))
                //     $('#modalCppt').modal('hide');
                //     setStatusLayan(data['no_rawat'], 'Sudah');
                // })
            }).fail((request) => {
                alertErrorAjax(request)
            });
        }
    </script>
@endpush
