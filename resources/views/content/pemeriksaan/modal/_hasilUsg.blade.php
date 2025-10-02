<div class="row">
    <div class="col-12">
        <form id="formHasilUsg">
            <div class="row" id="infoPasienUsg">
                <div class="col-md-12 col-xl-2 col-lg-2">
                    <div class="mb-1">
                        <label class="form-label">No. Rawat</label>
                        <input value="-" type="text" class="form-control" name="no_rawat" readonly>
                    </div>
                </div>

                <div class="col-md-12 col-xl-2 col-lg-3">
                    <div class="mb-1">
                        <label class="form-label">Pasien</label>
                        <div class="input-group mb-2">
                            <input value="-" type="text" class="form-control" name="no_rkm_medis" readonly>
                            <input value="-" type="text" class="form-control w-50" name="nm_pasien" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-2 col-lg-2">
                    <div class="mb-1">
                        <label class="form-label">Tgl. Lahir / Umur</label>
                        <input value="-" type="text" class="form-control" name="tgl_lahir" readonly>
                    </div>
                </div>

                <div class="col-md-12 col-xl-2 col-lg-3">
                    <div class="mb-1">
                        <label class="form-label">Alamat</label>
                        <input value="-" type="text" class="form-control" name="alamat" readonly>
                    </div>
                </div>

                <div class="col-md-12 col-xl-2 col-lg-3">
                    <div class="mb-1">
                        <label for="png_jawab">Keluarga</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="hubunganpj" name="hubunganpj" readonly>
                            <input class="form-control w-25" type="text" id="p_jawab" name="p_jawab" readonly>
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

            <!-- OBSTETRI -->
            <div class="col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-fieldset">
                            <div class="mb-3">
                                <label for="kd_dokter">Dokter</label>
                                <select class="form-select-2" id="kd_dokter" name="kd_dokter">

                                </select>

                            </div>
                            <h5 class="mb-3">OBSTETRI</h5>
                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="janin" class="form-label">JANIN</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="janin" name="janin">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Tunggal, Intraurterin">Tunggal, Intraurterin</option>
                                        <option value="Tunggal, Ekstraurterin">Tunggal, Ekstraurterin</option>
                                        <option value="Kembar, Intraurterin">Kembar, Intraurterin</option>
                                        <option value="Kembar, Ekstraurterin">Kembar, Ekstraurterin</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="presentasi" class="form-label">Presentasi</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="presentasi" name="presentasi">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Kepala">Kepala</option>
                                        <option value="Melintang">Melintang</option>
                                        <option value="Bokong">Bokong</option>
                                        <option value="Oblique">Oblique</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="letak_punggung" class="form-label">Letak Punggung</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="letak_punggung" name="letak_punggung">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Kanan">Kanan</option>
                                        <option value="Kiri">Kiri</option>
                                        <option value="Atas">Atas</option>
                                        <option value="Bawah">Bawah</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="djj" class="form-label">DJJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="djj" name="djj">
                                        <span class="input-group-text">x/mnt</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-4 col-lg-4">
                                    <label class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" id="jkL" value="L"
                                               checked>
                                        <label class="form-check-label" for="jkL">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk" id="jkP" value="P">
                                        <label class="form-check-label" for="jkP">Perempuan</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="letak_plasenta" class="form-label">Letak Plasenta</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="letak_plasenta" name="letak_plasenta">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Corpus Bawah">Corpus Bawah</option>
                                        <option value="SBR">SBR</option>
                                        <option value="Fundus">Fundus</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="air_ketuban" class="form-label">Air Ketuban</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="air_ketuban" name="air_ketuban">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sedikit">Sedikit</option>
                                        <option value="Polihidromnion">Polihidromnion</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-2 col-lg-2">
                                    <label for="usia_kehamilan" class="form-label">Usia Kehamilan</label>
                                    <input type="text" class="form-control" id="usia_kehamilan" name="usia_kehamilan"
                                           value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="tbj" class="form-label">TBJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tbj" name="tbj">
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="hpl" class="form-label">HPL</label>
                                    <input type="date" class="form-control" id="hpl" name="hpl">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="kelainan" class="form-label">Kelainan Kongenital</label>
                                    <input type="text" class="form-control" id="kelainan" name="kelainan">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="lain" class="form-label">Lain-lain</label>
                                    <input type="text" class="form-control" id="lain" name="lain">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pemeriksaan" class="form-label">Pemeriksaan Fisik Tambahan</label>
                                <textarea class="form-control" id="pemeriksaan" name="pemeriksaan" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-fieldset  d-none" id="formUsgKembar">
                            <h5 class="mb-3">JANIN 2</h5>
                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="presentasi2" class="form-label">Presentasi</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="presentasi2" name="presentasi2">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Kepala">Kepala</option>
                                        <option value="Melintang">Melintang</option>
                                        <option value="Bokong">Bokong</option>
                                        <option value="Oblique">Oblique</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="letak_punggung2" class="form-label">Letak Punggung</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="letak_punggung2" name="letak_punggung">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Kanan">Kanan</option>
                                        <option value="Kiri">Kiri</option>
                                        <option value="Atas">Atas</option>
                                        <option value="Bawah">Bawah</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="djj2" class="form-label">DJJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="djj2" name="djj2">
                                        <span class="input-group-text">x/mnt</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-4 col-lg-4">
                                    <label class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk2" id="jkL2" value="L"
                                               checked>
                                        <label class="form-check-label" for="jkL2">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jk2" id="jkP2" value="P">
                                        <label class="form-check-label" for="jkP2">Perempuan</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="letak_plasenta2" class="form-label">Letak Plasenta</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="letak_plasenta2" name="letak_plasenta2">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Corpus Bawah">Corpus Bawah</option>
                                        <option value="SBR">SBR</option>
                                        <option value="Fundus">Fundus</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="air_ketuban" class="form-label">Air Ketuban</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="air_ketuban2" name="air_ketuban2">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sedikit">Sedikit</option>
                                        <option value="Polihidromnion">Polihidromnion</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-2 col-lg-2">
                                    <label for="usia_kehamilan2" class="form-label">Usia Kehamilan</label>
                                    <input type="text" class="form-control" id="usia_kehamilan2" name="usia_kehamilan2"
                                           value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="tbj" class="form-label">TBJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tbj2" name="tbj2">
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="hpl2" class="form-label">HPL</label>
                                    <input type="date" class="form-control" id="hpl2" name="hpl2">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="kelainan2" class="form-label">Kelainan Kongenital</label>
                                    <input type="text" class="form-control" id="kelainan" name="kelainan2">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="lain2" class="form-label">Lain-lain</label>
                                    <input type="text" class="form-control" id="lain2" name="lain2">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pemeriksaan2" class="form-label">Pemeriksaan Fisik Tambahan</label>
                                <textarea class="form-control" id="pemeriksaan2" name="pemeriksaan2"
                                          rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-xl-6 col-sm-12 ">
                        <div class="form-fieldset" id="fieldsetGynecologi">
                            <h5 class="mb-3">GYNECOLOGI</h5>
                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="gs" class="form-label">GS</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt" id="gs" name="gs">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Tunggal, Intrauterin">Tunggal, Intrauterin</option>
                                        <option value="Ganda, Intrauterin">Ganda, Intrauterin</option>
                                        <option value="Tunggal, Ekstrauterin">Tunggal, Ekstrauterin</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="usia_kehamilan_gs" class="form-label">Usia Kehamilan</label>
                                    <input type="text" class="form-control" id="usia_kehamilan_gs" value=""
                                           name="usia_kehamilan_gs">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="fetal_pole" class="form-label">Fetal Pole</label>
                                    <input type="text" class="form-control" id="fetal_pole" name="fetal_pole" value="">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="pulsasi" class="form-label">Pulsasi</label>
                                    <input type="text" class="form-control" id="pulsasi" name="pulsasi" value="">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="lain_gs" class="form-label">Lain</label>
                                <input type="text" class="form-control" id="lain_gs" name="lain_gs" autocomplete="">
                            </div>
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
        const btnCreateHasilUsg = $('#btnCreateHasilUsg');
        targetHasilUsg.on('shown.bs.tab', (e) => {
            const infoPasienUsg = $('#infoPasienUsg')
            const no_rawat = formCpptRajal.find('input[name=no_rawat]').val();
            $('#btnCreateHasilUsg').removeClass('d-none')
            $('#btnSimpanCppt').addClass('d-none')
            $('#btnCreateTindakan').addClass('d-none')
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

                const optDokter = new Option(response.dokter.nm_dokter, response.kd_dokter, true, true)
                formHasilUsg.find('select[name=kd_dokter]').append(optDokter).trigger('change');
            })


        })

        const formHasilUsg = $('#formHasilUsg')
        const selectJanin = formHasilUsg.find('#janin')

        selectJanin.on('select2:select', (e) => {
            const value = e.params.data.id
            const isKembar = value.includes('Kembar')
            const formUsgKembar = $('#formUsgKembar')

            if (isKembar) {
                formUsgKembar.removeClass('d-none')
            } else {
                formUsgKembar.addClass('d-none')
                formUsgKembar.find('input').val("")
                formUsgKembar.find('textarea').val("")
                formUsgKembar.find('select').val("")
            }

        })

        btnCreateHasilUsg.on('click', (e) => {
            const no_rawat = formHasilUsg.find('input[name=no_rawat]').val()

            const data = getDataForm('formHasilUsg', ['input', 'textarea', 'select']);

            console.log('DATA ===', data)

            $.post(`hasil-usg`, data).done((response) => {
                alert('Success');
                console.log('RESPONSE ===', response)
            }).fail((result) => {
                alert('failed');
                console.log('RESPONSE ===', result)

            })
        })


    </script>
@endpush