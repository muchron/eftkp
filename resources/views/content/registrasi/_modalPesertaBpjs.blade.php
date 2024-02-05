<div class="modal modal-blur fade" id="modalPesertaBpjs" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Detail Peserta BPJS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formPeserta">
                    <div class="row gy-2">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="row gy-2">
                                <div class="col-xl-5 col-md-12 col-sm-12">
                                    <label class="form-label required">No. Reg</label>
                                    <input type="text" name="no_reg" id="no_reg" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" autocomplete="off" disabled="">

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
                    </div>
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
        var modalPesertaBpjs = $('#modalPesertaBpjs');

        function getPeserta(no_peserta) {
            loadingAjax();
            $.get(`${url}/bridging/pcare/peserta/${no_peserta}`).done((response) => {
                console.log('RESPONSE ===', response);
                loadingAjax().close();
                modalPesertaBpjs.modal('show');
            })
        }
    </script>
@endpush
