<div class="table-responsive mb-2" style="height:180px;overflow-y:auto">
    <input type="hidden" id="no_resep" name="no_resep">
    <table class="table table-sm d-none mb-2" id="tabelResepUmum">
        <thead>
            <tr>
                <th width="30%">Obat</th>
                <th>Jumlah</th>
                <th>Aturan Pakai</th>
                <th width="30%"></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-primary d-none" id="btnTambahObat">Tambah Obat</button>
    <button type="button" class="btn btn-sm btn-success d-none" id="btnSimpanResep">Simpan</button>
</div>
@push('script')
    <script>
        var tabelResepUmum = $('#tabelResepUmum')
        var bodyResepUmum = tabelResepUmum.find('tbody')

        function getResepDokter(no_resep) {
            const resepDokter = $.get('resep/dokter/get', {
                no_resep: no_resep
            })
            return resepDokter;
        }

        function deleteResepDokter(no_resep, kode_brng) {
            const resepDokter = $.post('resep/dokter/delete', {
                no_resep: no_resep,
                kode_brng: kode_brng,
            })
            return resepDokter
        }

        function setResepDokter(no_resep) {
            bodyResepUmum.empty()
            getResepDokter(no_resep).done((reseps) => {
                if (reseps.length) {
                    reseps.map((resepDokter, index) => {
                        const numb = parseInt(index) + 1
                        const row = `<tr id="row${numb}">
                            <td id="obatUmum${numb}">${resepDokter.obat.nama_brng}</td>    
                            <td id="jmlUmum${numb}">${resepDokter.jml} ${resepDokter.obat.satuan?.satuan}</td>    
                            <td id="aturanUmum${numb}">${resepDokter.aturan_pakai}</td>    
                            <td id="aksi${numb}">
                                <input type="hidden" id="noResep${numb}" value="${resepDokter.no_resep}"/>
                                <button type="button" class="btn btn-sm btn-outline-yellow" onclick="editObatDokter(${numb}, '${resepDokter.kode_brng}')"><i class="ti ti-pencil"></i> Ubah</button>
                                <button type="button" class="ms-1 btn btn-sm btn-outline-danger" onclick="hapusObatDokter(${no_resep}, '${resepDokter.kode_brng}')"><i class="ti ti-trash-x"></i>Hapus</button>
                            </td>    
                        </tr>`;
                        $('#tabelResepUmum tbody').append(row).fadeIn();
                    })
                }

            })
        }

        function hapusObatDokter(no_resep, kode_brng) {
            Swal.fire({
                title: "Yakin hapus obat ini ?",
                html: "Anda tidak bisa mengembalikan obat ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Iya, Yakin",
                cancelButtonText: "Tidak, Batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteResepDokter(no_resep, kode_brng).done((response) => {
                        alertSuccessAjax().then(() => {
                            setResepDokter(no_resep)
                        });
                    }).fail((request) => {
                        alertErrorAjax(request)
                    });
                }
            });
        }

        function tambahBarisObat(tabel) {
            let rowCount = tabel.find('tr').length
            const addRow = `<tr id="row${rowCount}">
                <td><select class="form-control" name="nm_obat[]" id="kdObat${rowCount}" data-id="${rowCount}" style="width:100%"></select></td>
                <td>
                    <input type="hidden" name="rowNext" id="rowNext" value="${rowCount+1}"/>
                    <input type="hidden" name="kode_brng[]" id="kdObat${rowCount}Val"/>
                    <input type="text" class="form-control" name="jumlah[]" id="jmlObat${rowCount}"/>
                </td>
                <td><input class="form-control form-control-sm" name="aturan_pakai[]" id="aturan${rowCount}"/></td>
                <td><i class="ti ti-square-rounded-x text-danger" style="font-size:20px" data-id="row${rowCount}" onclick="hapusBarisObat('${rowCount}')"></i></td>
            </tr>`;
            tabel.append(addRow);
            const idElement = $(`#kdObat${rowCount}`);
            selectDataBarang(idElement, $('#modalCppt')).on('select2:select', (e) => {
                e.preventDefault();
                const kodeBarang = e.params.data.id;
                const targetId = e.currentTarget.id;
                const elementTargetId = $(`#${targetId}Val`)
                elementTargetId.val(kodeBarang)
            })
        }

        function editObatDokter(id, kd_obat) {
            const row = bodyResepUmum.find(`#row${id}`)

            const colObat = row.find(`#obatUmum${id}`)
            const colJml = row.find(`#jmlUmum${id}`)
            const colAturan = row.find(`#aturanUmum${id}`)
            const colAksi = row.find(`#aksi${id}`)
            const colNoResep = row.find(`#noResep${id}`)

            const jml = colJml.html().split(" ")[0];
            const aturan = colAturan.html();
            colAksi.empty();
            colJml.html('').append(`<input type="text" class="form-control" name="jumlah[]" id="jmlObat${id}" value="${jml}"/>`)
            colAturan.html('').append(`<input type="text" class="form-control" name="aturan_pakai[]" id="aturan${id}" value="${aturan}"/>`)
            const dataUbah = {
                no_resep: colNoResep.val(),
                kode_brng: kd_obat,
                kode_brng: kd_obat,
                jml: $(`#jmlObat${id}`).val(),
                aturan: $(`#aturan${id}`).val(),
            }

            console.log(dataUbah);

            colAksi.append(`
                <input type="hidden" class="form-control" name="no_resep" id="noResep${id}" value="${colNoResep.val()}"/>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="simpanUbah(${id})"><i class="ti ti-pencil"></i> Ubah</button>
                <button type="button" class="ms-1 btn btn-sm btn-outline-danger" onclick="hapusObatDokter(${colNoResep.val()}, '${kd_obat}')"><i class="ti ti-trash-x"></i>Hapus</button>
            `)
        }

        function simpanUbah(id) {
            const row = bodyResepUmum.find(`#row${id}`).find('input')

            console.log('ROES ===', row);
        }
        $('#btnSimpanResep').on('click', (e) => {
            e.preventDefault();
            const rowCount = $('#tabelResepUmum').find('tr').length
            const noResep = $(`#no_resep`).val();
            let dataObat = [];
            for (let index = 1; index < rowCount; index++) {
                const findInput = $(`#row${index}`).find('input');
                if (findInput.length) {
                    const kodeBrng = $(`#kdObat${index}Val`).val();
                    const jml = $(`#jmlObat${index}`).val();
                    const aturanPakai = $(`#aturan${index}`).val();
                    if (kodeBrng && jml && aturanPakai) {
                        obat = {
                            'no_resep': noResep,
                            'kode_brng': $(`#kdObat${index}Val`).val(),
                            'jml': $(`#jmlObat${index}`).val(),
                            'aturan_pakai': $(`#aturan${index}`).val(),
                        }
                        dataObat.push(obat)
                    } else {
                        const errorMsg = {
                            status: 422,
                            statusText: 'Pastikan tidak ada kolom yang kosong'
                        }
                        return alertErrorAjax(errorMsg)
                    }
                }
            }

            $.post('resep/dokter/create', {
                dataObat
            }).done((response) => {
                setResepDokter(noResep)
            })
        })

        function hapusBarisObat(id) {
            const nextId = parseInt(id) + parseInt(1);
            $('#row' + nextId).attr('id', `row${id}`).find('i').attr('onclick', `hapusBarisObat(${id})`);
            $('#row' + id).remove();
        }
        $('#btnTambahObat').on('click', () => {
            tambahBarisObat(tabelResepUmum);
        })
    </script>
@endpush
