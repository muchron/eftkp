<div class="modal modal-blur fade" id="modalDetailRacikan" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
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
                        <input type="hidden" name="no_racik" readonly />
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
                    <input type="hidden" id="nextIdDetail">
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
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="simpanDetailRacikan()"><i class="ti ti-device-floppy"></i> Simpan Resep</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var tabelObatRacikan = $('#tabelObatRacikan')
        var bodyObatRacikan = tabelObatRacikan.find('tbody');

        $('#modalDetailRacikan').on('hidden.modal.bs', () => {
            bodyObatRacikan.empty()
        })
        $('#btnTambahObatRacikan').on('click', (e) => {
            const nextIdDetail = $('#nextIdDetail').val()
            const rowCount = nextIdDetail ? parseInt(nextIdDetail) + 1 : tabelObatRacikan.find('tr').length

            const row = `<tr id="rowDetailRacikan${rowCount}">
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
                    <td><input class="form-control" id="jml${rowCount}" data-id="${rowCount}" name="jml[]"></td>
                    <td><button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusBarisDetailObat(${rowCount})"><i class="ti ti-trash-x"></i> Hapus</button></td>
                </tr>`;
            bodyObatRacikan.append(row)
            $('#nextIdDetail').val(rowCount)
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
            getDetailRacikan(no_racik, no_resep).done((response) => {
                bodyObatRacikan.empty();
                if (response.length) {
                    const detail = response.map((item, index) => {
                        const indexNum = index + parseInt(1)
                        const row = `<tr id="rowDetailRacikan${indexNum}">
                                    <td>
                                        <select class="form-control" id="obat${indexNum}" name="kd_obat[]" style="width:100%">
                                            <option value="${item.kode_brng}">${item.obat.nama_brng}</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control" id="kapasitas${indexNum}" data-id="${indexNum}" name="kapasitas[]" readonly value="${item.obat.kapasitas}"></td>
                                    <td><input class="form-control" id="p1${indexNum}" data-id="${indexNum}" name="p1[]" value="${item.p1}" onkeyup="hitungPembagi(${indexNum})"></td>
                                    <td>/</td>
                                    <td><input class="form-control" id="p2${indexNum}" data-id="${indexNum}" name="p2[]" value="${item.p2}" onkeyup="hitungPembagi(${indexNum})"></td>
                                    <td>
                                        <div class="input-group input-group-flat">
                                            <input class="form-control" id="dosis${indexNum}" data-id="${indexNum}" name="dosis[]" onkeyup="hitungDosis(${indexNum})" value="${item.kandungan}">
                                            <span class="input-group-text">
                                                mg
                                            </span>
                                        </div>
                                    </td>
                                    <td><input class="form-control" id="jml${indexNum }" data-id="${indexNum }" name="jml[]" value="${item.jml}"></td>
                                    <td><button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusBarisDetailObat(${indexNum})"><i class="ti ti-trash-x"></i> Hapus</button></td>
                            </tr>`
                        bodyObatRacikan.append(row)
                        const selectObat = $(`#obat${indexNum}`)
                        const val = selectObat.val(`${item.kode_brng}`).trigger('change')
                        selectDataBarang(selectObat, $('#modalDetailRacikan')).on('select2:select', (e) => {
                            e.preventDefault();
                            const jml_dr = $('#modalDetailRacikan').find('input[name=jml_dr]').val()
                            const data = e.params.data.detail
                            $(`#kapasitas${index}`).val(data.kapasitas)
                            $(`#dosis${index}`).val(data.kapasitas)
                            $(`#jml${index}`).val(jml_dr)
                        })
                    })
                    $('#nextIdDetail').val(detail.length + 1)

                }
            })
        }

        function getDetailRacikan(no_racik, no_resep) {
            const getDetail = $.get('resep/racikan/detail/get', {
                no_racik: no_racik,
                no_resep: no_resep,
            })
            return getDetail
        }

        function createDetailRacikan(no_resep, no_racik, data) {
            const detailRacikan = $.post('resep/racikan/detail/create', {
                no_resep: no_resep,
                no_racik: no_racik,
                data: data,
            })
            return detailRacikan
        }

        function deleteDetailRacikan(no_resep, no_racik, obat = '') {
            const hapus = $.post('resep/racikan/detail/delete', {
                no_resep: no_resep,
                no_racik: no_racik,
                obat: obat
            })
            return hapus;
        }

        function hapusBarisDetailObat(id) {
            const tabelObatRacikan = $('#tabelObatRacikan').find('tbody')
            const nextId = parseInt(id) + parseInt(1)
            const rowId = $(`#rowDetailRacikan${nextId}`).attr('id', `rowDetailRacikan${id}`);

            rowId.find('button').attr('onclick', `hapusBarisDetailObat('${id}')`);
            $(`#rowDetailRacikan${id}`).remove()
            const selectObat = rowId.find('select').attr('id', `obat${id}`)
        }

        function simpanDetailRacikan() {
            const jumlahRow = $('#nextIdDetail').val()
            const noResep = $('#modalDetailRacikan').find('input[name=no_resep]').val();
            const noRacik = $('#modalDetailRacikan').find('input[name=no_racik]').val();
            const nm_racik = $('#modalDetailRacikan').find('input[name=nama_racik]').val();
            const kd_dokter = $('#formCpptRajal').find('input[name=nip]').val();

            let dataObat = [];
            for (let index = 0; index <= jumlahRow; index++) {
                const findRow = $(`#rowDetailRacikan${index}`)
                if (findRow.length) {
                    const kode_brng = $(`#obat${index}`).val();
                    const p1 = $(`#p1${index}`).val();
                    const p2 = $(`#p2${index}`).val();
                    const kandungan = $(`#dosis${index}`).val();
                    const jml = $(`#jml${index}`).val();
                    const obatRacikan = {
                        no_resep: noResep,
                        no_racik: noRacik,
                        kode_brng: kode_brng,
                        p1: p1,
                        p2: p2,
                        kandungan: kandungan,
                        jml: jml,
                    }
                    const isEmpty = Object.values(obatRacikan).filter((item) => {
                        return item == null || item == ''
                    }).length

                    if (isEmpty) {
                        const errorMsg = {
                            status: 422,
                            statusText: 'Pastikan tidak ada kolom yang kosong'
                        }
                        alertErrorAjax(errorMsg)
                        return false;
                    }

                    dataObat.push(obatRacikan)
                }

            }
            createDetailRacikan(noResep, noRacik, dataObat).done((response) => {
                // $('#modalDetailRacikan').modal('hide')
                setResepRacikan(noResep)
                tulisPlan(noResep)
                $.get('resep/racikan/template/get', {
                    nm_racik: nm_racik
                }).done((response) => {
                    if (!Object.values(response).length) {
                        Swal.fire({
                            title: "Racikan belum ada template, ",
                            html: "Buatkan template untuk racikan ini ?",
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Iya, Buat",
                            cancelButtonText: "Tidak"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.post('resep/racikan/template/create', {
                                    kd_dokter: kd_dokter,
                                    nm_racik: nm_racik,
                                    obat: dataObat,
                                }).done((resTemplate) => {
                                    alertSuccessAjax('Template racikan dibuat')
                                })
                            }
                        });
                    }
                })
            })
        }
    </script>
@endpush
