<div class="modal modal-blur fade" id="modalPemeriksaanGigiHasil" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Pemeriksaan Gigi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="">
                <form action="" id="formPemeriksaanGigiHasil">
                    <div class="row gy-2">
                        <div class="col-xl-6 col-sm-12">
                            <label for="posisi_gigi">Posisi Gigi</label>
                            <input class="form-control" type="text" id="posisi_gigi" name="posisi_gigi" readonly />
                        </div>
                        <div class="col-xl-6 col-sm-12">
                            <label for="hasil">Kondisi</label>
                            <select class="form-select" id="hasil" name="hasil">
                                <option value="-">-</option>
                                <option value="Erupsi">Erupsi</option>
                                <option value="Tanggal">Tanggal</option>
                                <option value="Karies">Karies</option>
                                <option value="Sisa Akar">Sisa Akar</option>
                                <option value="Tumpatan">Tumpatan</option>
                                <option value="Goyang">Goyang</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-sm-12">
                            <label for="kd_penyakit" class="form-label">Diagnosa</label>
                            <select class="form-select" width="100%" id="kd_penyakit" name="kd_penyakit"></select>
                        </div>
                        <div class="col-xl-6 col-sm-12">
                            <label for="kd_tindakan" class="form-label">Tindakan</label>
                            <select class="form-select" width="100%" id="kd_tindakan" name="kd_tindakan"></select>
                        </div>
                        <div class="col-xl-12 col-sm-12">
                            <label for="hasil">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="simpanPemeriksaanGigi()"><i class="ti ti-device-floppy"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var modalPemeriksaanGigiHasil = $('#modalPemeriksaanGigiHasil')
        var formPemeriksaanGigiHasil = $('#formPemeriksaanGigiHasil')
        var selectKdPenyakit = formPemeriksaanGigiHasil.find('select[name=kd_penyakit]')
        var selectKdTindakan = formPemeriksaanGigiHasil.find('select[name=kd_tindakan]')
        modalPemeriksaanGigiHasil.on('shown.bs.modal', () => {
            var no_rawat = formPemeriksaanGigi.find('input[name=no_rawat]').val();
            selectPenyakit(selectKdPenyakit, modalPemeriksaanGigiHasil)
            selectTindakan(selectKdTindakan, modalPemeriksaanGigiHasil)

        });

        function simpanPemeriksaanGigi() {
            const data = getDataForm('formPemeriksaanGigiHasil', ['input', 'select', 'textarea']);
            data['no_rawat'] = formPemeriksaanGigi.find('input[name=no_rawat]').val();
            $.post(`${url}/pemeriksaan/gigi`, data).done((response) => {
                renderHasilGigi(data['no_rawat']);
                alertSuccessAjax();
                formPemeriksaanGigiHasil.trigger('reset');
                modalPemeriksaanGigiHasil.modal('hide')
            }).fail((response) => {
                alertErrorAjax(response);
            })
        }
    </script>
@endpush
