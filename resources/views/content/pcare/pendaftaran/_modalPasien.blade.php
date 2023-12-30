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
                                        <div class="input-group">
                                            <input type="text" value="" class="form-control" name="umurTahun" id="umurTahun" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var formPasien = $('#formPasien');
        $('#modalPasien').on('shown.bs.modal', (e) => {
            $.get('../set/norm').done((response) => {
                formPasien.find('input[name=no_rkm_medis]').val(response.no_rkm_medis)
            })
        })
    </script>
@endpush
