<div class="modal modal-blur fade" id="modalHasilPeriksaLab" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modalPermintaanLab modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hasil Pemeriksaan Laboratorium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive table-sm table-striped table-bordered" id="tableHasilPeriksaLab">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemeriksaan</th>
                            <th>Hasil</th>
                            <th>Satuan</th>
                            <th>Nilai Rujukan</th>
                            <th>Ket</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        const modalHasilPeriksaLab = $('#modalHasilPeriksaLab')
        const tableHasilPeriksaLab = $('#tableHasilPeriksaLab');

        function showHasilPeriksaLab(no_rawat, tgl) {
            Swal.fire({
                title: 'Informasi',
                html: 'Sedang dalam proses development',
                icon: 'info',
                showConfirmButton: false
            }).then(() => {
                modalHasilPeriksaLab.modal('hide');
                return false;
            })
            // modalHasilPeriksaLab.modal('show');
            // $.get(`${url}/lab/periksa/get`, {
            //     no_rawat: no_rawat,
            //     tgl: tgl
            // }).done((response) => {
            //     const {
            //         data
            //     } = response;
            //     data.count === 0 ? `<tr><td colspan="6">Tidak ditemukan hasil</td></tr>` : renderTableHasilPeriksaLab(data.result);
            // })
        }

        function renderTableHasilPeriksaLab(data) {
            const detail = data.detail.map((item, index) => {

            })
            const content = data.map((item, index) => {
                return `<tr>
                        <td></td>
                        <td>${item.kd_jenis_prw}</td>
                    </tr>`
            });

        }
    </script>
@endpush
