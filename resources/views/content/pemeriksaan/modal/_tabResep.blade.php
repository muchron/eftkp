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
                <div class="table-responsive mb-2">
                    <table class="table d-none" id="tabelResepUmum">
                        <thead>
                            <tr>
                                <th>Obat</th>
                                <th>Jumlah</th>
                                <th>Aturan Pakai</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-sm btn-primary" id="btnTambahResep">Buat Resep</button>
                <button type="button" class="btn btn-sm btn-success d-none" id="btnSimpanResep">Simpan Resep</button>
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

        function tambahResep(no_rawat) {
            const btnTambahObat = $('#btnTambahResep')
            const btnSimpanObat = $('#btnSimpanResep')
            const tabelResepUmum = $('#tabelResepUmum')

            tabelResepUmum.removeClass('d-none')

            btnTambahObat.removeClass('btn-primary').addClass('btn-danger');
            btnTambahObat.attr('onclick', `hapusResep('${no_rawat}')`)
            btnTambahObat.text('Hapus Resep')

            btnSimpanObat.removeClass('d-none')
        }

        function hapusResep(no_rawat) {
            const btnTambahObat = $('#btnTambahResep')
            const btnSimpanObat = $('#btnSimpanResep')
            const tabelResepUmum = $('#tabelResepUmum')
            btnTambahObat.removeClass('btn-danger').addClass('btn-primary');
            tabelResepUmum.addClass('d-none')
            btnTambahObat.attr('onclick', `tambahResep('${no_rawat}')`)
            btnTambahObat.text('Tambah Resep')
            btnSimpanObat.addClass('d-none')

        }
    </script>
@endpush
