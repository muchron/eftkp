<div id="tindakanPemeriksaan">
    <form action="" id="formTindakanDokter">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        <label for="no_rawat" class="form-label">No. Rawat</label>
                        <input class="form-control" id="no_rawat" name="no_rawat" />
                    </div>
                    <div class="col-md-4">
                        <label for="nm_pasien" class="form-label">Pasien</label>
                        <div class="input-group">
                            <input class="form-control" id="no_rkm_medis" name="no_rkm_medis" />
                            <input class="form-control w-50" id="nm_pasien" name="nm_pasien" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="nm_dokter" class="form-label">Dokter</label>
                        <div class="input-group">
                            <input class="form-control" id="kd_dokter" name="kd_dokter" readonly />
                            <input class="form-control w-50" id="nm_dokter" name="nm_dokter" readonly />

                        </div>
                    </div>
                    <div class="col-md-12 mt-2">

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="tabelTindakanDokter">

                            </table>
                        </div>
                        <button class="btn btn-success" type="button" onclick=" createTindakanDokter()">Kirim</button>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title h5">Tindakan Dilakukan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered" id="tabelTindakanDilakukan">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tgl. Perawatan</th>
                                    <th>Jam</th>
                                    <th>Perawatan</th>
                                    <th>Dokter</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-danger" onclick="deleteTindakanDokter()">
                            <i class="ti ti-trash"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

