@extends('layout')

@section('body')
    <div class="containet-xl h-100">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <table class="table table-sm table-striped table-hover" id="tablePermintaanLab">

                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="input-group">
                    <input type="text" class="form-control filterTangal" />
                    <span class="input-group-text">s.d.</span>
                    <input type="text" class="form-control filterTangal" />
                    <button type="button" class="btn btn-secondary"><i class="ti ti-search"></i></button>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(()=>{
            {{--loadTablePermintaan(--}}
            {{--    {--}}
            {{--        tgl_permintaan : [ "2024-01-01","{{date('Y-m-d')}}"],--}}
            {{--    }--}}
            {{--);--}}
        })
        function loadTablePermintaan(keyword = {}){
            const table = new DataTable('#tablePermintaanLab', {
                responsive: true,
                stateSave: true,
                serverSide: false,
                destroy: true,
                processing: true,
                scrollY: '50vh',
                scrollX: true,
                ajax: {
                    url: `${url}/lab/permintaan/get`,
                    data: {
                        dataTable: keyword,
                    },
                },
                createdRow:(row)=>{
                    // console.log(row)
                },
                columns:[
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    }, {
                        title: 'No. Order',
                        data : 'noorder',
                        render: (data, type, row, meta) => {
                           return data;
                        },
                    },
                    {
                        title: 'Tanggal',
                        data : 'tgl_permintaan',
                        render: (data, type, row, meta) => {
                           return `${formatTanggal(data)} ${row.jam_permintaan}`;
                        },
                    },
                    {
                        title: 'Pasien',
                        data : 'pasien',
                        render: (data, type, row, meta) => {
                           return `<span class="text-muted">${row.no_rawat}</span><br/> ${data.nm_pasien} (${data.jk})`
                        },
                    },
                    {
                        title: 'Umur',
                        data : 'registrasi',
                        render: (data, type, row, meta) => {
                           return `${data.umurdaftar} ${data.sttsumur}`
                        },
                    },
                    {
                        title: 'Poliklinik',
                        data : 'poliklinik.nm_poli',
                        render: (data, type, row, meta) => {
                           return data
                        },
                    },
                    {
                        title: 'Perujuk',
                        data : 'perujuk.nm_dokter',
                        render: (data, type, row, meta) => {
                           return data
                        },
                    },
                    {
                        title: 'Diagnosa',
                        data : 'diagnosa_klinis',
                        render: (data, type, row, meta) => {
                           return data
                        },
                    },
                    {
                        title: 'Informasi',
                        data : 'informasi_tambahan',
                        render: (data, type, row, meta) => {
                           return data
                        },
                    },
                    {
                        title: 'Pembiayaan',
                        data : 'penjab.nama',
                        render: (data, type, row, meta) => {
                            let status = '';
                            if(data.includes('BPJS')){
                                status = `<span class="badge text-bg-success">${data.toUpperCase()}</span>`
                            }else{
                                status = `<span class="badge text-bg-primary">${data.toUpperCase()}</span>`
                            }
                            return status;
                        },
                    },
                    {
                        title: 'Status',
                        data : 'status',
                        render: (data, type, row, meta) => {
                            let status = '';
                            if(data==='ralan'){
                                 status = `<span class="badge text-bg-warning">${data.toUpperCase()}</span>`
                            }else{
                                 status = `<span class="badge text-bg-purple">${data.toUpperCase()}</span>`
                            }
                           return status;
                        },
                    },

                    {
                        title: '',
                        data : 'noorder',
                        render: (data, type, row, meta) => {
                           return `<button class="btn btn-sm btn-primary" onclick="detailPermintaanLab('${data}')">
                                <i class="ti ti-pencil"></i>
                            </button>`
                        },
                    },
                ]
            })
                .on('click', 'td.dt-control', function (e) {
                    const  tr = e.target.closest('tr');
                    const row = table.row(tr);
                    const data = row.data()


                    if (row.child.isShown()) {
                        row.child.hide();
                    }else {
                        getDetailItemPermintaanLab(data.noorder).done((response)=>{
                            const {data} = response;
                            const groupedData = data.reduce((acc, value) => {
                                const {item, jenis} = value;
                                const {nm_perawatan} = jenis;
                                if (!acc[nm_perawatan]) {
                                    acc[nm_perawatan] = [];
                                }
                                acc[nm_perawatan].push(item);
                                return acc;
                            }, {});

                            const detail = Object.keys(groupedData).map(nm_perawatan => {
                                const items = groupedData[nm_perawatan];
                                return items.map((item, index) => `
                                        <tr>
                                            ${index === 0 ? `<td rowspan="${items.length}" class="text-center">${nm_perawatan}</td>` : ''}
                                            <td>${item.nama}</td>
                                            <td>${item.la} ${item.satuan}</td>
                                            <td>${item.ld} ${item.satuan}</td>
                                            <td>${item.pa} ${item.satuan}</td>
                                            <td>${item.pd} ${item.satuan}</td>
                                        </tr>
                                    `).join('');
                            }).join('');


                            const child =
                                `<table class="table table-sm table-bordered">
                                    <thead >
                                        <tr>
                                               <th class="text-center">Pemeriksaan</th>
                                               <th class="text-center">Item</th>
                                               <th class="text-center">Rujukan LA</th>
                                               <th class="text-center">Rujukan LD</th>
                                               <th class="text-center">Rujukan PA</th>
                                               <th class="text-center">Rujukan PD</th>
                                        </tr>

                                    </thead>
                                         ${detail}
                            </table>`
                            row.child(child).show();
                        })
                    }
            });

        }

        function getDetailItemPermintaanLab(noorder){
            return $.get(`${url}/lab/permintaan/detail/${noorder}`)
        }
    </script>
@endpush

