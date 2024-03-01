<div class="card">
    <div class="card-status-top bg-success"></div>
    <div class="card-body">
        <h5 class="card-title">Riwayat Pemeriksaan</h5>
        <div class="accordion" id="listRiwayat" style="height:70vh;overflow:scroll">

        </div>
    </div>
</div>

@push('script')
    <script>
        $('#listRiwayat').on('show.bs.collapse', function(e) {
            const id = e.target.id;
            const no_rawat = $(`#${id}`).data('id');
            const tanggal = $(`#${id}`).data('tanggal');
            const nip = $(`#${id}`).data('nip');
            const jam = $(`#${id}`).data('jam');
            const body = $(`#${id}`).find('.accordion-body')
            const isShow = $(`#${id}`).hasClass('collapse')

            if (isShow) {
                body.empty()
                getPemeriksaanRanap(no_rawat, tanggal, jam).done((response) => {
                    // response.map((response) => {
                    const ttv = `<div class="card mb-1">
                            <div class="ribbon bg-red">TTV</div>
                            <div class="card-body card-text">
                                <div class="row gy-2">
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Suhu : ${response.suhu_tubuh} °C
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Tinggi : ${response.tinggi} cm
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Berat : ${response.berat} Kg
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Tensi : ${response.tensi} mmHg
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Respirasi : ${response.respirasi} x/mnt
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Nadi : ${response.nadi} x/mnt
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        SpO² : ${response.spo2} %
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        GCS : ${response.gcs} (E,V,M)
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Kesadaran : ${response.kesadaran}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Alergi : ${response.alergi}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                        Lingkar Perut : ${response.lingkar_perut} cm
                                    </div>
                                </div>
                            </div>
                        </div>`
                    const pemeriksaan = `<div class="card mb-1">
                            <div class="ribbon bg-red">SOAP</div>
                            <div class="card-body card-text">
                                <div class="row gy-2">
                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <strong>Petugas/Dokter </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${response.pegawai.nama}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <strong>Subjek </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.keluhan)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <strong>Objek </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.pemeriksaan)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                       <strong> Asesmen </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.penilaian)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <strong>Plan </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.rtl)}
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <strong>Instruksi </strong>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                         : ${stringPemeriksaan(response.instruksi)}
                                    </div>

                                </div>
                                <button class="btn btn-sm btn-primary mt-3" type="button" onclick="salinCppt('${response.no_rawat}', '${response.nip}')">
                                    <i class="ti ti-copy"></i> Copy CPPT
                                </button>
                            </div>
                        </div>`
                    body.append([ttv, pemeriksaan]).hide().fadeIn()
                    // })
                    // }
                })
            }
        });

        function setRiwayatRanap(no_rawat) {
            getPemeriksaanRanap(no_rawat).done((response) => {
                const pemeriksaan = response.map((values, index) => {

                    console.log(values);
                    return `<div class="accordion-item">
                                <h2 class="accordion-header" id="heading-${index}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${index}" aria-expanded="true" aria-controls="collapse-${index}">
                                        ${splitTanggal(values.tgl_perawatan)} ${values.jam_rawat} : ${values.pegawai.nama}
                                    </button>
                                </h2>
                                <div id="collapse-${index}" class="accordion-collapse collapse" data-bs-parent="#listRiwayat" data-id="${no_rawat}" data-tanggal="${values.tgl_perawatan}" data-pegawai="${values.nip}" data-jam="${values.jam_rawat}">
                                    <div class="accordion-body pt-0">
                                        
                                    </div>
                                </div>
                            </div>`
                })
                $('#listRiwayat').append(pemeriksaan)
            })
        }

        function setRiwayat(no_rkm_medis) {
            $('#listRiwayat').empty()
            $.get(`${url}/pasien/riwayat`, {
                no_rkm_medis: no_rkm_medis
            }).done((response) => {
                const regPeriksa = response.reg_periksa.map((regPeriksa, index) => {
                    const diagnosa = regPeriksa.diagnosa.map((diagnosa) => {
                        if (diagnosa.prioritas == 1) {
                            return `${diagnosa.kd_penyakit} ${diagnosa.penyakit.nm_penyakit}`
                        }
                    }).join('')
                    return `<div class="accordion-item">
                                <h2 class="accordion-header" id="heading-${index}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${index}" aria-expanded="true" aria-controls="collapse-${index}">
                                        ${formatTanggal(regPeriksa.tgl_registrasi)} : ${diagnosa}
                                    </button>
                                </h2>
                                <div id="collapse-${index}" class="accordion-collapse collapse" data-bs-parent="#listRiwayat" data-id="${regPeriksa.no_rawat}">
                                    <div class="accordion-body pt-0">
                                        
                                    </div>
                                </div>
                            </div>`
                })
                $('#listRiwayat').append(regPeriksa)
            })
        }
    </script>
@endpush
