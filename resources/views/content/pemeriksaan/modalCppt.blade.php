<div class="modal modal-blur fade" id="modalCppt" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modalCppt modal-fullscreen modal-scrolled" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title">Pemeriksaan / CPPT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="modal-body p-0">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs flex-row-reverse" id="navTabCppt" data-bs-toggle="tabs" role="tablist">
                            <li class="nav-item ms-auto" role="presentation">
                                <a href="#tabsFormCppt" class="nav-link disabled text-dark" title="judul" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                    PEMERIKSAAN / CPPT
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tabsRiwayat" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">RIWAYAT</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tabsFormCppt" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">FORM CPPT</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content p-3">
                    <div class="tab-pane fade active show" id="tabsFormCppt" role="tabpanel">
                        @include('content.pemeriksaan.modal._form')
                    </div>
                    <div class="tab-pane fade" id="tabsRiwayat" role="tabpanel">
                        <h4>RIWAYAT</h4>
                        <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                    </div>
                    <div class="tab-pane fade" id="tabs-activity-8" role="tabpanel">
                        <h4>Activity tab</h4>
                        <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="simpanPemeriksaanRalan()">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('#modalCppt').on('hidden.bs.modal', () => {
            $(this).find('input, textarea').val('')
            document.getElementById("formCpptRajal").reset();
        })
    </script>
@endpush
