<div class="modal modal-blur fade" id="modalDiagnosaPasien" tabindex="-1" aria-modal="true" role="dialog">
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
                                <th>No</th>
                                <th>Kode ICD 9</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
                <button class="btn btn-sm btn-primary" id="btnTambahBarisDiagnosa">Tambah Diagnosa</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function diagnosaPasien(no_rawat) {
            $('#modalDiagnosaPasien').modal('show')
        }
        $('#btnTambahBarisDiagnosa').on('click', (e) => {
            e.preventDefault();
            const tbDiagnosa = $('#tbInfoPasienDiagnosa');
            let rowCount = tbDiagnosa.find('tr').length
            const addRow = `<tr id="row${rowCount}">
                <td>${rowCount}</td>
                <td><input class="form-control form-control-sm" name=kd_penyakit[]/></td>
                <td><input class="form-control form-control-sm" readonly/></td>
                <td><i class="ti ti-square-rounded-x text-danger"></i></td>
            </tr>`;
            tbDiagnosa.append(addRow);
        })
    </script>
@endpush
