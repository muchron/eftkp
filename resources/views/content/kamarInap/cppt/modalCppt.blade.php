<div class="modal modal-blur fade" id="modalCpptRanap" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modalCpptRanap modal-fullscreen modal-scrolled" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemeriksaan / CPPT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row gy-2">
                    <div class="col-xl-6 col-lg-6">
                        @include('content.kamarInap.cppt.sub._form')
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @include('content.kamarInap.cppt.sub._riwayat')
                    </div>
                    {{-- <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._tabResep')
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="simpanPemeriksaanRanap()"><i class="ti ti-device-floppy me-1"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var modalCpptRanap = $('#modalCpptRanap')
        var formCpptRanap = $('#formCpptRanap');
        var alergi = formCpptRanap.find('#alergi');
        var pegawai = formCpptRanap.find('#nip');
        var checkJam = formCpptRanap.find('#checkJam');
        var nip = "{{ session()->get('pegawai')->nik }}";
        var nmPegawai = "{{ session()->get('pegawai')->nama }}";

        modalCpptRanap.on('hidden.bs.modal', () => {
            $('#listRiwayat').empty()
            selectAlergi(alergi, formCpptRanap);
        })
        modalCpptRanap.on('shown.bs.modal', () => {
            alergi.addClass('bg-red')
            checkboxTimer(checkJam)
            selectAlergi(alergi, formCpptRanap);
        })


        function runningTime() {
            const waktu = new Date();
            jam = waktu.getHours() >= 10 ? waktu.getHours() : '0' + waktu.getHours();
            menit = waktu.getMinutes() >= 10 ? waktu.getMinutes() : '0' + waktu.getMinutes();
            detik = waktu.getSeconds() >= 10 ? waktu.getSeconds() : '0' + waktu.getSeconds();
            return textJam = `${jam}:${menit}:${detik}`;
        }

        function checkboxTimer(element) {
            const cek = element.is(':checked')
            if (cek) {
                clearInterval(jamSekarang)
            } else {
                const target = element.data('target')
                jamSekarang = setInterval(() => {
                    $(`#${target}`).val(runningTime())
                }, 1000);
            }
        }

        checkJam.on('change', () => {
            checkboxTimer(checkJam)
        })


        function cpptRanap(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                console.log(response);
                formCpptRanap.find('input[name=no_rawat]').val(response.no_rawat)
                formCpptRanap.find('input[name=no_rkm_medis]').val(response.no_rkm_medis)
                formCpptRanap.find('input[name=nm_pasien]').val(`${response.pasien.nm_pasien} / ${response.pasien.jk == 'L' ? 'Laki-laki' : 'Perempuan'}`)
                formCpptRanap.find('input[name=tgl_lahir]').val(`${formatTanggal(response.pasien.tgl_lahir)} / ${response.umurdaftar} ${response.sttsumur}`)
                formCpptRanap.find('input[name=pembiayaan]').val(`${response.penjab.png_jawab}`)
                formCpptRanap.find('input[name=kamar]').val(`${response.kamar_inap.kd_kamar} / ${response.kamar_inap.kamar.bangsal.nm_bangsal}`)
                selectPegawai(pegawai, formCpptRanap);
                const setPetugas = new Option(nmPegawai, nip, true, true);
                pegawai.append(setPetugas).trigger('change');
            })
            setRiwayatRanap(no_rawat);
            modalCpptRanap.modal('show');
        }

        function simpanPemeriksaanRanap() {
            const data = getDataForm('formCpptRanap', ['input', 'select', 'textarea']);
            delete data[""];
            data['alergi'] = data['alergi'].map((item) => item).join(', ')
        }
    </script>
@endpush
