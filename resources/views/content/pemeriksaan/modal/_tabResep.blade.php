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
                    {{-- <form action="resep/umum/create" method="POST" id="formResepUmum"> --}}
                    <table class="table d-none" id="tabelResepUmum">
                        <thead>
                            <tr>
                                <th width="40%">Obat</th>
                                <th width="10%">Jumlah</th>
                                <th>Aturan Pakai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    {{-- </form> --}}
                    <button type="button" class="btn btn-sm btn-primary d-none" id="btnTambahObat">Tambah Obat</button>
                    <button type="button" class="btn btn-sm btn-primary" id="btnTambahResep">Buat Resep</button>
                    <button type="button" class="btn btn-sm btn-success d-none" id="btnSimpanResep">Simpan Resep</button>
                </div>
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
        $(document).ready(() => {
            // $('select.form-select').select2({
            //     dropdownParent: $('#modalCppt'),
            //     data: [{
            //         id: 2,
            //         text: 'one'
            //     }]
            // })

        })

        $('#btnSimpanResep').on('click', (e) => {
            e.preventDefault();
            const rowCount = $('#tabelResepUmum').find('tr').length
            let dataObat = [];
            for (let index = 1; index < rowCount; index++) {
                console.log('INDEX==', index);
                obat = {
                    'no_resep': $(`#kdObat${index}Val`).val(),
                    'kode_brng': $(`#kdObat${index}Val`).val(),
                    'jumlah': $(`#jmlObat${index}`).val(),
                    'aturan_pakai': $(`#aturan${index}`).val(),
                }
                dataObat.push(nilai)
            }
            console.log('DATAS ===', datas);
        })

        function createResepObat(no_rawat, status) {
            const resep = $.post('/resep/obat/create', {
                no_rawat: no_rawat,
                kd_dokter: kd_dokter,
                status: status,
            });

            return resep;
        }


        function tambahResep(no_rawat) {
            const btnTambahResep = $('#btnTambahResep')
            const btnTambahObat = $('#btnTambahObat')
            const btnSimpanObat = $('#btnSimpanResep')
            const tabelResepUmum = $('#tabelResepUmum')

            tabelResepUmum.removeClass('d-none')

            btnTambahResep.removeClass('btn-primary').addClass('btn-danger');
            btnTambahResep.attr('onclick', `hapusResep('${no_rawat}')`)
            btnTambahResep.text('Hapus Resep')

            btnSimpanObat.removeClass('d-none')
            btnTambahObat.removeClass('d-none')

            tambahBarisObat(tabelResepUmum);

        }

        $('#btnTambahObat').on('click', () => {
            const tabelResepUmum = $('#tabelResepUmum');
            tambahBarisObat(tabelResepUmum);
        })

        function tambahBarisObat(tabel) {
            let rowCount = tabel.find('tr').length
            const addRow = `<tr id="row${rowCount}">
                <td><select class="form-control" name="nm_obat[]" id="kdObat${rowCount}" data-id="${rowCount}" style="width:100%"></select></td>
                <td>
                    <input type="hidden" name="kode_brng[]" id="kdObat${rowCount}Val"/>
                    <input type="text" class="form-control" name="jumlah[]" id="jmlObat${rowCount}"/>
                </td>
                <td><input class="form-control form-control-sm" name="aturan_pakai[]" id="aturan${rowCount}"/></td>
                <td><i class="ti ti-square-rounded-x text-danger fs-100"></i></td>
            </tr>`;
            tabel.append(addRow);
            const idElement = $(`#kdObat${rowCount}`);
            renderAutocomplete(idElement)
        }

        function renderAutocomplete(element) {
            element.select2({
                dropdownParent: $('#modalCppt'),
                delay: 5,
                scrollAfterSelect: true,
                ajax: {
                    url: 'barang/get',
                    dataType: 'JSON',

                    data: (params) => {
                        const query = {
                            barang: params.term
                        }
                        return query
                    },
                    processResults: (data) => {
                        console.log('DATA ===', data);
                        return {
                            results: data.map((item) => {
                                const items = {
                                    id: item.kode_brng,
                                    text: item.nama_brng,
                                }
                                return items;
                            })
                        }
                    }

                },
                cache: true

            });
            element.on('select2:select', (e) => {
                e.preventDefault();
                const kodeBarang = e.params.data.id;
                const targetId = e.currentTarget.id;
                const elementTargetId = $(`#${targetId}Val`)
                elementTargetId.val(kodeBarang)
            })
        }

        function hapusResep(no_rawat) {
            const btnTambahResep = $('#btnTambahResep')
            const btnSimpanObat = $('#btnSimpanResep')
            const btnTambahObat = $('#btnTambahObat')
            const tabelResepUmum = $('#tabelResepUmum')
            btnTambahResep.removeClass('btn-danger').addClass('btn-primary');
            tabelResepUmum.addClass('d-none')
            btnTambahResep.attr('onclick', `tambahResep('${no_rawat}')`)
            btnTambahResep.text('Buat Resep')
            btnSimpanObat.addClass('d-none')
            btnTambahObat.addClass('d-none')
            tabelResepUmum.find('tbody').empty();
        }
    </script>
@endpush
