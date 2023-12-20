<div class="modal modal-blur fade" id="modalCppt" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modalCppt modal-fullscreen modal-scrolled" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemeriksaan / CPPT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._form')
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._riwayat')
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._tabResep')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="simpanPemeriksaanRalan()"><i class="ti ti-device-floppy"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('#modalCppt').on('hidden.bs.modal', (e) => {
            $(e.currentTarget).find('#formCpptRajal').find('input, textarea').val('-')
        })
    </script>
@endpush
