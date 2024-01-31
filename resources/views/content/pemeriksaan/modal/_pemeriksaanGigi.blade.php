<div class="modal modal-blur fade" id="modalPemeriksaanGigi" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Pemeriksaan Gigi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" id="">
                <div class="card border-0">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tabs-home-ex2" class="nav-link active" data-bs-toggle="tab">
                                    <i class="ti ti-users me-2"></i> Form Pemeriksaan</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-profile-ex2" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-list me-2"></i> Riwayat</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-home-ex2">
                                @include('content.pemeriksaan.modal.gigi._periksaGigi')
                            </div>
                            <div class="tab-pane" id="tabs-profile-ex2">
                                @include('content.pemeriksaan.modal.gigi._riwayatPeriksaGigi')
                            </div>
                            <div class="tab-pane" id="tabs-settings-ex2">
                                <h4>Settings tab</h4>
                                <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="simpanDetailRacikan()"><i class="ti ti-device-floppy"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- @include('content.pemeriksaan.modal.gigi._periksaGigi') --}}
{{-- @include('content.pemeriksaan.modal.gigi._pemeriksaanGigiHasil') --}}
@push('script')
    <script></script>
@endpush
