<div class="table-responsive mb-2" style="height:180px;overflow-y:auto">
    <input type="hidden" id="no_resep" name="no_resep">
    <table class="table d-none table-sm mb-2" id="tabelResepRacikan">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Racikan</th>
                <th width="10%">Jumlah</th>
                <th>Metode</th>
                <th>Aturan Pakai</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-primary d-none" id="btnTambahRacikan" onclick="tambahBarisRacikan()">Tambah Racikan</button>
    <button type="button" class="btn btn-sm btn-success d-none" id="btnSimpanRacikan" onclick="simpanRacikan()">Simpan Racikan</button>
</div>
@include('content.pemeriksaan.modal._modalEditRacikan')
@push('script')
    <script>
        function setResepRacikan(no_resep) {
            getResepRacikan(no_resep).done((response) => {
                if (response.length) {
                    $('#tabelResepRacikan').removeClass('d-none');
                    $('#tabelResepRacikan').find('tbody').empty();
                    response.map((racikan, index) => {
                        let obat = '';
                        let detailObat = '';
                        if (racikan.detail.length) {
                            obat = racikan.detail.map((isian) => {
                                return `<span class="badge badge-outline text-purple" style="font-size:10px">${isian.obat.nama_brng} ${isian.kandungan} gr</span>`
                            })
                            detailObat = `<tr>
                                    <td></td>
                                    <td colspan="5">
                                        ${obat}    
                                    </td>
                                </tr>`;
                        }
                        const row = `<tr>
                                <td>${racikan.no_racik}</td>
                                <td>${racikan.nama_racik}</td>
                                <td>${racikan.jml_dr}</td>
                                <td>${racikan.metode.nm_racik}</td>
                                <td>${racikan.aturan_pakai}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-yellow" onclick="editRacikan('${racikan.no_racik}', '${no_resep}')"><i class="ti ti-pencil"></i> Edit</button>
                                    <button type="button" class="ms-1 btn btn-sm btn-outline-danger" onclick="hapusRacikan('${racikan.no_racik}', '${no_resep}')"><i class="ti ti-trash-x"></i> Hapus</button>
                                </td>
                            </tr>
                            ${detailObat}`

                        $('#tabelResepRacikan tbody').append(row);
                    })

                }
            })
        }

        function getResepRacikan(no_resep, no_racik = '') {
            const racikan = $.get('resep/racikan/get', {
                no_resep: no_resep,
                no_racik: no_racik,
            })

            return racikan;
        }

        function simpanRacikan() {
            const rowRacikan = $('#tabelResepRacikan').find('tbody').find('tr').length
            const noResep = $('#no_resep').val()

            let dataRacikan = [];

            for (let index = 0; index < rowRacikan; index++) {
                const findRow = $(`#rowRacikan${index}`)

                if (findRow.length) {
                    const noRacik = $(`#noRacik${index}`).val()
                    const nmRacik = $(`#nmRacik${index}`).val()
                    const jml = $(`#jmlDr${index}`).val()
                    const metode = $(`#metode${index}`).val()
                    const aturan = $(`#aturan${index}`).val()
                    const racikan = {
                        no_resep: noResep,
                        no_racik: noRacik,
                        nama_racik: nmRacik,
                        jml_dr: jml,
                        kd_racik: metode,
                        aturan_pakai: aturan,
                        keterangan: '-',

                    }
                    // ambil objek yang kosong
                    const isEmpty = Object.values(racikan).filter((item) => {
                        return item == null
                    }).length
                    // cek apakah ada objek yang kosong 
                    if (isEmpty) {
                        const errorMsg = {
                            status: 422,
                            statusText: 'Pastikan tidak ada kolom yang kosong'
                        }
                        alertErrorAjax(errorMsg)
                        return false;
                    }
                    // push data 
                    dataRacikan.push(racikan)

                }
            }
            createResepRacikan(dataRacikan).done((response) => {
                alertSuccessAjax().then(() => {
                    setResepRacikan(noResep)
                })
            })

        }

        function hapusRacikan(no_racik, no_resep) {
            Swal.fire({
                title: "Yakin hapus racikan ini ?",
                html: "Anda tidak bisa mengembalikan racikan ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Iya, Yakin",
                cancelButtonText: "Tidak, Batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteResepRacikan(no_racik, no_resep).done((response) => {
                        alertSuccessAjax().then(() => {
                            setResepRacikan(no_resep)
                        })
                    });
                }
            });

        }

        function editRacikan(no_racik, no_resep) {
            getResepRacikan(no_resep, no_racik).done((racik) => {

                const modalDetailRacikan = $('#modalDetailRacikan')
                const selectMetodeRacik = modalDetailRacikan.find('select[name="metode"]')
                modalDetailRacikan.find('input[name="no_resep"]').val(racik.no_resep)
                modalDetailRacikan.find('input[name="nama_racik"]').val(racik.nama_racik)
                modalDetailRacikan.find('input[name="jml_dr"]').val(racik.jml_dr)
                modalDetailRacikan.find('input[name="aturan_pakai"]').val(racik.aturan_pakai)
                modalDetailRacikan.modal('show')
                $.get('metode/racik/get').done((metodes) => {
                    selectMetodeRacik.empty()
                    const metode = metodes.map((items) => {
                        return `<option value="${items.kd_racik}" ${racik.kd_racik === items.kd_racik ? 'selected' :''}>${items.nm_racik}</option>`
                    })
                    selectMetodeRacik.append(metode)
                })
            })
        }

        function createResepRacikan(data) {
            const racikan = $.post('resep/racikan/create', {
                data
            })
            return racikan;
        }

        function deleteResepRacikan(no_racik, no_resep) {
            const racikan = $.post('resep/racikan/delete', {
                no_racik: no_racik,
                no_resep: no_resep
            })
            return racikan;
        }

        function tambahBarisRacikan() {
            const tabel = $('#tabelResepRacikan').find('tbody')
            const rowCount = tabel.find('tr').length;
            const modalCppt = $('modalCppt');
            const addRow = `<tr id="rowRacikan${rowCount}">
                <td id="colNoRacik${rowCount}"><input type="hidden" name="no_racik[]" id="noRacik${rowCount}" value="${rowCount+1}"/>${rowCount+1}</td>
                <td><select class="form-control" name="nm_racik[]" id="nmRacik${rowCount}" data-id="${rowCount}" style="width:100%"></select></td>
                <td><input class="form-control" type="text" name="jml_dr[]" id="jmlDr${rowCount}" /></td>
                <td><select class="form-control" name="metode[]" id="metode${rowCount}" style="width:100%"></select></td>
                <td><input class="form-control" type="text" name="aturan[]" id="aturan${rowCount}" /></td>
                <td><i class="ti ti-square-rounded-x text-danger" style="font-size:20px" data-id="row${rowCount}" onclick="hapusBarisRacikan('${rowCount}')"></i></td>
            </tr>`;

            tabel.append(addRow)
            const racikan = $(`#nmRacik${rowCount}`)
            const metode = $(`#metode${rowCount}`)
            selectMetode(racikan, modalCppt)
            selectMetode(metode, modalCppt)
        }

        function hapusBarisRacikan(id) {
            const nextId = parseInt(id) + parseInt(1);
            const rowId = $('#rowRacikan' + nextId).attr('id', `rowRacikan${id}`);

            rowId.find('i').attr('onclick', `hapusBarisRacikan(${id})`);
            rowId.find(`#noRacik${nextId}`).val(nextId)
            $('#rowRacikan' + id).remove();

            const colId = $(`#colNoRacik${nextId}`)
            colId.html(nextId)
            colId.attr('id', `colNoRacik${id}`)
        }

        function selectMetode(element, parrent) {
            element.select2({
                dropdownParent: parrent,
                delay: 2,
                tags: true,
                ajax: {
                    url: 'metode/racik/get',
                    dataType: 'JSON',

                    data: (params) => {
                        const query = {
                            racik: params.term
                        }
                        return query
                    },
                    processResults: (data) => {
                        return {
                            results: data.map((item) => {
                                const items = {
                                    id: item.kd_racik,
                                    text: item.nm_racik,
                                }
                                return items;
                            })
                        }
                    }

                },
                cache: true
            }).on('select2:select', (e) => {
                e.preventDefault();
            })
        }
    </script>
@endpush
