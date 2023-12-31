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
                                <div class="row gy-2">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <label class="form-label required">No. Rekam Medis</label>
                                        <div class="input-group">
                                            <input type="text" name="no_rkm_medis" class="form-control" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12 col-sm-12">
                                        <label class="form-label required">Nama Pasien</label>
                                        <input type="text" name="nm_pasien" id="nm_pasien" class="form-control" autocomplete="off">
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
                                        <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" autocomplete="off" value="-">
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <label class="form-label required">Tgl Lahir</label>
                                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off" readonly>
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12">
                                        <label class="form-label">Umur</label>
                                        <input type="text" value="-" class="form-control" name="umurTahun" id="umurTahun" placeholder="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Nama Ibu</label>
                                        <input type="text" value="-" class="form-control" name="nm_ibu" id="nm_ibu" placeholder="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Penanggung Jawab</label>
                                        <select class="form-select" name="kekuarga" id="kekuarga">
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
                                        <input type="text" value="-" class="form-control" name="namakeluarga" id="namakeluarga" placeholder="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" value="-" class="form-control" name="pekerjaanpj" id="pekerjaanpj" placeholder="">
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
                                <div class="row gy-2">
                                    <div class="col-xl-6 col-md-6 col-lg-12">
                                        <label for="kd_pj" class="form-label">Asuransi</label>
                                        <select name="kd_pj" id="kd_pj" class="form-select" style="width:100%">
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-lg-12">
                                        <label for="kd_pj" class="form-label">No Kartu</label>
                                        <input name="no_peserta" id="no_peserta" class="form-control" style="width:100%" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSimpanPasien"><i class="ti ti-save"> Simpan</i></button>
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
        $('#btnSimpanPasien').on('click', (e) => {
            e.preventDefault;
        })
        $('#modalPasien').on('shown.bs.modal', (e) => {
            $.get('../set/norm').done((response) => {
                formPasien.find('input[name=no_rkm_medis]').val(response.no_rkm_medis)
                selectSukuBangsa(sukuBangsa, modalPasien, 'JAWA');
                selectBahasaPasien(bahasaPasien, modalPasien, 'jawa');
                selectCacatFisik(cacatFisik, modalPasien, 'TIDAK ADA');
                selectPenjab(penjab, modalPasien);
            })
        })

        sukuBangsa.on('select2:select', (e) => {
            const selectedSuku = e.currentTarget.value;
            $.post('../suku', {
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
    </script>
@endpush
