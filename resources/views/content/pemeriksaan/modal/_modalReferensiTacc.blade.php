<div class="modal modal-blur fade" id="modalReferensiTacc" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Referensi TACC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tbReferensiTacc" class="table table-sm table-stripped" width="100%"></table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function renderReferensiTacc() {
            $('#modalReferensiTacc').modal('show')
            kdDiagnosa = formKunjunganPcare.find('input[name=kdDiagnosa1]').val()
            diagnosa = formKunjunganPcare.find('input[name=diagnosa1]').val()
            $('#modalReferensiTacc').modal('show')
            const tbReferensi = new DataTable('#tbReferensiTacc', {
                autoWidth: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                data: [{
                        "kdTacc": "-1",
                        "nmTacc": "Tanpa TACC",
                        alasanTacc: "-"
                    },
                    {
                        "kdTacc": "1",
                        "nmTacc": "Time",
                        alasanTacc: "< 3 Hari",
                    },
                    {
                        "kdTacc": "1",
                        "nmTacc": "Time",
                        alasanTacc: ">= 3 - 7 Hari",
                    },
                    {
                        "kdTacc": "1",
                        "nmTacc": "Time",
                        alasanTacc: ">= 7 Hari",
                    },
                    {
                        "kdTacc": "2",
                        "nmTacc": "Age",
                        alasanTacc: "< 1 Bulan",
                    },
                    {
                        "kdTacc": "2",
                        "nmTacc": "Age",
                        alasanTacc: ">= 1 Bulan s/d < 12 Bulan",
                    },
                    {
                        "kdTacc": "2",
                        "nmTacc": "Age",
                        alasanTacc: ">= 1 Tahun s/d < 5 Tahun",
                    },
                    {
                        "kdTacc": "2",
                        "nmTacc": "Age",
                        alasanTacc: ">= 5 Tahun s/d < 12 Tahun",
                    },

                    {
                        "kdTacc": "2",
                        "nmTacc": "Age",
                        alasanTacc: ">= 12 Tahun s/d < 55 Tahun",
                    },
                    {
                        "kdTacc": "2",
                        "nmTacc": "Age",
                        alasanTacc: ">= 55 Tahun",

                    },

                    {
                        "kdTacc": "3",
                        "nmTacc": "Complication",
                        alasanTacc: kdDiagnosa + " - " + diagnosa
                    },
                    {
                        "kdTacc": "4",
                        "nmTacc": "Comorbidity",
                        alasanTacc: "< 3 Hari",
                    },
                    {
                        "kdTacc": "4",
                        "nmTacc": "Comorbidity",
                        alasanTacc: ">= 3 - 7 Hari",
                    },
                    {
                        "kdTacc": "4",
                        "nmTacc": "Comorbidity",
                        alasanTacc: ">= 7 Hari",
                    },

                ],
                columns: [{
                        title: 'Kode TACC',
                        data: 'kdTacc',
                        render: (data, type, row, meta) => {
                            return data
                        }
                    },
                    {
                        title: 'Nama TACC',
                        data: 'nmTacc',
                        render: (data, type, row, meta) => {
                            return `<button type="button" class="btn btn-sm btn-outline-secondary" onclick="setTacc('${row.kdTacc}', '${row.nmTacc}', '${row.alasanTacc}')">${data}</button>`
                        }
                    },
                    {
                        title: 'Alasan',
                        data: 'alasanTacc',
                        render: (data, type, row, meta) => {
                            return data
                        }
                    },
                ]
            })
        }

        function setTacc(kdTacc, nmTacc, alasanTacc) {
            formRujukanInternal.find('#kdTacc').val(kdTacc)
            formRujukanInternal.find('#nmTacc').val(nmTacc)
            formRujukanInternal.find('#alasanTacc').val(alasanTacc)
            $('#modalReferensiTacc').modal('hide')
        }
    </script>
@endpush
