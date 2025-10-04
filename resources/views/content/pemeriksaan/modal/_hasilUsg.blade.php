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
                            <div class="row mb-3">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <label for="kd_dokter">Dokter</label>
                                    <select class="form-select-2" id="kd_dokter" name="kd_dokter">

                                    </select>
                                </div>
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
                                        <input type="text" class="form-control" id="DJJ" name="DJJ">
                                        <span class="input-group-text text-sm">x/mnt</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-2 col-lg-2">
                                    <label for="TBJ" class="form-label">TBJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="TBJ" name="TBJ">
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 col-lg-4">
                                    <label class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                               id="jenis_kelaminL" value="L"
                                               checked>
                                        <label class="form-check-label" for="jenis_kelaminL">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                               id="jenis_kelaminP" value="P">
                                        <label class="form-check-label" for="jenis_kelaminP">Perempuan</label>
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
                                    <label for="ketuban" class="form-label">Air Ketuban</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="ketuban" name="ketuban">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sedikit">Sedikit</option>
                                        <option value="Polihidromnion">Polihidromnion</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-2 col-lg-3">
                                    <label for="HPHT" class="form-label">HPHT</label>
                                    <input type="date" class="form-control" id="HPHT" name="HPHT">
                                </div>
                                <div class="col-md-6 col-xl-2 col-lg-3">
                                    <label for="HPL" class="form-label">HPL</label>
                                    <input type="date" class="form-control" id="HPL" name="HPL">
                                </div>
                                <div class="col-md-6 col-xl-2 col-lg-2">
                                    <label for="umur_kehamilan" class="form-label">Umur Kehamilan</label>
                                    <input type="text" class="form-control" id="umur_kehamilan" name="umur_kehamilan"
                                           value="">
                                </div>
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="kelainan_kongenital" class="form-label">Kelainan Kongenital</label>
                                    <input type="text" class="form-control" id="kelainan_kongenital"
                                           name="kelainan_kongenital">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="lain_lain" class="form-label">Lain-lain</label>
                                    <input type="text" class="form-control" id="lain_lain" name="lain_lain">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pemeriksaan_fisik_tambahan" class="form-label">Pemeriksaan Fisik
                                    Tambahan</label>
                                <textarea class="form-control" id="pemeriksaan_fisik_tambahan"
                                          name="pemeriksaan_fisik_tambahan"
                                          rows="3"></textarea>
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
                                            id="letak_punggung2" name="letak_punggung2">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Kanan">Kanan</option>
                                        <option value="Kiri">Kiri</option>
                                        <option value="Atas">Atas</option>
                                        <option value="Bawah">Bawah</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="DJJ2" class="form-label">DJJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="DJJ2" name="DJJ2">
                                        <span class="input-group-text">x/mnt</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-4 col-lg-4">
                                    <label class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin2"
                                               id="jenis_kelaminL2" value="L"
                                               checked>
                                        <label class="form-check-label" for="jenis_kelaminL2">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin2"
                                               id="jenis_kelaminP2" value="P">
                                        <label class="form-check-label" for="jenis_kelaminP2">Perempuan</label>
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
                                    <label for="ketuban2" class="form-label">Air Ketuban</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt"
                                            id="ketuban2" name="ketuban2">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sedikit">Sedikit</option>
                                        <option value="Polihidromnion">Polihidromnion</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-2 col-lg-2">
                                    <label for="umur_kehamilan2" class="form-label">Usia Kehamilan</label>
                                    <input type="text" class="form-control" id="umur_kehamilan2" name="umur_kehamilan2"
                                           value="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="tbj" class="form-label">TBJ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="TBJ2" name="TBJ2">
                                        <span class="input-group-text">gram</span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="HPL2" class="form-label">HPL</label>
                                    <input type="date" class="form-control" id="HPL2" name="HPL2">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="kelainan_kongenital2" class="form-label">Kelainan Kongenital</label>
                                    <input type="text" class="form-control" id="kelainan_kongenital"
                                           name="kelainan_kongenital2">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="lain_lain2" class="form-label">Lain-lain</label>
                                    <input type="text" class="form-control" id="lain_lain2" name="lain_lain2">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pemeriksaan_fisik_tambahan2" class="form-label">Pemeriksaan Fisik
                                    Tambahan</label>
                                <textarea class="form-control" id="pemeriksaan_fisik_tambahan2"
                                          name="pemeriksaan_fisik_tambahan2"
                                          rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-xl-6 col-sm-12 ">
                        <div class="form-fieldset" id="fieldsetGynecologi">
                            <h5 class="mb-3">GYNECOLOGI</h5>
                            <div class="row mb-3">
                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="GS" class="form-label">GS</label>
                                    <select class="form-select-2" data-dropdown-parent="#modalCppt" id="GS" name="GS">
                                        <option value="" selected disabled>::Pilih::</option>
                                        <option value="Tunggal, Intrauterin">Tunggal, Intrauterin</option>
                                        <option value="Ganda, Intrauterin">Ganda, Intrauterin</option>
                                        <option value="Tunggal, Ekstrauterin">Tunggal, Ekstrauterin</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="umur_kehamilan_gs" class="form-label">Usia Kehamilan</label>
                                    <input type="text" class="form-control" id="umur_kehamilan_gs" value=""
                                           name="umur_kehamilan_gs">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="fetalpole" class="form-label">Fetal Pole</label>
                                    <input type="text" class="form-control" id="fetalpole" name="fetalpole" value="">
                                </div>

                                <div class="col-md-6 col-xl-3 col-lg-3">
                                    <label for="pulsasi" class="form-label">Pulsasi</label>
                                    <input type="text" class="form-control" id="pulsasi" name="pulsasi" value="">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="lain" class="form-label">Lain</label>
                                <input type="text" class="form-control" id="lain" name="lain" autocomplete="">
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
                setHasilUsg(no_rawat)
                const {pasien} = response;

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

        function setHasilUsg(no_rawat) {
            $.get(`/efktp/hasil-usg`, {
                no_rawat: no_rawat
            }).done((response) => {
                const data = response.data
                const formUsgKembar = $('#formUsgKembar')
                if (data === null) {
                    btnCreateHasilUsg.addClass('btn-success').removeClass('btn-primary')
                    return false;

                }
                btnCreateHasilUsg.removeClass('btn-success').addClass('btn-primary')
                formHasilUsg.find('select[name=janin]').val(data.janin).change()
                formHasilUsg.find('select[name=presentasi]').val(data.presentasi).change()
                formHasilUsg.find('select[name=letak_punggung]').val(data.letak_punggung).change()
                formHasilUsg.find('select[name=letak_plasenta').val(data.letak_plasenta).change()
                formHasilUsg.find('select[name=ketuban').val(data.ketuban).change()

                formHasilUsg.find('input[name=DJJ]').val(data.DJJ)
                formHasilUsg.find(`input[name=jenis_kelamin][value="${data.jenis_kelamin}"`).attr('checked', true).change()
                formHasilUsg.find('input[name=umur_kehamilan').val(data.umur_kehamilan)
                formHasilUsg.find('input[name=HPHT').val(data.HPHT)
                formHasilUsg.find('input[name=HPL').val(data.HPL)
                formHasilUsg.find('input[name=TBJ').val(data.TBJ)
                formHasilUsg.find('input[name=kelainan_kongenital').val(data.kelainan_kongenital)
                formHasilUsg.find('input[name=lain_lain').val(data.lain_lain)
                formHasilUsg.find('textarea[name=pemeriksaan_fisik_tambahan').val(data.pemeriksaan_fisik_tambahan)

                formHasilUsg.find('select[name=GS]').val(data.GS).change()
                formHasilUsg.find('input[name=umur_kehamilan_gs]').val(data.umur_kehamilan_gs)
                formHasilUsg.find('input[name=fetalpole]').val(data.fetalpole)
                formHasilUsg.find('input[name=pulsasi]').val(data.pulsasi)
                formHasilUsg.find('input[name=lain]').val(data.lain)


                if (data.janin.includes('Kembar')) {
                    formUsgKembar.removeClass('d-none')
                    formHasilUsg.find('select[name=presentasi2]').val(data.presentasi2).change()
                    formHasilUsg.find('select[name=letak_punggung2]').val(data.letak_punggung2).change()
                    formHasilUsg.find('select[name=letak_plasenta2').val(data.letak_plasenta2).change()
                    formHasilUsg.find('select[name=ketuban2').val(data.ketuban2).change()

                    formHasilUsg.find('input[name=DJJ2]').val(data.DJJ)
                    formHasilUsg.find(`input[name=jenis_kelamin2][value="${data.jenis_kelamin2}"`).attr('checked', true).change()
                    formHasilUsg.find('input[name=umur_kehamilan2').val(data.umur_kehamilan2)
                    formHasilUsg.find('input[name=HPL2').val(data.HPL2)
                    formHasilUsg.find('input[name=TBJ2').val(data.TBJ2)
                    formHasilUsg.find('input[name=kelainan_kongenital2').val(data.kelainan_kongenital2)
                    formHasilUsg.find('input[name=lain_lain2').val(data.lain_lain2)
                    formHasilUsg.find('textarea[name=pemeriksaan_fisik_tambahan2').val(data.pemeriksaan_fisik_tambahan2)
                }

            })
        }

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

            data['jenis_kelamin'] = formHasilUsg.find('input[type=radio][name=jenis_kelamin]:checked').val()
            data['jenis_kelamin2'] = formHasilUsg.find('input[type=radio][name=jenis_kelamin]:checked').val()

            const isKembar = data['janin']?.includes('Kembar')

            if (!isKembar) {
                data['jenis_kelamin2'] = null
            }

            $.post(`/efktp/hasil-usg`, data).done((response) => {
                showToast('Hasil USG berhasil')
                setHasilUsg(no_rawat)
            }).fail((result) => {
                showToast(result.responseJSON.message, 'error', 10000)
            })
        })

        formHasilUsg.find('input[name=HPHT]').on('change', (e) => {
            const tglHpht = e.currentTarget.value
            const hpht = hitungHPL(tglHpht);
            const umurKehamilan = hitungUsiaKehamilan(tglHpht)
            const janin = formHasilUsg.find('select[name=janin]').val();

            formHasilUsg.find('input[name=HPL]').val(hpht)
            formHasilUsg.find('input[name=umur_kehamilan]').val(umurKehamilan)
            formHasilUsg.find('input[name=umur_kehamilan_gs]').val(umurKehamilan)

            if (janin.includes('Kembar')) {
                formHasilUsg.find('input[name=umur_kehamilan2]').val(umurKehamilan)
                formHasilUsg.find('input[name=HPL2]').val(hpht)
            } else {
                formHasilUsg.find('input[name=HPL2]').val(null)
                formHasilUsg.find('input[name=umur_kehamilan2]').val(null)
            }
        })

    </script>
@endpush