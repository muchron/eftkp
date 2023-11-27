<div class="modal modal-blur fade show" id="modalDetailRacikan" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Detail Racikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="">
                <div class="row form-fieldset">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <label for="no_resep">Nomor Resep</label>
                        <input type="text" class="form-control" name="no_resep" readonly />
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <label for="nm_racik">Nama Racik</label>
                        <input type="text" class="form-control" name="nama_racik" />
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <label for="nm_racik">Metode</label>
                        <select class="form-select" name="metode"></select>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <label for="jml_dr">Jumlah Racikan</label>
                        <input type="text" class="form-control" name="jml_dr" readonly />
                    </div>
                    <div class="col-xl-4 col-lg-2 col-md-4 col-sm-12">
                        <label for="aturan_pakai">Aturan Pakai</label>
                        <input type="text" class="form-control" name="aturan_pakai" />
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless table-sm" id="tabelObatRacikan">
                        <thead>
                            <tr>
                                <th width="20%">Nama Obat</th>
                                <th>Sediaan</th>
                                <th width="5%">P1</th>
                                <th></th>
                                <th width="5%">P2</th>
                                <th>Dosis</th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary" id="btnTambahObatRacikan"><i class="ti ti-plus"></i> Tambah Obat</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $('#btnTambahObatRacikan').on('click', (e) => {
            const tabelObatRacikan = $('#tabelObatRacikan').find('tbody')
            const rowCount = tabelObatRacikan.find('tr').length

            const row = `<tr>
                    <td><select class="form-control" id="obat${rowCount}" name="kd_obat[]" style="width:100%"></select></td>
                    <td><input class="form-control" id="kapasitas${rowCount}" data-id="${rowCount}" name="kapasitas[]" readonly></td>
                    <td><input class="form-control" id="p1${rowCount}" data-id="${rowCount}" name="p1[]" value="1" onkeyup="hitungPembagi(${rowCount})"></td>
                    <td>/</td>
                    <td><input class="form-control" id="p2${rowCount}" data-id="${rowCount}" name="p2[]" value="1" onkeyup="hitungPembagi(${rowCount})"></td>
                    <td>
                        <div class="input-group input-group-flat">
                            <input class="form-control" id="dosis${rowCount}" data-id="${rowCount}" name="dosis[]" onkeyup="hitungDosis(${rowCount})">
                            <span class="input-group-text">
                                mg
                            </span>
                        </div>
                    </td>
                    <td><input class="form-control" id="jml${rowCount}" data-id="${rowCount}" name="jml[]" readonly></td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger"><i class="ti ti-trash-x"></i> Hapus</button></td>
                </tr>`;
            tabelObatRacikan.append(row)
            const selectObat = $(`#obat${rowCount}`);
            selectDataBarang(selectObat, $('#modalDetailRacikan')).on('select2:select', (e) => {
                e.preventDefault();
                const jml_dr = $('#modalDetailRacikan').find('input[name=jml_dr]').val()
                const data = e.params.data.detail
                $(`#kapasitas${rowCount}`).val(data.kapasitas)
                $(`#dosis${rowCount}`).val(data.kapasitas)
                $(`#jml${rowCount}`).val(jml_dr)
            })
        })

        function hitungDosis(id) {
            const jml_dr = $('#modalDetailRacikan').find('input[name=jml_dr]').val();
            const kapasitas = $(`#kapasitas${id}`).val();
            const dosis = $(`#dosis${id}`).val();
            const p1 = $(`#p1${id}`).val();
            const p2 = $(`#p2${id}`).val();
            if (parseInt(dosis) <= parseInt(kapasitas)) {
                const jml_obat = (parseFloat(dosis) * parseFloat(jml_dr)) / parseFloat(kapasitas)
                $(`#jml${id}`).val(jml_obat)
                $(`#p1${id}`).val(1);
                $(`#p2${id}`).val(1);
            } else {
                Swal.fire(
                    'Ada yang salah !',
                    'Dosis tidak boleh lebih besar dari kapasitas obat',
                    'warning'
                ).then(() => {
                    $(`#dosis${id}`).val(0);
                });
            }

        }

        function hitungPembagi(id) {

            const jml_dr = $('#modalDetailRacikan').find('input[name=jml_dr]').val();
            const kapasitas = $(`#kapasitas${id}`).val();
            const p1 = $(`#p1${id}`).val();
            const p2 = $(`#p2${id}`).val();

            if (p1 != 0 && p2 != 0) {
                const dosis = parseFloat(kapasitas) * (parseFloat(p1) / parseFloat(p2));
                const jml_obat = (parseFloat(dosis) * parseFloat(jml_dr)) / parseFloat(kapasitas)
                $(`#dosis${id}`).val(dosis.toFixed(1));
                $(`#jml${id}`).val(jml_obat.toFixed(1));
            }

        }

        function setRacikanDetail(no_racik, no_resep) {

        }

        function getDetailRacikan(no_racik, no_resep) {

        }
    </script>
@endpush
