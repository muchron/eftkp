<div class="row">
    <div class="col-12">
        <div class="row" id="infoPasienUsg">
            <div class="col-md-12 col-xl-2 col-lg-2">
                <div class="mb-1">
                    <label class="form-label">No. Rawat</label>
                    <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text"
                           class="form-control" name="no_rawat" readonly>
                </div>
            </div>
            <div class="col-md-12 col-xl-2 col-lg-3">
                <div class="mb-1">
                    <label class="form-label">Pasien</label>
                    <div class="input-group mb-2">
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text"
                               class="form-control" name="no_rkm_medis" readonly>
                        <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text"
                               class="form-control w-50" name="nm_pasien" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-2 col-lg-2">
                <div class="mb-1">
                    <label class="form-label">Tgl. Lahir / Umur</label>
                    <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text"
                           class="form-control" name="tgl_lahir" readonly>
                </div>
            </div>
            <div class="col-md-12 col-xl-2 col-lg-3">
                <div class="mb-1">
                    <label class="form-label">Alamat</label>
                    <input value="-" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text"
                           class="form-control" name="alamat" readonly>
                </div>
            </div>
            <div class="col-md-12 col-xl-2 col-lg-3">
                <div class="mb-1">
                    <label for="png_jawab">Keluarga</label>
                    <div class="input-group">
                        <input class="form-control" type="text" id="hubunganpj" name="hubunganpj" readonly>
                        <input class="form-control w-25" type="text" id="p_jawab" name="p_jawab" readonly/>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-2 col-lg-2">
                <div class="mb-1">
                    <label class="form-label">Pembiayaan</label>
                    <div class="input-group mb-2">
                        <input value="-" type="text" class="form-control" name="pembiayaan" readonly>
                        <input value="-" type="text" class="form-control w-50" name="no_peserta" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">

        <form>
            <!-- OBSTETRI -->


            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-fieldset">
                        <h5 class="mb-3">OBSTETRI</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="janin" class="form-label">JANIN</label>
                                <select class="form-select" id="janin">
                                    <option>:: Pilih ::</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="presentasi" class="form-label">Presentasi</label>
                                <select class="form-select" id="presentasi">
                                    <option>:: Pilih ::</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="letak_punggung" class="form-label">Letak Punggung</label>
                                <select class="form-select" id="letak_punggung">
                                    <option>:: Pilih ::</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="djj" class="form-label">DJJ</label>
                                <input type="text" class="form-control" id="djj">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jkL" value="L">
                                    <label class="form-check-label" for="jkL">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jkP" value="P">
                                    <label class="form-check-label" for="jkP">Perempuan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="letak_plasenta" class="form-label">Letak Plasenta</label>
                                <select class="form-select" id="letak_plasenta">
                                    <option>:: Pilih ::</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="air_ketuban" class="form-label">Air Ketuban</label>
                                <select class="form-select" id="air_ketuban">
                                    <option>:: Pilih ::</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                <input type="text" class="form-control" id="usia_kehamilan" value="0">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tbj" class="form-label">TBJ</label>
                                <input type="text" class="form-control" id="tbj">
                            </div>
                            <div class="col-md-6">
                                <label for="hpl" class="form-label">HPL</label>
                                <input type="date" class="form-control" id="hpl">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kelainan" class="form-label">Kelainan Kongenital</label>
                                <input type="text" class="form-control" id="kelainan">
                            </div>
                            <div class="col-md-6">
                                <label for="lain" class="form-label">Lain-lain</label>
                                <input type="text" class="form-control" id="lain">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pemeriksaan" class="form-label">Pemeriksaan Fisik Tambahan</label>
                            <textarea class="form-control" id="pemeriksaan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <!-- GYNECOLOGI -->
                    <div class="form-fieldset">


                        <h5 class="mb-3">GYNECOLOGI</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gs" class="form-label">GS</label>
                                <select class="form-select" id="gs">
                                    <option>Tunggal, Intrauterin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="usia_kehamilan_gs" class="form-label">Usia Kehamilan</label>
                                <input type="text" class="form-control" id="usia_kehamilan_gs" value="7+3">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fetal_pole" class="form-label">Fetal Pole</label>
                                <input type="text" class="form-control" id="fetal_pole" value="+">
                            </div>
                            <div class="col-md-6">
                                <label for="pulsasi" class="form-label">Pulsasi</label>
                                <input type="text" class="form-control" id="pulsasi" value="+">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lain_gs" class="form-label">Lain</label>
                            <input type="text" class="form-control" id="lain_gs">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@push('script')
    <script>
        const targetHasilUsg = $('#modalCppt').find('a[href="#tabsHasilUsg"]');
        targetHasilUsg.on('shown.bs.tab', (e) => {
            const infoPasienUsg = $('#infoPasienUsg')
            const no_rawat = formCpptRajal.find('input[name=no_rawat]').val();
            $('#btnSimpanHasilUsg').removeClass('d-none')
            $('#btnSimpanCppt').addClass('d-none')
            getRegDetail(no_rawat).done((response) => {
                const {pasien} = response;
                console.log('pasien ===', pasien)
                console.log('reg ===', response)
                infoPasienUsg.find('input[name=no_rawat]').val(no_rawat)
                infoPasienUsg.find('input[name=nm_pasien]').val(pasien.nm_pasien);
                infoPasienUsg.find('input[name=no_rkm_medis]').val(response.no_rkm_medis);
                infoPasienUsg.find('input[name=alamat]').val(`${pasien.alamat}, ${pasien.kel.nm_kel}, ${pasien.kec.nm_kec}`);
                infoPasienUsg.find('input[name=pembiayaan]').val(response.penjab.png_jawab)
                infoPasienUsg.find('input[name=no_peserta]').val(pasien.no_peserta)
                infoPasienUsg.find('input[name=p_jawab]').val(response.p_jawab)
                infoPasienUsg.find('input[name=hubunganpj]').val(response.hubunganpj)

                const umurdaftar = formatUmurDaftar(hitungUmurDaftar(pasien.tgl_lahir, response.tgl_registrasi))
                infoPasienUsg.find('input[name=tgl_lahir]').val(`${formatTanggal(pasien.tgl_lahir)} / ${umurdaftar}`);
            })


        })

    </script>
@endpush