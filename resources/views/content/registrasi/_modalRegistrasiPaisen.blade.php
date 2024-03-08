<div class="modal modal-blur fade" id="modalRegistrasi" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Registrasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formRegistrasiPoli">
                    <fieldset class="form-fieldset">
                        <div class="row gy-2">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="row gy-2">
                                    <div class="col-xl-5 col-md-12 col-sm-12">
                                        <label class="form-label required">No. Reg</label>
                                        <div class="input-group">
                                            <input type="text" name="no_reg" id="no_reg" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" disabled="">
                                            <span class="input-group-text">
                                                <input class="form-check-input m-0" type="checkbox" checked="" id="checkNoReg" name="checkNoReg">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-md-12 col-sm-12">
                                        <label for="no_rawat" class="form-label">No. Rawat</label>
                                        <input type="text" class="form-control" name="no_rawat" id="no_rawat" />
                                    </div>
                                    <div class="col-xl-6 col-md-12 col-sm-12">
                                        <label for="tgl_registrasi" class="form-label">Tgl Registrasi</label>
                                        <input type="text" class="form-control filterTangal" name="tgl_registrasi" id="tgl_registrasi" value="{{ date('d-m-Y') }}" />
                                    </div>
                                    <div class="col-xl-6 col-md-12 col-sm-12">
                                        <label for="jam_reg" class="form-label">Jam</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control jam" name="jam_reg" id="jam_reg" value="{{ date('H:i:s') }}" readonly />
                                            <span class="input-group-text">
                                                <input class="form-check-input m-0 checkJam" type="checkbox" checked="" id="" name="checkjam">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <label for="kd_dokter" class="form-label">Dokter</label>
                                        <select class="form-select" name="kd_dokter" id="kd_dokter" style="width: 100%"></select>
                                        <input type="hidden" name="kd_dokter_pcare">
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <label for="kd_poli" class="form-label">Poliklinik/Unit</label>
                                        <select class="form-select" name="kd_poli" id="kd_poli" style="width: 100%"></select>
                                        <input type="hidden" name="kd_poli_pcare">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="row gy-2">
                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <label for="no_rkm_medis">No. RM</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="no_rkm_medis" id="no_rkm_medis" value="" readonly />
                                            <input type="text" class="form-control w-50" name="nm_pasien" id="nm_pasien" value="" readonly />
                                            <input type="text" class="form-control" name="umurdaftar" id="umurdaftar" value="" readonly />
                                            <input type="hidden" name="umur" id="umur" value="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-12 col-sm-12">
                                        <label for="namakeluarga">KK/Penanggung</label>
                                        <input type="text" class="form-control" name="namakeluarga" id="namakeluarga" value="" />
                                    </div>
                                    <div class="col-xl-6 col-md-12 col-sm-12">
                                        <label for="keluarga">Hubungan</label>
                                        <input type="text" class="form-control" name="keluarga" id="keluarga" value="" />
                                    </div>
                                    <div class="col-xl-8 col-md-12 col-sm-12">
                                        <label for="alamatpj">Alamat P.J.</label>
                                        <input type="text" class="form-control" name="alamatpj" id="alamatpj" value="" />
                                    </div>
                                    <div class="col-xl-4 col-md-12 col-sm-12">
                                        <label for="alamatpj">Status</label>
                                        <input type="text" class="form-control" name="status" id="status" value="" />
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <label for="kd_pj">Asuransi/Pembiayaan</label>
                                        <div class="input-group">
                                            <select type="text" class="form-control" name="kd_pj" id="kd_pj" value="-" style="width:50%"></select>
                                            <input type="text" class="form-control w-50" name="no_peserta" id="no_peserta" value="-" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-fieldset d-none" id="periksaPendaftaran">
                        <div class="row gy-2">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <label class="form-label">Poli Tujuan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_poli_pcare" readonly>
                                    <input type="text" class="form-control w-50" name="nm_poli_pcare" readonly>
                                </div>
                                <input type="hidden" name="kd_poli_rs">
                                <input type="hidden" name="bridging">
                                <input type="hidden" name="noUrut">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <label for="form-label">TKP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kdTkp" readonly>
                                    <input type="text" class="form-control w-50" name="tkp" readonly>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <label class="form-label">Kunjungan</label>
                                <input type="text" class="form-control" name="kunjunganSakit" value="Kunjungan Sakit" readonly>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">
                                <label class="form-label">Keluhan</label>
                                <input type="text" class="form-control" name="keluhan" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Tensi</label>
                                    <div class="input-group input-group-flat">
                                        <input type="text" class="form-control text-end" name="sistole">
                                        <span class="input-group-text" style="width:10px;padding:2px;">
                                            /
                                        </span>
                                        <input type="text" class="form-control text-end" name="diastole">
                                        <span class="input-group-text">
                                            mmHg
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Suhu</label>
                                    <div class="input-group input-group-flat">
                                        <input onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="suhu_tubuh" value="-">
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
                                        <input onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tinggi" value="-">
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
                                        <input onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="berat" value="-">
                                        <span class="input-group-text">
                                            Kg
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Respirasi</label>
                                    <div class="input-group input-group-flat">
                                        <input onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="respirasi" value="-">
                                        <span class="input-group-text">
                                            x/mnt
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Nadi (/mnt)</label>
                                    <div class="input-group input-group-flat">
                                        <input onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="nadi" value="-">
                                        <span class="input-group-text">
                                            x/mnt
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Lingkar Perut</label>
                                    <div class="input-group input-group-flat">
                                        <input onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="lingkar_perut" value="-">
                                        <span class="input-group-text">
                                            cm
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-2"></i>Keluar</button>
                <button type="button" class="btn btn-success" id="btnSimpanReg"><i class="ti ti-device-floppy me-2"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var modalRegistrasi = $('#modalRegistrasi')
        var formRegistrasiPoli = $('#formRegistrasiPoli')
        var kd_dokter = formRegistrasiPoli.find('select[name=kd_dokter]')
        var kd_poli = formRegistrasiPoli.find('select[name=kd_poli]')
        var tglReg = formRegistrasiPoli.find('input[name=tgl_registrasi]')
        var noReg = formRegistrasiPoli.find('input[name=no_reg]')
        var tabelRegistrasi = $('#tabelRegistrasi')
        var btnSimpanReg = $('#btnSimpanReg')
        var periksaPendaftaran = $('#periksaPendaftaran')
        var url = "{{ url('') }}";
        var tanggal = "{{ date('Y-m-d') }}";
        var tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
        var tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;
        var timeDisplay = $('.jam');
        var checkJam = $('.checkJam');
        var setTime = '';

        modalRegistrasi.on('shown.bs.modal', () => {
            refreshTime();
            setNoRawat().done((response) => {
                formRegistrasiPoli.find('input[name=no_rawat]').val(response)
            });
            setNoReg().done((response) => {
                formRegistrasiPoli.find('input[name=no_reg]').val(response)
            });

            if (!isDokter) {
                optDokter = new Option('-', '-', true, true);
            } else {
                optDokter = new Option(`${isDokter.kd_dokter} - ${isDokter.nm_dokter}`, isDokter.kd_dokter, true, true);
            }
            kd_dokter.append(optDokter).trigger('change');
        })

        function refreshTime() {
            setTime = setInterval(() => {
                var dateString = new Date().toLocaleString("id-ID", {
                    timeZone: "Asia/Jakarta"
                });
                var formattedString = dateString.replace(",", "-");
                var splitarray = new Array();
                splitarray = formattedString.split(" ");
                var splitarraytime = new Array();
                splitarraytime = splitarray[1].split(".");
                const jam = splitarraytime[0] + ':' + splitarraytime[1] + ':' + splitarraytime[2]; // time
                timeDisplay.val(jam)
            }, 1000);

            return setTime;

        }

        function setNoRawat(tgl_registrasi = '') {

            const setNoRawat = $.get(`${url}/registrasi/set/norawat`, {
                tgl_registrasi: tgl_registrasi
            })
            return setNoRawat;

        }

        tglReg.on('change', (e)=>{
            e.preventDefault()
            const tgl = e.currentTarget.value;
            setNoRawat(tgl).done((response) => {
                console.log(response)
                formRegistrasiPoli.find('input[name=no_rawat]').val(response)
            })
        })


        btnSimpanReg.on('click', () => {
            const data = getDataForm('formRegistrasiPoli', ['input', 'select']);
            $.post(`${url}/registrasi`, data).done((response) => {
                alertSuccessAjax('Berhasil melakukan registrasi').then(() => {
                    if (tabelRegistrasi.length) {
                        loadTabelRegistrasi(tglAwal, tglAkhir)
                    }
                    if (data.bridging) {
                        data['tensi'] = `${data.sistole}/${data.diastole}`
                        data['nip'] = data.kd_dokter
                        data['spo2'] = '98'
                        data['alergi'] = '-'
                        data['rtl'] = '-'
                        data['penilaian'] = '-'
                        data['gcs'] = '15'
                        data['instruksi'] = '-'
                        data['kesadaran'] = 'Compos Mentis'
                        data['pemeriksaan'] = '-'
                        $.post(`${url}/pemeriksaan/ralan/create`, data).done((response) => {
                            alertSuccessAjax().then(() => {
                                renderPendaftaranPcare();
                                $.post(`${url}/pcare/pendaftaran`, data).done((response) => {
                                    loadTbPcarePendaftaran(tglAwal, tglAkhir)
                                })
                            })

                        })
                    }
                    modalRegistrasi.modal('hide');
                    modalPasien.modal('hide');
                })
            }).fail((error) => {
                alertErrorAjax(error)
            });
        })


        checkJam.on('change', (e) => {
            const isChecked = $(e.currentTarget).is(':checked')
            if (!isChecked) {
                clearInterval(setTime)
                timeDisplay.removeAttr('readonly')
            } else {
                refreshTime()
                timeDisplay.attr('readonly', 'true')
            }
        })

        kd_poli.on('change', (e) => {
            const kdPoli = e.currentTarget.value
            const tgl = splitTanggal(tglReg.val());
            setNoReg({
                tgl_registrasi: tgl,
                kd_poli: kdPoli,
                kd_dokter: kd_dokter.val(),
            }).done((response) => {
                noReg.val(response)
            })
        })

        kd_dokter.on('change', (e) => {
            const kdDokter = e.currentTarget.value
            const tgl = splitTanggal(tglReg.val());
            setNoReg({
                tgl_registrasi: tgl,
                kd_poli: kd_poli.val(),
                kd_dokter: kdDokter,
            }).done((response) => {
                noReg.val(response)
            })
        })

        tglReg.on('change', (e) => {
            const tgl = splitTanggal(e.currentTarget.value)
            setNoReg({
                tgl_registrasi: tgl,
                kd_poli: kd_poli.val(),
                kd_dokter: kd_dokter.val(),
            }).done((response) => {
                noReg.val(response)
            })
        })

        function setNoReg(data = {}) {
            const setNoReg = $.get(`${url}/registrasi/set/noreg`, {
                tgl_registrasi: data.tgl_registrasi,
                kd_poli: data.kd_poli,
                kd_dokter: data.kd_dokter,
            })
            return setNoReg;

        }

        function registrasiPoli(no_rkm_medis = '', noUrut = '') {
            $.get(`${url}/pasien`, {
                no_rkm_medis: no_rkm_medis,
            }).done((response) => {
                if (Object.values(response.reg_periksa).length) {
                    formRegistrasiPoli.find('input[name=status]').val("Lama")
                } else {
                    formRegistrasiPoli.find('input[name=status]').val("Baru")
                }
                formRegistrasiPoli.find('input[name=nm_pasien]').val(response.nm_pasien)
                formRegistrasiPoli.find('input[name=no_rkm_medis]').val(no_rkm_medis)
                formRegistrasiPoli.find('input[name=keluarga]').val(response.keluarga)
                formRegistrasiPoli.find('input[name=namakeluarga]').val(response.namakeluarga)
                formRegistrasiPoli.find('input[name=alamatpj]').val(response.alamatpj)
                formRegistrasiPoli.find('input[name=no_peserta]').val(response.penjab.kd_pj.includes('BPJS') ? response.no_peserta : '-')
                formRegistrasiPoli.find('input[name=tgl_lahir]').val(response.tgl_lahir);
                formRegistrasiPoli.find('input[name=umur]').val(setUmur(response.tgl_lahir));


                selectPenjab(formRegistrasiPoli.find('select[name=kd_pj]'), modalRegistrasi);
                const pj = new Option(`${response.kd_pj} - ${response.penjab.png_jawab}`, response.kd_pj, true, true);

                formRegistrasiPoli.find('select[name=kd_pj]').append(pj).trigger('change');
                formRegistrasiPoli.find('input[name=umurdaftar]').val(setUmurDaftar(response.tgl_lahir))

                if (noUrut) {
                    periksaPendaftaran.removeClass('d-none');
                    response['noUrut'] = noUrut;
                    regPoliBpjs(response)
                } else {
                    periksaPendaftaran.addClass('d-none');
                }
            })
            modalRegistrasi.modal('show')
            selectDokter(kd_dokter, modalRegistrasi)
            selectPoliklinik(kd_poli, modalRegistrasi)
        }

        function setUmur(tgl_lahir) {
            const umur = hitungUmur(tgl_lahir);
            const textUmur = `${umur.split(';')[0]} Th ${umur.split(';')[1]} Bl ${umur.split(';')[2]} Hr`
            return textUmur;
        }
    </script>
@endpush
