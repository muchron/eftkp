<div class="modal modal-blur fade" id="modalPesertaBpjs" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Detail Peserta BPJS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formPeserta">
                    <fieldset class="form-fieldset">
                        <div class="row gy-2">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="row gy-2">
                                    <div class="col-xl-5 col-md-12 col-sm-12">
                                        <label class="form-label required">No. Reg</label>
                                        <div class="input-group">
                                            <input type="text" name="no_reg" id="no_reg" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" autocomplete="off" disabled="">
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
                                <input autocomplete="off" type="text" class="form-control" name="keluhan">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Tensi</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" type="text" class="form-control text-end" name="sistole">
                                        <span class="input-group-text" style="width:10px;padding:2px;">
                                            /
                                        </span>
                                        <input autocomplete="off" type="text" class="form-control text-end" name="diastole">
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
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="suhu_tubuh" value="-">
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
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tinggi" value="-">
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
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="berat" value="-">
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
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="respirasi" value="-">
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
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="nadi" value="-">
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
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="lingkar_perut" value="-">
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
                <button type="button" class="btn btn-success" id="btnSimpanReg"><i class="ti ti-device-floppy me-2"></i>Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-2"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var formPesrta = $('formPeserta');
        var modalPesertaBpjs = $('modalPesertaBpjs');

        function getPeserta(no_peserta) {
            $.get(`${url}/bridging/pcare/peserta/${no_peserta}`).done((response) => {
                console.log('RESPONSE ===', response);
            })
        }
    </script>
@endpush
