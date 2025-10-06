@extends('layout')

@section('body')
    <div class="container-xl">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-lg-12 col-md-12 col-sm-12" id="cardListTemplate">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table table-hover table-striped w-100 fs-5" id="tbPaketObat">
                            </table>
                        </div>
                    </div>
                    <div class="card-footer justify-content-between d-flex">
                        <select class="form-select form-select-sm me-2" id="selectDokterTemplate"
                                style="width:30% !important">

                        </select>
                        <button type="button" class="btn btn-primary" id="btnCreateTemplateRacikan"
                                onclick="createPaketObat()">
                            <i class="ti ti-plus me-2"></i> Buat Template
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12" id="cardPaketObat">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Form Template Racikan</h3>
                        <button type="button" class="btn-close" onclick="" id="closeCardPaketObat"></button>
                    </div>
                    <div class="card-body">
                        <form action="" id="formPaketObat">
                            <div class="mb-2">
                                <input type="hidden" class="form-label" id="id" name="id">
                                <label for="nm_racikan" class="form-label">Nama Racikan</label>
                                <input type="text" class="form-control" id="nm_racik" name="nm_racik" value="">
                            </div>
                            <div class="mb-2">
                                <label for="nm_racikan" class="form-label">Dokter</label>
                                <select class="form-select" id="kd_dokter" name="kd_dokter" style="width:100%"></select>
                            </div>
                            <div class="mb-2">
                                <label for="nm_racikan" class="form-label">Obat</label>
                                <div id="listObat">

                                </div>
                                <button type="button" class="btn btn-sm btn-primary mt-2" id="btnTambahObat"><i
                                            class="ti ti-plus me-2"></i> Tambah Obat
                                </button>
                            </div>
                            <div class="mb-2">
                                <button type="button" class="btn btn-success" style="width:100%" id="btnSimpanTemplate">
                                    <i class="ti ti-device-floppy ms-2"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            renderTablePaketObat()
        })

        function renderTablePaketObat() {
            const tableResepPaketan = new DataTable('#tbPaketObat', {
                responsive: true,
                stateSave: true,
                serverSide: true,
                destroy: true,
                processing: true,
                fixedHeader: false,
                scrollY: setTableHeight(),
                ajax: {
                    url: "/efktp/paket-obat/datatable",
                },
                columns: [{
                    title: 'Paket',
                    data: 'nama',
                    width: '15%',
                }, {
                    title: "Poliklinik",
                    data: 'poliklinik.nm_poli',
                    width: '20%'
                }, {
                    title: 'Umum',
                    data: 'umum',
                    render: (data, type, row) => {
                        if (!data) {
                            return;
                        }
                        return data.map((item, index) => {
                            return `<span class="badge bg-purple-lt">
                                    ${item.databarang.nama_brng}
                                </span>`
                        }).join(', ');
                    }
                }, {
                    title: 'Racikan',
                    data: 'racikan',
                    render: (data, type, row) => {
                        if (!data) {
                            return;
                        }
                        return data.map((item, index) => {
                            return `<span class="badge bg-orange-lt">${item.template.nm_racik}</span>`
                        }).join(', ')
                    }
                }, {
                    title: '',
                    data: 'id',
                    render: (data, type, row) => {
                        return `<div class="d-flex justify-content-between"><button class="btn btn-sm btn-ghost-warning">
                                <i class="ti ti-pencil"></i> Ubah
                        </button><button class="btn btn-sm btn-ghost-danger">
                                <i class="ti ti-trash"></i> Hapus
                        </button></div>`
                    }
                }]

            })
        }
    </script>

@endpush
