<div>
    <div class="card">
        <div class="card-header">
            <h4 class="m-0">KELURAHAN PASIEN</h4>
        </div>
        <div class="card-body h-30">
            <canvas id="grafikKelurahan" style="max-height:40vh"></canvas>
        </div>
        <div class="card-footer">
            <div class="input-group w-50">
                <input type="text" class="form-control filterTangal" id="tglKelurahan1" value="{{ date('d-m-Y') }}">
                <span class="input-group-text">s.d.</span>
                <input type="text" class="form-control filterTangal" id="tglKelurahan2" value="{{ date('d-m-Y') }}">
                <button class="btn btn-indigo" id="btnFilterkelurahan"><i class="ti ti-search"></i></button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        var ctxGrafikKelurahan = $('#grafikKelurahan');
        var grafikKelurahan = '';

        $(document).ready((e) => {
            dataGrafikKelurahan();
        })

        function renderGrafikKelurahan(data) {
            grafikKelurahan = new Chart(ctxGrafikKelurahan, {
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
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    const labelHover = data.title[context.dataIndex]
                                    const countHover = data.list[context.dataIndex]
                                    return ` ${countHover} - ${labelHover}`;
                                },
                            },
                        },
                    },
                }
            });
        }

        function dataGrafikKelurahan(tgl1 = '', tgl2 = '') {
            $.get(`${url}/pasien/data/kelurahan`, {
                tgl1: tgl1,
                tgl1: tgl2,
            }).done((response) => {
                console.log('KELURAHAN ==', response);
                const data = {
                    'list': response.map((item) => item.count),
                    'label': response.map((item) => item.kel.nm_kel),
                }
                renderGrafikKelurahan(data);
            })
        }

        $('#btnFilterKelurahan').on('click', () => {
            const tgl1 = $('#tglPenyakit1').val()
            const tgl2 = $('#tglPenyakit2').val()
            grafikKelurahan.destroy();
            dataGrafikKelurahan(splitTanggal(tgl1), splitTanggal(tgl2));
        })
    </script>
@endpush
