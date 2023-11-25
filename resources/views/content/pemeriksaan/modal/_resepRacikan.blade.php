<div class="table-responsive mb-2" style="height:180px;overflow-y:auto">
    <input type="hidden" id="no_resep" name="no_resep">
    <table class="table d-none table-sm mb-2" id="tabelResepRacikan">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Racikan</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Aturan Pakai</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-primary d-none" id="btnTambahRacikan">Tambah Racikan</button>
</div>
<button type="button" class="btn btn-sm btn-primary d-none" id="btnTambahRacikan">Tambah Racikan</button>
@push('script')
    <script>
        function setResepRacikan(no_resep) {
            getResepRacikan(no_resep).done((response) => {
                if (response.length) {
                    $('#tabelResepRacikan').removeClass('d-none');
                    response.map((racikan, index) => {
                        let obat = '';
                        if (racikan.detail.length) {
                            obat = racikan.detail.map((isian) => {
                                return `<tr>
                                <td colspan="6">
                                    <span class="badge bg-purple">${isian.obat.nama_brng} ${isian.kandungan} gr</span>
                                </td>
                                </tr>`
                            })
                        }
                        const row = `<tr>
                                <td>${racikan.no_racik}</td>
                                <td>${racikan.nama_racik}</td>
                                <td>${racikan.jml_dr}</td>
                                <td>${racikan.metode.nm_racik}</td>
                                <td>${racikan.aturan_pakai}</td>
                            </tr>
                            ${obat}`

                        $('#tabelResepRacikan tbody').append(row);
                    })
                    console.log('RESPONSE RACIKAN ===', response);

                }
            })
        }

        function getResepRacikan(no_resep, no_racik = '') {
            const racikan = $.get('resep/racikan/get', {
                no_resep: no_resep,
                no_racik: no_racik,
            })

            return racikan;
        }
    </script>
@endpush
