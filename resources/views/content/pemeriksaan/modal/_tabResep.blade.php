<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#tabsResepUmum" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Umum</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabsResepRacikan" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Racikan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabsRiwayatResep" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Riwayat</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tabsResepUmum" role="tabpanel">
                <div class="row gy-2 mb-2 inputResepUmum" id="inputResepUmum1" data-id="1" style="display: none">
                    <div class="col-xl-5 col-lg-5 col-md-12">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12">
                        <div class="input-group">
                            <button type="button" class="btn btn-primary" id="btnTambahUmum" data-id="1" onclick="addBaris(this,'1')">+</button>
                            <button type="button" class="btn btn-danger" id="btnTambahUmum" data-id="1" onclick="removeBaris(this,'1')">-</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary" id="btnTambahObat">+ Tambah Obat</button>
            </div>
            <div class="tab-pane fade" id="tabsResepRacikan" role="tabpanel">
                <h4>Profile tab</h4>
                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
            </div>
            <div class="tab-pane fade" id="tabsRiwayatResep" role="tabpanel">
                <h4>Activity tab</h4>
                <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(() => {})

        const element = document.getElementByClassName('inputResepUmum');
        $('#btnTambahObat').on('click', (e) => {
            $('.inputResepUmum').show();
            $('#btnTambahObat').removeClass('btn-primary').addClass('btn-danger');
        })
    </script>
@endpush
