<form action="" method="post" id="formCpptRajal">
    <div class="row">
        <div class="col-md-6 col-xl-3 col-lg-3">
            <div class="mb-1">
                <label class="form-label">No. Rawat</label>
                <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="no_rawat" readonly>
                <input value="" type="hidden" name="stts" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 col-lg-6">
            <div class="mb-1">
                <label class="form-label">Pasien</label>
                <div class="input-group mb-2">
                    <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="no_rkm_medis" readonly>
                    <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control w-50" name="nm_pasien" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-lg-3">
            <div class="mb-1">
                <label class="form-label">Tgl. Lahir / Umur</label>
                <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="tgl_lahir" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-lg-4">
            <div class="mb-1">
                <label class="form-label">Pembiayaan</label>
                <div class="input-group mb-2">
                    <input value="-" type="text" class="form-control" name="pembiayaan" readonly>
                    <input value="-" type="text" class="form-control w-50" name="no_peserta" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 col-lg-3">
            <div class="mb-1">
                <label class="form-label">Poliklinik</label>
                <input value="-" type="text" class="form-control" name="nm_poli" readonly>
                <input value="-" type="hidden" name="kd_poli_pcare" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-5 col-lg-5">
            <div class="mb-1">
                <label class="form-label">Alergi</label>
                <select class="form-control" name="alergi" multiple="multiple" id="alergi" style="width:100%"></select>
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
                    <textarea class="form-control" rows="6" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="keluhan">-</textarea>
                </div>
            </div>
            <div class="col-xl-12 mb-2">
                <div class="mb-1">
                    <label class="form-label">Objek</label>
                    <textarea class="form-control" rows="6" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="pemeriksaan">-</textarea>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Suhu</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="suhu_tubuh">
                        <span class="input-group-text">
                            °C
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Tinggi</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tinggi">
                        <span class="input-group-text">
                            cm
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Berat</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="berat">
                        <span class="input-group-text">
                            Kg
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Tensi</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tensi">
                        <span class="input-group-text">
                            mmHg
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Respirasi</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="respirasi">
                        <span class="input-group-text">
                            x/mnt
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Nadi (/mnt)</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="nadi">
                        <span class="input-group-text">
                            x/mnt
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">SpO²</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="spo2">
                        <span class="input-group-text">
                            %
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">GCS</label>
                    <div class="input-group input-group-flat">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="gcs">
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
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="lingkar_perut">
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
                    <textarea class="form-control" rows="6" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="penilaian">-</textarea>
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
                    <textarea class="form-control" rows="6" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="instruksi">-</textarea>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="mb-1">
                    <label class="form-label">Plan</label>
                    <textarea class="form-control" rows="6" value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="rtl">-</textarea>
                </div>
            </div>
    </fieldset>
</form>
@include('content.pemeriksaan.modal._modalKunjunganPcare')
@include('content.pemeriksaan.modal._modalReferensiSpesialis')
@include('content.pemeriksaan.modal._modalReferensiSubSpesialis')
@include('content.pemeriksaan.modal._modalReferensiSpesialisKhusus')
@include('content.pemeriksaan.modal._modalReferensiRujukan')
@include('content.pemeriksaan.modal._modalReferensiPoliFktp')
@include('content.pemeriksaan.modal._modalReferensiTacc')
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
        var inputAlergi = $('#formCpptRajal').find('#alergi')

        function insertDiagnosaPasien(no_rawat, kd_diagnosa, status) {
            const insert = $.post(`${url}/diagnosa/pasien/create`, {
                no_rawat: no_rawat,
                kd_penyakit: kd_diagnosa,
                status: status,
            })

            return insert;
        }

        function getPemeriksaanRalan(no_rawat, nip = '') {
            const pemeriksaan = $.get(`${url}/pemeriksaan/ralan/show`, {
                no_rawat: no_rawat,
                nip: nip
            })
            return pemeriksaan;
        }

        $('#selecInstruksi').select2({
            dropdownParent: $('#modalCppt'),
            ajax: {
                url: `${url}/penyakit/get`,
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

        function createAlergi(data) {
            $.post(`${url}/pasien/alergi`, {
                no_rkm_medis: data.no_rkm_medis,
                alergi: data.alergi
            })
        }

        function simpanPemeriksaanRalan() {

            const element = ['input', 'textarea'];
            const data = getDataForm('formCpptRajal', element);
            const selectKesadaran = $('#formCpptRajal select[name=kesadaran]');
            const pembiayaan = $('#formCpptRajal input[name=pembiayaan]').val();
            const no_peserta = $('#formCpptRajal input[name=no_peserta]').val();
            const no_rkm_medis = $('#formCpptRajal input[name=no_rkm_medis]').val();
            const nm_pasien = $('#formCpptRajal input[name=nm_pasien]').val();
            data['kesadaran'] = selectKesadaran.find('option:selected').text();

            const alergi = inputAlergi.val().map((val) => {
                return val;
            })
            data['alergi'] = alergi.join(', ');
            $.post(`${url}/pemeriksaan/ralan/create`, data).done((response) => {
                createAlergi({
                    no_rkm_medis: data['no_rkm_medis'],
                    alergi: alergi
                })
                if (pembiayaan === 'BPJS') {
                    Swal.fire({
                        title: "Informasi",
                        html: "Pasien merupakan peserta BPJS, <br/> lanjutkan input data kunjungan Pcare ?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Lanjut",
                        cancelButtonText: "Tidak"
                    }).then((result) => {
                        if (!result.isConfirmed) {
                            alertSuccessAjax().then(() => {
                                $('#modalCppt').modal('hide');
                                const stts = data['stts'] == 'Belum' ? 'Sudah' : data['stts'];
                                setStatusLayan(data['no_rawat'], stts)
                                loadTabelRegistrasi(tglAwal, tglAkhir)
                            })
                            return false;
                        }
                        setStatusLayan(data['no_rawat'], 'Sudah')
                        data['no_peserta'] = no_peserta;
                        data['no_rkm_medis'] = no_rkm_medis;
                        data['nm_pasien'] = nm_pasien;
                        data['kd_sadara'] = selectKesadaran.val();
                        showModalKunjunganPcare(data);
                    });

                } else {
                    alertSuccessAjax().then(() => {
                        $('#modalCppt').modal('hide');
                        const stts = data['stts'] == 'Belum' ? 'Sudah' : data['stts'];
                        setStatusLayan(data['no_rawat'], stts);
                        loadTabelRegistrasi(tglAwal, tglAkhir)
                    })
                }

            }).fail((request) => {
                alertErrorAjax(request)
            });
        }

        function isAlergi(data) {
            return isAlegi = data || data == '-' ? true : false;
        }

        function selectAlergi(element, parent) {
            const select2 = element.select2({
                dropdownParent: parent,
                delay: 0,
                tags: true,
                scrollAfterSelect: true,
                ajax: {
                    url: `${url}/pasien/alergi`,
                    dataType: 'JSON',

                    data: (params) => {
                        const query = {
                            alergi: params.term
                        }
                        return query
                    },
                    processResults: (data) => {
                        return {
                            results: data.map((item) => {
                                const items = {
                                    id: item.alergi,
                                    text: item.alergi,
                                }
                                return items;
                            })
                        }
                    }

                },
                cache: true

            });

            return select2;
        }
    </script>
@endpush
