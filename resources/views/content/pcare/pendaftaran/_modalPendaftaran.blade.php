<div class="modal modal-blur fade" id="modalPendaftaranPcare" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Pendaftaran PCARE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tbPendaftaranPcare" class="table table-sm table-stripped" width="100%"></table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@include('content.pcare.pendaftaran._modalPasien')
@push('script')
    <script>
        function getNokaPasien(noKartu) {
            const pasien = $.get(`../pasien/get/nokartu/${noKartu}`)
            return pasien;
        }

        function createPasienBpjs(noKartu, noUrut = '') {
            loadingAjax();
            $.get(`../bridging/pcare/peserta/${noKartu}`).done((result) => {
                $('#modalPasien').modal('show')
                loadingAjax().close();
                const umur = hitungUmur(splitTanggal(result.response.tglLahir));
                const contentUmur = `${umur.split(';')[0]} Th ${umur.split(';')[1]} Bl ${umur.split(';')[2]} Hr`
                formPasien.find('input[name=nm_pasien]').val(result.response.nama)
                formPasien.find('select[name=jk]').val(result.response.sex).change()
                formPasien.find('select[name=gol_darah]').val('-')
                formPasien.find('input[name=tgl_lahir]').val(result.response.tglLahir)
                formPasien.find('input[name=umur]').val(contentUmur)
                formPasien.find('input[name=no_ktp]').val(result.response.noKTP)
                formPasien.find('input[name=no_tlp]').val(result.response.noHP)
                formPasien.find('input[name=no_peserta]').val(noKartu)
                formPasien.find('input[name=sttsForm]').val('bridging')
                formPasien.find('input[name=noUrut]').val(noUrut)

                const bpjs = new Option('BPJ - BPJS', 'BPJS', true, true);
                formPasien.find('select[name=kd_pj]').append(bpjs).trigger('change');

            })
        }


        function renderPendaftaranPcare(start = '', length = '') {
            var customStart = start ? start : 0;
            var customLength = start ? start : 10;
            const tbReferensi = new DataTable('#tbPendaftaranPcare', {
                autoWidth: true,
                serverSide: true,
                destroy: true,
                processing: true,
                searching: false,
                lengthChange: false,
                deferRender: true,
                responsive: true,
                scroller: true,
                scrollCollapse: true,
                scrollY: 700,
                colReorder: true,
                "preDrawCallback": function(settings) {
                    // Modify the custom start value before drawing the table
                    customStart = settings._iDisplayStart;
                },
                "drawCallback": function(settings) {
                    console.log(settings.json.response);
                    var maxCustomLength = 10;
                    var totalCount = settings.json.response.count;
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
                createdRow: (row, data, index) => {
                    const noKartu = data.peserta.noKartu;
                    getNokaPasien(noKartu).done((response) => {
                        if (response.no_peserta) {
                            if (response.reg_periksa.length) {
                                $(row).addClass('bg-green-lt').css('cursor', 'pointer')
                                return false;
                            }
                            $(row).addClass('bg-yellow-lt').css('cursor', 'pointer')
                            $(row).attr('onclick', `registrasiPoli('${response.no_rkm_medis}', '${data.noUrut}')`)
                        } else {
                            $(row).attr('onclick', `createPasienBpjs('${noKartu}', '${data.noUrut}')`)
                            $(row).addClass('bg-red-lt').css('cursor', 'pointer')
                        }
                        $(row).find(`#btnPeserta${noKartu}`).removeClass('d-none')
                    })
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
                            return `<span id='${data}'>${data}</span>`;
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
                        title: 'Umur',
                        data: 'peserta.tglLahir',
                        render: (data, type, row, meta) => {
                            return `${hitungUmur(splitTanggal(data)).split(';')[0]} Th`;
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
                    {
                        title: '',
                        data: 'peserta.noKartu',
                        render: (data, type, row, meta) => {
                            return `<button type="button" class="btn btn-sm btn-success d-none" onclick="createPasienBpjs('${data}')" id="btnPeserta${data}"><i class="ti ti-http-get"></i></button>`;
                        }
                    },
                ],
                infoCallback: (settings, start) => {
                    return `Total pendaftaran ${settings.json?.response?.count} pasien`;
                }
            })
        }
    </script>
@endpush
