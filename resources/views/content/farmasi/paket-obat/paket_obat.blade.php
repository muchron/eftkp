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
                        <select class="form-select form-select-sm me-2" id="kd_poli"
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
                <form action="" id="formPaketObat">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Paket Obat</h5>

                            <div class="mb-2">
                                <input type="hidden" class="form-label" id="id" name="id">
                                <label for="nm_racikan" class="form-label">Nama Paket</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="">
                            </div>
                            <div class="mb-2">
                                <label for="nm_racikan" class="form-label">Poliklinik</label>
                                <select class="form-select" id="kd_poli" name="kd_poli" style="width:100%"></select>
                            </div>
                            <div class="mb-2">
                                <label for="kode_brng[]" class="form-label">Obat</label>
                                <div id="listObat" class="form-fieldset p-2 bg-light">

                                </div>
                                <button type="button" class="btn btn-sm btn-primary" id="btnTambahObatPaket"><i
                                            class="ti ti-plus"></i> Tambah Obat
                                </button>
                            </div>
                            <div class="mb-2">
                                <label for="racikan[]" class="form-label">Racikan</label>
                                <div id="listObatRacikan" class="form-fieldset p-2 bg-light">

                                </div>
                                <button type="button" class="btn btn-sm btn-primary" id="btnTambahRacikPaket"><i
                                            class="ti ti-plus"></i> Tambah Racikan
                                </button>
                            </div>
                            <div class="mb-2">
                                <button type="button" class="btn btn-success" style="width:100%"
                                        id="btnCreatePaketObat">
                                    <i class="ti ti-device-floppy ms-2"></i> Simpan
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/template" id="rowContentPaketObat">
        <div class="d-flex gap-1 justify-content-between content-obat mb-1">
            <select class="form-select-2" data-dropdown-parent="body" style="width: 90%" name="kode_brng[]"></select>
            <input class="form-control jumlah w-25" name="jumlah[]" placeholder="Jumlah" value="1"/>
            <div class="input-group w-50">
                <input class="form-control aturan_pakai" name="aturan_pakai[]" placeholder="Aturan Pakai" value="-"
                       onfocus="return removeZero(this)" onblur="isEmpty(this)"/>
                <button class="btn btn-danger delete">
                    <i class="ti ti-x"></i>
                </button>
            </div>

        </div>
    </script>
    <script type="text/template" id="rowContentPaketRacik">
        <div class="d-flex gap-1 justify-content-between content-racik mb-1">
            <select class="form-select-2 template" data-dropdown-parent="body"
                    name="id_template[]"></select>
            <select class="form-select-2 metode w-50" data-dropdown-parent="body" style=""
                    name="kd_racik[]"></select>
            <input class="form-control jumlah w-25" name="jumlah[]" placeholder="Jumlah" value="1"/>
            <div class="input-group w-50">
                <input class="form-control aturan_pakai" name="aturan_pakai[]" placeholder="Aturan Pakai" value="-"
                       onfocus="return removeZero(this)" onblur="isEmpty(this)"/>
                <button type="button" class="btn btn-danger delete-racik">
                    <i class="ti ti-x"></i>
                </button>
            </div>

        </div>
    </script>
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            renderTablePaketObat()
            const formPaketObat = $('#formPaketObat')
            selectPoliklinik(formPaketObat.find('#kd_poli'), $('body'))
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
                        return `
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-ghost-warning">
                    <i class="ti ti-pencil"></i> Ubah
                </button>
                <button class="btn btn-sm btn-ghost-danger" onclick="deletePaketObat(${data})">
                    <i class="ti ti-trash"></i> Hapus
                </button>
            </div>
            `
                    }
                }]

            })
        }

        function deletePaketObat(id) {
            Swal.fire({
                title: 'Hapus Paket Obat',
                html: `Yakin hapus data paket obat ini ?`,
                icon: 'warning',
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Iya, Hapus",
                cancelButtonText: "Tidak, Batalkan",
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/efktp/paket-obat/${id}`,
                        type: 'DELETE',
                        success: function (response) {
                            showToast('Berhasil Hapus Paket Obat');
                            renderTablePaketObat();
                        },
                        error: function (xhr, status, error) {
                            showToast('Gagal menghapus data paket obat' + xhr.responseJSON.message, 'error');
                        }
                    })
                }
            })
        }

        $('#btnTambahObatPaket').on('click', (e) => {
            let listObat = $('#listObat')
            let rowObat = $($('#rowContentPaketObat').html());

            listObat.append(rowObat)

            const select = listObat.find('.form-select-2')

            selectDataBarang(select, $('body'))

            select.on('select2:select', () => {
                select.find('option:selected').attr('data-jumlah', 1)
            })
        })

        $('#btnTambahRacikPaket').on('click', (e) => {
            let listObatRacikan = $('#listObatRacikan')
            let rowRacikan = $($('#rowContentPaketRacik').html())

            listObatRacikan.append(rowRacikan)

            console.log(listObatRacikan.find('.metode'))

            selectMetode(listObatRacikan.find('.metode'), $('body'))

            rowRacikan.find('.template').select2({
                placeholder: 'Pilih Template Racikan...',
                width: '100%',
                ajax: {
                    url: '/efktp/resep/racikan/template/search',
                    dataType: 'JSON',

                    data: (params) => {
                        return {
                            nm_racik: params.term
                        }
                    },
                    processResults: (data) => {
                        return {
                            results: data.map((item) => {
                                console.log(item)
                                return {
                                    id: item.id,
                                    text: item.nm_racik,
                                    detail: item.detail,
                                    dokter: item.dokter,
                                }

                            })
                        }
                    }
                },
                escapeMarkup: (m) => m, // biar HTML diizinkan
                templateResult: function (item) {
                    if (item.loading) return item.text;
                    if (!item.detail) return `<div>${item.text}</div>`;

                    // ambil nama dokter
                    const dokterNama = item.dokter ? item.dokter.nm_dokter : '-';

                    let html = `
                                  <div class="racikan-item">
                                    <div><strong>${item.text}</strong></div>
                                    <small style="color:#888;">Dokter: ${dokterNama}</small>
                                    <ul style="margin:4px 0 0 10px; padding:0;">`;

                    item.detail.forEach(d => {
                        html += `
                                <li style="font-size:9px; list-style:none;">
                                  ${d.barang.nama_brng}
                                  <span style="color:#999;">(${d.barang.kode_sat})</span>
                                  — <strong>${d.barang.ralan.toLocaleString()}</strong>
                                </li>`;
                    });

                    html += `</ul></div>`;
                    return html;
                },
                templateSelection: function (item) {
                    return item.text || item.id;
                },
            })

        })

        $('#btnCreatePaketObat').on('click', (e) => {
            const dataObat = [];
            const dataRacik = [];

            $('#listObat .content-obat').each(function () {
                const kode_brng = $(this).find('.form-select-2').val();
                const jumlah = $(this).find('.jumlah').val();
                const aturan = $(this).find('.aturan_pakai').val();

                // Tambahkan ke array
                dataObat.push({
                    kode_brng: kode_brng,
                    jumlah: jumlah,
                    aturan_pakai: aturan
                });
            });
            $('#listObatRacikan .content-racik').each(function () {
                const id_template = $(this).find('.template').val();
                const jumlah = $(this).find('.jumlah').val();
                const aturan = $(this).find('.aturan_pakai').val();
                const kd_racik = $(this).find('.metode').val();

                // Tambahkan ke array
                dataRacik.push({
                    id_template: id_template,
                    jumlah: jumlah,
                    kd_racik: kd_racik,
                    aturan_pakai: aturan
                });
            });

            const data = {
                nama: $('#formPaketObat').find('#nama').val(),
                kd_poli: $('#formPaketObat').find('#kd_poli').val(),
                umum: dataObat,
                racik: dataRacik
            }

            $.post(`/efktp/paket-obat`, data).done((response) => {
                renderTablePaketObat()
                showToast('Berhasil membuat paket obat')
            }).fail((xhr, status, error) => {
                console.log(xhr)
                showToast(xhr.responseJSON.message, 'error')
            })
        })

        // Hapus baris obat saat tombol di dalamnya diklik
        $('#listObat').on('click', '.delete', function (e) {
            e.preventDefault(); // mencegah submit form kalau tombol ada di dalam <form>
            $(this).closest('.content-obat').remove(); // hapus baris terdekat
        });

        $('#listObatRacikan').on('click', '.delete-racik', function (e) {
            e.preventDefault(); // mencegah submit form kalau tombol ada di dalam <form>
            console.log($(this).closest('.content-racik'))
            $(this).closest('.content-racik').remove(); // hapus baris terdekat
        });
    </script>

@endpush