@push('scriptTindakan')
    <script>
        const tabsTindakan = modalCppt.find('#tabs-tindakan');
        const formTindakanDokter = $('#formTindakanDokter');
        // is tabsTindakan active get data from datapasien & data tindakanPasien
        targetTabsTindakan.on('shown.bs.tab', function(event) {
            const no_rawat = formCpptRajal.find('input[name=no_rawat]').val();
            const nm_pasien = formCpptRajal.find('input[name=nm_pasien]').val();
            const no_rkm_medis = formCpptRajal.find('input[name=no_rkm_medis]').val();
            const kd_dokter = formCpptRajal.find('input[name=nip]').val();
            const nm_dokter = formCpptRajal.find('input[name=nm_dokter]').val();

            formTindakanDokter.find('#no_rawat').val(no_rawat);
            formTindakanDokter.find('#nm_pasien').val(nm_pasien);
            formTindakanDokter.find('#no_rkm_medis').val(no_rkm_medis);
            formTindakanDokter.find('#kd_dokter').val(kd_dokter);
            formTindakanDokter.find('#nm_dokter').val(nm_dokter);
            tableTindakanDokter()
            getTindakanDilakukan(no_rawat)

        });

        // global
        let selectedRows = []; // array id yang dicentang (urut sesuai centang)
        let selectedDataCache = {}; // cache data lengkap per id
        let lastRequestStart = 0; // simpan start dari request terakhir

        function tableTindakanDokter() {
            // simpan referensi table ke variable supaya bisa dipakai di event handler
            const table = new DataTable('#tabelTindakanDokter', {
                responsive: true,
                serverSide: true,
                fixedHeader: true,
                scrollY: '40vh',
                processing: true,
                destroy: true,
                ajax: {
                    url: '/efktp/jenis-perawatan/table',
                    type: 'GET',
                    // tangkap request params sebelum dikirim
                    data: function(d) {
                        lastRequestStart = d.start || 0;
                        return d;
                    },
                    // intercept response dari server
                    dataSrc: function(json) {
                        // update cache untuk selected ids yang mungkin ada di response ini
                        json.data.forEach(d => {
                            if (selectedRows.includes(d.kd_jenis_prw)) {
                                selectedDataCache[d.kd_jenis_prw] = d;
                            }
                        });

                        // jika request halaman pertama (start === 0) => gabungkan selected rows di depan
                        if (lastRequestStart === 0) {
                            // buat array checkedData berdasarkan urutan selectedRows
                            const checkedData = selectedRows.map(id => selectedDataCache[id]).filter(Boolean);

                            // hindari duplikat: kumpulkan id yang sudah ada di checkedData
                            const checkedIds = new Set(checkedData.map(d => d.kd_jenis_prw));

                            // sisanya dari response yang bukan selected
                            const otherData = json.data.filter(d => !checkedIds.has(d.kd_jenis_prw));

                            // gabungkan: selected dulu, lalu data lainnya
                            return [...checkedData, ...otherData];
                        } else {
                            // bukan halaman pertama => jangan tampilkan item yg sudah dipindah ke halaman 1
                            return json.data.filter(d => !selectedRows.includes(d.kd_jenis_prw));
                        }
                    }
                },

                columnDefs: [{
                        targets: [0],
                        orderable: false
                    },
                    {
                        targets: [4],
                        className: 'text-end'
                    }
                ],

                columns: [{
                        name: 'kd_jenis_prw',
                        data: 'kd_jenis_prw',
                        title: '',
                        render: function(data, type, row, meta) {
                            // jangan gunakan onchange inline (kita pakai delegated handler)
                            const checked = selectedRows.includes(data) ? 'checked' : '';
                            return `<input type="checkbox" class="form-check-input tindakan-check" data-id="${data}" ${checked}>`;
                        }
                    },
                    {
                        data: 'kd_jenis_prw',
                        title: 'Kode'
                    },
                    {
                        data: 'nm_perawatan',
                        title: 'Nama Tindakan'
                    },
                    {
                        data: 'kategori.nm_kategori',
                        title: 'Kategori'
                    },
                    {
                        data: 'total_byrdr',
                        title: 'Biaya',
                        render: function(data, type, row, meta) {
                            return formatCurrency(data);
                        }
                    },

                ]
            });

            // delegated handler untuk checkbox (satu handler untuk seluruh table)
            $('#tabelTindakanDokter').off('change', '.tindakan-check').on('change', '.tindakan-check', function() {
                const id = $(this).data('id');
                const $tr = $(this).closest('tr');
                const rowApi = table.row($tr);
                const rowData = rowApi.data(); // ambil data baris sekarang (penting untuk cache)

                if (this.checked) {
                    if (!selectedRows.includes(id)) {
                        selectedRows.push(id);
                    }
                    // simpan ke cache segera supaya saat kita draw halaman 1, data tersedia
                    if (rowData) selectedDataCache[id] = rowData;
                } else {
                    // uncheck -> hapus dari selected + cache
                    selectedRows = selectedRows.filter(x => x !== id);
                    delete selectedDataCache[id];
                }

                // pindah ke halaman pertama, lalu redraw (false supaya tidak kehilangan state paging)
                table.page(0).draw(false);
            });
            return table;
        }

        function createTindakanDokter() {
            const no_rawat = formTindakanDokter.find('#no_rawat').val();
            const kd_dokter = formTindakanDokter.find('#kd_dokter').val();
            const nm_pasien = formTindakanDokter.find('#nm_pasien').val();
            const no_rkm_medis = formTindakanDokter.find('#no_rkm_medis').val();

            const selectedData = selectedRows.map(id => selectedDataCache[id]).filter(Boolean);
            $.post('/efktp/pemeriksaan/tindakan-dokter', {
                no_rawat: no_rawat,
                kd_dokter: kd_dokter,
                nm_pasien: nm_pasien,
                no_rkm_medis: no_rkm_medis,
                tindakan: selectedData
            }).done((response) => {
                getTindakanDilakukan(no_rawat)
                toast('Berhasil menambahkan tindakan')

            })
        }

        function getTindakanDilakukan(no_rawat) {
            $.get(`/efktp/pemeriksaan/tindakan-dokter/get`, {
                no_rawat: no_rawat
            }).done((response) => {
                const tbody = modalCppt.find('#tabelTindakanDilakukan tbody');
                tbody.empty();
                response.data.forEach((item, index) => {
                    const row = `<tr>
                        <td><input type="checkbox" class="form-check-input tindakan-hasil" name="kode_tindakan[]" id="tindakan${index}" value="${item.kd_jenis_prw}" data-tgl="${item.tgl_perawatan}" data-jam="${item.jam_rawat}" data-rawat="${item.no_rawat}"/></td>
                        <td>${splitTanggal(item.tgl_perawatan)}</td>
                        <td>${item.jam_rawat}</td>
                        <td>${item.tindakan.nm_perawatan}</td>
                        <td>${item.dokter.nm_dokter}</td>
                        <td class="text-end">${formatCurrency(item.biaya_rawat)}</td>
                        <td></td>
                        
                        
                    </tr>`;
                    tbody.append(row);
                });
            })
        }

        function deleteTindakanDokter() {
            const no_rawat = formTindakanDokter.find('#no_rawat').val();
            const kd_dokter = formTindakanDokter.find('#kd_dokter').val();
            const nm_pasien = formTindakanDokter.find('#nm_pasien').val();
            const no_rkm_medis = formTindakanDokter.find('#no_rkm_medis').val();


            Swal.fire({
                title: 'Yakin ?',
                html: `Anda akan menghapus data tindakan ini ?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',

            }).then((result) => {
                if (result.isConfirmed) {
                    const checkedTindakan = $('.tindakan-hasil:checked').map(function() {
                        const $this = $(this);
                        return {
                            kd_jenis_prw: $this.val(),
                            no_rawat: $this.data('rawat'),
                            jam_rawat: $this.data('jam'),
                            tgl_perawatan: $this.data('tgl'),
                        };
                    }).get();

                    $.ajax({
                        url: `/efktp/pemeriksaan/tindakan-dokter/delete`,
                        method: 'DELETE',
                        data: {
                            no_rawat: no_rawat,
                            no_rawat: no_rawat,
                            kd_dokter: kd_dokter,
                            nm_pasien: nm_pasien,
                            no_rkm_medis: no_rkm_medis,
                            tindakan: checkedTindakan

                        }
                    }).done((response) => {
                        getTindakanDilakukan(no_rawat)
                        toast('Berhasil Hapus Tindakan')
                    })
                }
            })



        }
    </script>
@endpush
