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
        var btnTambahObat = $('#btnTambahObat')
        var btnSimpanResep = $('#btnSimpanResep')
        var tabelResepUmum = $('#tabelResepUmum')
        var bodyResepUmum = tabelResepUmum.find('tbody')

        function getResepDokter(no_resep) {
            const resepDokter = $.get(`${url}/resep/dokter/get`, {
                no_resep: no_resep
            })
            return resepDokter;
        }

        function deleteResepDokter(no_resep, kode_brng) {
            const resepDokter = $.post(`${url}/resep/dokter/delete`, {
                no_resep: no_resep,
                kode_brng: kode_brng,
            })
            return resepDokter
        }

        function setResepDokter(no_resep) {
            getResepDokter(no_resep).done((reseps) => {
                bodyResepUmum.empty()
                if (reseps.length) {
                    tabelResepUmum.removeClass('d-none')
                    btnSimpanObat.removeClass('d-none')
                    btnTambahObat.removeClass('d-none')
                    reseps.map((resepDokter, index) => {
                        const numb = parseInt(index) + 1
                        const row = `<tr id="row${numb}">
                            <td id="obatUmum${numb}">${resepDokter.obat.nama_brng}</td>
                            <td id="jmlUmum${numb}">${resepDokter.jml} ${resepDokter.obat.satuan?.satuan}</td>
                            <td id="aturanUmum${numb}">${resepDokter.aturan_pakai}</td>
                            <td id="aksi${numb}">
                                <button type="button" class="btn btn-sm btn-outline-yellow" onclick="editObatDokter(${numb}, '${resepDokter.kode_brng}')"><i class="ti ti-pencil"></i> Ubah</button>
                                <button type="button" class="ms-1 btn btn-sm btn-outline-danger" onclick="hapusObatDokter(${no_resep}, '${resepDokter.kode_brng}')"><i class="ti ti-trash-x"></i>Hapus</button>
                            </td>
                        </tr>`;
                        bodyResepUmum.append(row).fadeIn();
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
                            tulisPlan(no_resep)
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
            colJml.html('').append(`<input type="hidden" name="kode_brng" id="kdObat${id}Val" value="${kd_obat}"/><input type="text" class="form-control" name="jml" id="jmlObat${id}" value="${jml}"/>`)
            colAturan.html('').append(`<input type="text" class="form-control" name="aturan" id="aturan${id}" value="${aturan}"/>`)
            colAksi.append(`
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="simpanUbah(${id}, '${kd_obat}')"><i class="ti ti-pencil"></i> Ubah</button>
                <button type="button" class="ms-1 btn btn-sm btn-outline-danger" onclick="hapusObatDokter(${colNoResep.val()}, '${kd_obat}')"><i class="ti ti-trash-x"></i>Hapus</button>
            `)
        }

        function simpanUbah(id, kd_obat) {
            const row = bodyResepUmum.find(`#row${id}`)

            const data = {
                kode_brng: kd_obat,
                no_resep: $('#no_resep').val(),
                jml: $(`#jmlObat${id}`).val(),
                aturan_pakai: $(`#aturan${id}`).val()
            }

            $.post('resep/dokter/update', data).done((response) => {
                setResepDokter(data.no_resep)
                tulisPlan(data.no_resep)
            }).fail((request) => {
                alertErrorAjax(request)
            })


        }

        function tulisPlan(no_resep) {
            getResep({
                no_resep: no_resep
            }).done((response) => {
                let textPlan = `RESEP : \n`
                if (response.resep_dokter.length) {
                    response.resep_dokter.map((rd) => {
                        textPlan += `${rd.obat.nama_brng} : ${rd.jml} ${rd.obat.satuan.satuan} aturan ${rd.aturan_pakai};\n`
                    })
                }
                if (response.resep_racikan.length) {
                    response.resep_racikan.map((rr) => {
                        textPlan += `${rr.no_racik}. ${rr.nama_racik} : ${rr.jml_dr} ${rr.metode.nm_racik} aturan ${rr.aturan_pakai} \n`
                        if (rr.detail.length) {
                            rr.detail.map((detail) => {
                                textPlan += `---${detail.obat.nama_brng} : dosis ${detail.kandungan} mg ;\n`
                            })
                        }
                    })
                }

                $('#formCpptRajal textarea[name=rtl]').val(textPlan)
            })
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
                    const obat = {
                        'no_resep': noResep,
                        'kode_brng': $(`#kdObat${index}Val`).val(),
                        'jml': $(`#jmlObat${index}`).val(),
                        'aturan_pakai': $(`#aturan${index}`).val(),
                    }

                    const isEmpty = Object.values(obat).filter((item) => {
                        return item == null || item == '';
                    }).length

                    if (isEmpty) {
                        const errorMsg = {
                            status: 422,
                            statusText: 'Pastikan tidak ada kolom yang kosong'
                        }
                        alertErrorAjax(errorMsg)
                        console.log(obat);
                        return false;
                    }
                    dataObat.push(obat)
                }
            }

            $.post(`${url}/resep/dokter/create`, {
                dataObat
            }).done((response) => {
                const no_rawat = $('#formCpptRajal input[name=no_rawat]').val()
                $('#btnCetakResep').attr('onclick', `cetakResep('${no_rawat}')`)
                tulisPlan(noResep)
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
