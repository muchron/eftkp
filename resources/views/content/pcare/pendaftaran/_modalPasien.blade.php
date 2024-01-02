<div class="modal modal-blur fade" id="modalPasien" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Tambahkan Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formPasien">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <fieldset class="form-fieldset">
                                <div class="row gy-1">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label class="form-label required">No. Rekam Medis</label>
                                        <div class="input-group">
                                            <input type="text" name="no_rkm_medis" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-sm-12">
                                        <label class="form-label required">Nama Pasien</label>
                                        <input type="text" name="nm_pasien" id="nm_pasien" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" autocomplete="off">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label required">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-select">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label required">Golongan Darah</label>
                                        <select name="gol_darah" id="gol_darah" class="form-select">
                                            <option value="-" selected>-</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AO">AO</option>
                                            <option value="o">O</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label class="form-label required">Tempat Lahir</label>
                                        <input type="text" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="tmp_lahir" id="tmp_lahir" autocomplete="off" value="-">
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <label class="form-label required">Tgl Lahir</label>
                                        <input type="text" class="form-control filterTangal" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="tgl_lahir" id="tgl_lahir" autocomplete="off" value="{{ date('d-m-Y') }}">
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12">
                                        <label class="form-label">Umur</label>
                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="umur" id="umur" placeholder="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="nm_ibu" id="nm_ibu" placeholder="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Penanggung Jawab</label>
                                        <select class="form-select" name="keluarga" id="keluarga">
                                            <option value="SAUDARA">SAUDARA</option>
                                            <option value="IBU">IBU</option>
                                            <option value="ISTRI">ISTRI</option>
                                            <option value="SUAMI">SUAMI</option>
                                            <option value="ANAK">ANAK</option>
                                            <option value="DIRI SENDIRI" selected>DIRI SENDIRI</option>
                                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Nama P.J.</label>
                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="namakeluarga" id="namakeluarga" placeholder="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="pekerjaanpj" id="pekerjaanpj" placeholder="">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label class="form-label">Suku/Bangsa</label>
                                        <select class="form-select" name="suku_bangsa" id="suku_bangsa" style="width:100%">
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label class="form-label">Bahasa</label>
                                        <select class="form-select" name="bahasa_pasien" id="bahasa_pasien" style="width:100%">
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <label class="form-label">Cacat Fisik</label>
                                        <select class="form-select" name="cacat_fisik" id="cacat_fisik" style="width:100%">
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Agama</label>
                                        <select class="form-select" name="agama" id="agama" style="width:100%">
                                            <option value="ISLAM" selected>ISLAM</option>
                                            <option value="KRISTEN">KRISTEN</option>
                                            <option value="PROTESTAN">PROTESTAN</option>
                                            <option value="HINDU">HINDU</option>
                                            <option value="BUDHA">BUDHA</option>
                                            <option value="KONGHU CHU">KONGHU CHU</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Status Menikah</label>
                                        <select class="form-select" name="stts_nikah" id="stts_nikah" style="width:100%">
                                            <option value="BELUM">BELUM MENIKAH</option>
                                            <option value="MENIKAH">MENIKAH</option>
                                            <option value="JANDA">JANDA</option>
                                            <option value="DUDHA">DUDA</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <fieldset class="form-fieldset">
                                <div class="row gy-1">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label for="kd_pj" class="form-label">Asuransi</label>
                                        <select name="kd_pj" id="kd_pj" class="form-select" style="width:100%">
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label for="no_peserta" class="form-label">No Kartu</label>
                                        <input name="no_peserta" id="no_peserta" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value="-" />
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="no_tlp" class="form-label">No Telp/Hp.</label>
                                        <input name="no_tlp" id="no_tlp" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value='-' />
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="email" class="form-label">E-Mail</label>
                                        <input name="email" id="email" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value="-" />
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="pnd" class="form-label">Pendidikan</label>
                                        <select name="pnd" id="pnd" class="form-select">
                                            <option value="-" selected>-</option>
                                            <option value="TK">TK</option>
                                            <option value="SD">SD</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="kd_pj" class="form-label">Pekerjaan</label>
                                        <input name="pekerjaan" id="pekerjaan" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value='-' />
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="no_ktp" class="form-label">No. KTP/SIM</label>
                                        <input name="no_ktp" id="no_ktp" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value="-" />
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="tgl_daftar" class="form-label">Tgl. Daftar</label>
                                        <input name="tgl_daftar" id="tgl_daftar" class="form-control filterTanggal" value="{{ date('d-m-Y') }}" />
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input name="alamat" id="alamat" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-" />
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label for="kd_kel" class="form-label">Kelurahan/Desa</label>
                                        <select name="kd_kel" id="kd_kel" class="form-select" style="width: 100%">
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="kd_kec" class="form-label">Kecamatan</label>
                                        <select name="kd_kec" id="kd_kec" class="form-select" style="width: 100%">
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="kd_kab" class="form-label">Kabupaten</label>
                                        <select name="kd_kab" id="kd_kab" class="form-select" style="width: 100%">
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                        <label for="kd_prop" class="form-label">Propinsi</label>
                                        <select name="kd_prop" id="kd_prop" class="form-select" style="width: 100%">
                                        </select>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkPj" name="checkPj">
                                            <span class="form-check-label">Alamat PJ</span>
                                        </label>
                                        <input name="alamatpj" id="alamatpj" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-" />
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label class="form-label" for="perusahaan_pasien">Instansi/Peruhasaan</label>
                                        <select name="perusahaan_pasien" id="perusahaan_pasien" class="form-select"></select>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <label class="form-label" for="nip">Instansi/Peruhasaan</label>
                                        <input name="nip" id="nip" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-" />
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSimpanPasien"><i class="ti ti-device-floppy me-2"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var formPasien = $('#formPasien');
        var modalPasien = $('#modalPasien');
        var sukuBangsa = formPasien.find('select[name=suku_bangsa]');
        var bahasaPasien = formPasien.find('select[name=bahasa_pasien]');
        var cacatFisik = formPasien.find('select[name=cacat_fisik]');
        var penjab = formPasien.find('select[name=kd_pj]');
        var kelurahan = formPasien.find('select[name=kd_kel]');
        var kecamatan = formPasien.find('select[name=kd_kec]');
        var kabupaten = formPasien.find('select[name=kd_kab]');
        var propinsi = formPasien.find('select[name=kd_prop]');
        var perusahaan = formPasien.find('select[name=perusahaan_pasien]');
        var checkPj = formPasien.find('input[id=checkPj]');
        var url = "{{ url('') }}"

        $('#btnSimpanPasien').on('click', (e) => {
            e.preventDefault;
            const data = getDataForm('formPasien', ['input', 'select']);
            $.post(`${url}/pasien`, data).done((response) => {
                console.log('RESPONSE ===', response);
            })
        })


        $('#modalPasien').on('shown.bs.modal', (e) => {
            $.get(`${url}/set/norm`).done((response) => {
                formPasien.find('input[name=no_rkm_medis]').val(response.no_rkm_medis)
            })
            selectSukuBangsa(sukuBangsa, modalPasien, 'JAWA');
            selectBahasaPasien(bahasaPasien, modalPasien, 'jawa');
            selectCacatFisik(cacatFisik, modalPasien, 'TIDAK ADA');
            selectPenjab(penjab, modalPasien);
            selectKelurahan(kelurahan, modalPasien);
            selectKecamatan(kecamatan, modalPasien);
            selectKabupaten(kabupaten, modalPasien);
            selectPropinsi(propinsi, modalPasien);
            selectPerusahaan(propinsi, modalPasien);
            selectPerusahaan(perusahaan, modalPasien);
        })

        checkPj.on('change', (e) => {
            const isChecked = $(e.currentTarget).is(':checked');
            let alamatpj = '';
            if (isChecked) {
                const alamatText = formPasien.find(`input[name=alamat]`).val()
                const propText = propinsi.find(`option:selected`).text()
                const kabText = kabupaten.find(`option:selected`).text()
                const kecText = kecamatan.find(`option:selected`).text()
                const kelText = kelurahan.find(`option:selected`).text()
                alamatpj = `${alamatText}, ${kelText}, ${kecText}, ${kabText}, ${propText}`
            } else {
                alamatpj = `-`
            }
            formPasien.find('input[name=alamatpj]').val(alamatpj)

        })

        sukuBangsa.on('select2:select', (e) => {
            const selectedSuku = e.currentTarget.value;
            $.post(`${url}/suku`, {
                suku: selectedSuku,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(selectedSuku, response.id, true, true);
                    sukuBangsa.append(option).trigger('change');
                }
            })
        });

        bahasaPasien.on('select2:select', (e) => {
            const selectBahasa = e.currentTarget.value;
            $.post('../bahasa', {
                bahasa: selectBahasa,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(selectBahasa, response.id, true, true);
                    bahasaPasien.append(option).trigger('change');
                }
            })
        })
        kelurahan.on('select2:select', (e) => {
            const nmKelurahan = e.currentTarget.value.toUpperCase();
            $.post(`${url}/kelurahan`, {
                kelurahan: nmKelurahan,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmKelurahan, response.id, true, true);
                    kelurahan.append(option).trigger('change');
                }
            })
        })
        kabupaten.on('select2:select', (e) => {
            const nmKabupaten = e.currentTarget.value.toUpperCase();
            $.post(`${url}/kabupaten`, {
                kabupaten: nmKabupaten,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmKabupaten, response.id, true, true);
                    kabupaten.append(option).trigger('change');
                }
            })
        })
        propinsi.on('select2:select', (e) => {
            const nmPropinsi = e.currentTarget.value.toUpperCase();
            $.post(`${url}/propinsi`, {
                propinsi: nmPropinsi,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmPropinsi, response.id, true, true);
                    propinsi.append(option).trigger('change');
                }
            })
        })
    </script>
@endpush
