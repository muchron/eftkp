<div>
    <div class="card">
        <div class="card-header">
            <h4 class="m-0">KECAMATAN PASIEN</h4>
        </div>
        <div class="card-body h-30">
            <canvas id="grafikKecamatan" style="max-height:40vh"></canvas>
        </div>
        <div class="card-footer">
            <div class="input-group w-50">
                <input type="text" class="form-control filterTangal" id="tglKecamatan1" value="{{ date('d-m-Y') }}">
                <span class="input-group-text">s.d.</span>
                <input type="text" class="form-control filterTangal" id="tglKecamatan2" value="{{ date('d-m-Y') }}">
                <button class="btn btn-indigo" id="btnFilterkelurahan"><i class="ti ti-search"></i></button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        var ctxGrafikKecamatan = $('#grafikKecamatan');
        var grafikKecamatan = '';

        $(document).ready((e) => {
            dataGrafikKecamatan();
        })

        function renderGrafikKecamatan(data) {
            grafikKecamatan = new Chart(ctxGrafikKecamatan, {
                type: 'bar',
                data: {
                    labels: data.label,
                    datasets: [{
                        data: data.list,
                        borderWidth: 1,
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(54, 162, 235)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)',
                            'rgba(45, 132, 44)',
                            'rgba(44, 123, 207)',
                            'rgba(100, 44, 11)',
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                }
            });
        }

        function dataGrafikKecamatan(tgl1 = '', tgl2 = '') {
            $.get(`${url}/pasien/data/kecamatan`, {
                tgl1: tgl1,
                tgl2: tgl2,
            }).done((response) => {
                console.log(response);
                const data = {
                    'list': response.map((item) => item.count),
                    'label': response.map((item) => item.kec.nm_kec),
                }
                console.log(data);
                renderGrafikKecamatan(data);
            })
        }

        $('#btnFilterKecamatan').on('click', () => {
            const tgl1 = $('#tglKecamatan1').val()
            const tgl2 = $('#tglKecamatan2').val()
            grafikKecamatan.destroy();
            dataGrafikKecamatan(splitTanggal(tgl1), splitTanggal(tgl2));
        })
    </script>
@endpush
