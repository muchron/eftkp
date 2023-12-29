<div class="modal modal-blur fade" id="modalPendaftaranPcare" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Pendaftaran PCARE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tbPendaftaranPcate" class="table table-sm table-stripped" width="100%"></table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        function renderPendaftaranPcare() {
            var customStart = 0;
            var customLength = 15;
            // $('#modalPendaftaranPcare').modal('show')
            const tbReferensi = new DataTable('#tbPendaftaranPcate', {
                autoWidth: true,
                serverSide: true,
                destroy: true,
                processing: true,
                searching: false,
                lengthChange: false,
                "preDrawCallback": function(settings) {
                    // Modify the custom start value before drawing the table
                    customStart = settings._iDisplayStart;
                },
                "drawCallback": function(settings) {
                    console.log(settings);
                    // Adjust the custom length based on the total count
                    var totalCount = settings.json.response.count;
                    var maxCustomLength = 15;

                    // Calculate the custom length as a multiple of 15
                    customLength = Math.min(maxCustomLength, Math.ceil(totalCount / maxCustomLength) * maxCustomLength);

                },
                ajax: {
                    url: '../bridging/pcare/pendaftaran',
                    dataSrc: 'response.list',
                    data: (q) => {
                        q.start = customStart;
                        q.length = customLength;
                        return q;
                    }
                },
                columns: [{
                        title: 'No Urut',
                        data: 'noUrut',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'No. Kartu',
                        data: 'peserta.noKartu',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Nama',
                        data: 'peserta.nama',
                        render: (data, type, row, meta) => {
                            return `${data} (${row.peserta.sex})`;
                        }
                    },
                    {
                        title: 'Tgl Lahir',
                        data: 'peserta.tglLahir',
                        render: (data, type, row, meta) => {
                            return `${data} (${row.peserta.sex})`;
                        }
                    },
                    {
                        title: 'Poli',
                        data: 'poli.nmPoli',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                ],
                infoCallback: (settings, start) => {
                    // var pageInfo = settings._iDisplayLength > 0 ?
                    //     'Showing ' + (start * customStart) + ' to ' + (customLength) + ' of ' + totalCount + ' entries' :
                    //     'Showing 0 to 0 of 0 entries';

                    // return pageInfo;
                }
            })
        }
    </script>
@endpush
