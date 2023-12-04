<div class="modal modal-blur fade" id="modalDiagnosaPasien" tabindex="-1" aria-modal="true" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diagnosa Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="diagnosa/pasien" id="formDiagnosaPasien" method="post">
                    <table id="tbInfoPasienDiagnosa" class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Kode ICD 9</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
                <button class="btn btn-sm btn-primary" id="btnTambahBarisDiagnosa">Tambah Diagnosa</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success me-2" data-bs-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var tbInfoPasienDiagnosa = $('#tbInfoPasienDiagnosa');
        var bodyInfoDiagnosa = tbInfoPasienDiagnosa.find('tbody');

        function diagnosaPasien(no_rawat) {
            getDiagnosaPasien(no_rawat).done((diagnosas) => {
                bodyInfoDiagnosa.empty()
                if (diagnosas.length) {
                    const dx = diagnosas.map((diagnosa) => {
                        console.log('DX ===', diagnosa);
                        return `<tr>
                                <td>${diagnosa.prioritas}</td>
                                <td>${diagnosa.kd_penyakit} - ${diagnosa.penyakit.nm_penyakit}</td>
                                <td><button class="btn btn-sm btn-outline-danger" id="btnHapusDiagnosa" onclick="hapusDiagnosaPasien('${no_rawat}', '${diagnosa.kd_penyakit}')"><i class="ti ti-trash-x"></i> Hapus</button></td>
                            </tr>`
                    });

                    bodyInfoDiagnosa.append(dx)
                }
            })
            $('#modalDiagnosaPasien').modal('show')
        }

        function selectDiagnosa(element, parrent) {
            const select2 = element.select2({
                dropdownParent: parrent,
                delay: 0,
                scrollAfterSelect: true,
                ajax: {
                    url: 'penyakit/get',
                    dataType: 'JSON',

                    data: (params) => {
                        const query = {
                            barang: params.term
                        }
                        return query
                    },
                    processResults: (data) => {
                        return {
                            results: data.map((item) => {
                                const items = {
                                    id: item.kd_penyakit,
                                    text: `${item.kd_penyakit} - ${item.nm_penyakit}`,
                                    detail: item
                                }
                                return items;
                            })
                        }
                    }

                },
                cache: true

            });

            return select2;
        }

        $('#btnTambahBarisDiagnosa').on('click', (e) => {
            e.preventDefault();
            const tbDiagnosa = $('#tbInfoPasienDiagnosa');
            let rowCount = tbDiagnosa.find('tr').length
            const addRow = `<tr id="row${rowCount}">
                <td>${rowCount}</td>
                <td><select class="form-control" name="kd_penyakit[]" id="kd_penyakit${rowCount}" style="width:100%"/></td>
                <td><button type="button" class="btn btn-sm btn-outline-danger" id="btnHapusDiagnosa" onclick="hapusBarisDiagnosa('${rowCount}')"><i class="ti ti-trash-x"></i> Hapus</button></td>
            </tr>`;

            tbDiagnosa.append(addRow);
            const select = $(`#kd_penyakit${rowCount}`)
            selectDiagnosa(select, $('#modalDiagnosaPasien')).on('select2:select', (e) => {
                e.preventDefault();
                // const jml_dr = $('#modalDetailRacikan').find('input[name=jml_dr]').val()
                const data = e.params.data
                $(`#nm_penyakit${rowCount}`).val(data.nm_penyakit)

                // console.log($(`#nm_penyakit${rowCount}`));
                // $(`#dosis${rowCount}`).val(data.kapasitas)
                // $(`#jml${rowCount}`).val(jml_dr)
                console.log('DATA ===', data);
            })
        })

        function getDiagnosaPasien(no_rawat) {
            const diagnosa = $.get('diagnosa/pasien/get', {
                no_rawat: no_rawat
            })
            return diagnosa
        }
    </script>
@endpush
