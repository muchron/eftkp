<div class="modal modal-blur fade" id="modalListPemeriksaanRanap" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-scrolled" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kelengkapan Berkas Rekam Medis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped table-hover nowrap" id="tabelPemeriksaanRapan" width="100%">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnResetCpptRanap" class="btn btn-warning d-none"><i class="ti ti-reload me-1"></i>Baru</button>
                <button type="button" id="btnSalinCpptRanap" class="btn btn-primary d-none"><i class="ti ti-copy me-1"></i> Copy</button>
                <button type="button" id="btnSimpanCpptRanap" class="btn btn-success" onclick="createCpptRanap()"><i class="ti ti-device-floppy me-1"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        let modalListPemeriksaanRanap = $('#modalListPemeriksaanRanap')

        function listPemeriksaanRanap(kategori){
            const no_rawat = formResumeMedis.find('input[name="no_rawat"]').val();
            const dpjp = formResumeMedis.find('input[name="kd_dokter"]').val();
            getCpptRanap(no_rawat).done((response) => {
                const data = response.map((item) =>{
                        return {
                            hasil : item[`${kategori}`],
                            pegawai: item.pegawai.nama,
                            tanggal: `${splitTanggal(item.tgl_perawatan)} ${item.jam_rawat}`,
                        }
                })
                tabelPemeriksaan(data)
                modalListPemeriksaanRanap.modal('show')
            })
        }
        function tabelPemeriksaan(data) {
            const tabelRegistrasi = new DataTable('#tabelPemeriksaanRapan', {
                responsive: true,
                serverSide: false,
                destroy: true,
                processing: true,
                data : data,
                scrollY : '50vh',
                // createdRow: (row, data, index) => {
                //     $(row).addClass('table-rows').attr('data-id', data.no_rawat).attr('data-poli', data.kd_poli);
                // },
                columns: [

                    {
                        title: 'tanggal',
                        data: 'tanggal',
                    render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: 'Hasil',
                        data: 'hasil',
                        render: (data, type, row, meta) => {
                            return stringPemeriksaan(data);
                        },
                    },
                    {
                        title: 'Petugas/Dokter',
                        data: 'pegawai',
                        render: (data, type, row, meta) => {
                            return data;
                        },
                    },
                    {
                        title: '',
                        data: '',
                        render: (data, type, row, meta) => {
                            return `<button type="button" class="btn btn-sm btn-primary" style="width: 100%"> <i class="ti ti-copy"></i></button>`;
                        },
                    },


                ]
            })
        }
    </script>
@endpush
