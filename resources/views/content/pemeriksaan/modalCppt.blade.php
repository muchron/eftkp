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
                <button type="button" class="btn btn-success" onclick="simpanPemeriksaanRalan()"><i class="ti ti-device-floppy me-1"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var tabObat = $('#tabObat');
        $('#modalCppt').on('hidden.bs.modal', (e) => {
            $(e.currentTarget).find('#formCpptRajal').find('input, textarea').val('-')
        })
        $('#modalCppt').on('shown.bs.modal', (e) => {
            switcTab(tabObat)
        })

        function switcTab(tabElement, target = '') {
            $('.nav-link').removeClass('active');
            $('.tab-pane').removeClass('show active');

            if (target) {
                const element = tabElement.find(`a[href="#${target}"]`)
                $(element).addClass('active')
                $(target).addClass('show active');
            } else {
                tabElement.find('a').each((index, element) => {
                    if (index == 0) {
                        const target = $(element).attr('href')
                        $(element).addClass('active')
                        $(target).addClass('show active');
                    }
                })
            }

        }
    </script>
@endpush
