<div class="modal modal-blur fade" id="modalCppt" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modalCppt modal-fullscreen modal-scrolled" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemeriksaan / CPPT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._form')
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._riwayat')
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @include('content.pemeriksaan.modal._tabResep')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="simpanPemeriksaanRalan()"><i class="ti ti-device-floppy me-1"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-1"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@include('content.pemeriksaan.modal._pemeriksaanGigi')
@include('content.pemeriksaan.modal._diagnosaPasien')
@include('content.pemeriksaan.modal._tindakanPasien')
@include('content.pemeriksaan.modal._modalEditRacikan')
@push('script')
    <script>
        var tabObat = $('#tabObat');
        $('#modalCppt').on('hidden.bs.modal', (e) => {
            $('.modal-backdrop').remove();
            $(e.currentTarget).find('#formCpptRajal').find('input, textarea').val('-')
            tabelResepUmum.find('tbody').empty()
            tabelResepRacikan.find('tbody').empty()
        })

        $('#modalCppt').on('shown.bs.modal', (e) => {
            switcTab(tabObat)
        })

        function modalCppt(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                const {
                    pasien,
                    pemeriksaan_ralan,
                    dokter,
                    poliklinik
                } = response;
                $('#formCpptRajal input[name=no_rawat]').val(no_rawat)
                $('#formCpptRajal input[name=stts]').val(response.stts)
                $('#formCpptRajal input[name=no_rkm_medis]').val(response.no_rkm_medis)
                $('#formCpptRajal input[name=nm_pasien]').val(`${pasien.nm_pasien} / ${pasien.jk == 'L' ? 'Laki-laki' : 'Perempuan'}`)
                $('#formCpptRajal input[name=tgl_lahir]').val(`${formatTanggal(pasien.tgl_lahir)} / ${response.umurdaftar} ${response.sttsumur}`)
                $('#formCpptRajal input[name=keluarga]').val(`${pasien.keluarga} : ${pasien.namakeluarga}`)
                $('#formCpptRajal input[name=nip]').val(`${response.kd_dokter}`)
                $('#formCpptRajal input[name=nm_dokter]').val(`${dokter.nm_dokter}`)
                $('#formCpptRajal input[name=pembiayaan]').val(setTextPenjab(response.penjab.png_jawab, false))
                $('#formCpptRajal input[name=no_peserta]').val(`${pasien.no_peserta}`)
                $('#formCpptRajal input[name=kd_poli]').val(`${response.kd_poli}`)
                $('#formCpptRajal input[name=nm_poli]').val(`${poliklinik.nm_poli}`)
                $('#formCpptRajal input[name=kd_poli_pcare]').val(`${poliklinik.maping?.kd_poli_pcare}`)
                $('#formKunjunganPcare input[name=tgl_daftar]').val(`${splitTanggal(response.tgl_registrasi)}`)
                $('#formKunjunganPcare input[name=nm_poli_pcare]').val(`${poliklinik.maping?.nm_poli_pcare}`)
                $('#formKunjunganPcare input[name=kd_dokter_pcare]').val(`${dokter.maping?.kd_dokter_pcare}`)
                $('#btnTambahResep').attr('onclick', `tambahResep('${no_rawat}')`)
                $('#btnDiagnosaPasien').attr('onclick', `diagnosaPasien('${no_rawat}')`);
                $('#btnTindakanPasien').attr('onclick', `tindakanPasien('${no_rawat}')`);
                setRiwayat(response.no_rkm_medis)
                if (pasien.alergi.length) {
                    const alergi = pasien.alergi;
                    inputAlergi.empty()
                    alergi.forEach((resAlergi) => {
                        const optionAlergi = new Option(resAlergi.alergi, resAlergi.alergi, true, true);
                        inputAlergi.append(optionAlergi).trigger('change');
                    });
                    selectAlergi(inputAlergi, $('#formCpptRajal'))
                } else {
                    inputAlergi.empty()
                    selectAlergi(inputAlergi, $('#formCpptRajal'))
                }

                renderResepObat(no_rawat)

                if (pemeriksaan_ralan) {
                    Object.keys(pemeriksaan_ralan).map((key, index) => {
                        const select = $(`#formCpptRajal select[name=${key}]`);
                        const input = $(`#formCpptRajal input[name=${key}]`);
                        const textarea = $(`#formCpptRajal textarea[name=${key}]`);

                        if (textarea.length) {
                            textarea.val(pemeriksaan_ralan[key] ? pemeriksaan_ralan[key] : '-')
                        } else {
                            textarea.text('0')
                        }

                        if (input.length) {
                            const periksa = key === 'nip' ? response.kd_dokter : pemeriksaan_ralan[key]
                            input.val(periksa ? periksa : '0')
                        } else {
                            input.val('-')
                        }
                        if (select.length) {
                            select.find(`option:contains("${pemeriksaan_ralan[key]}")`).attr('selected', 'selected')
                        }
                    })
                }

            })
            $('#modalCppt').modal('show')
        }

        function renderResepObat(no_rawat) {
            getResep({
                no_rawat: no_rawat,
            }).done((resep) => {
                if (resep.length) {
                    resep.map((res) => {
                        const {
                            resep_racikan,
                            resep_dokter
                        } = res;
                        btnTambahResep.attr('onclick', `hapusResep('${no_rawat}')`)
                        $(`#no_resep`).val(res.no_resep);
                        if (resep_dokter.length)
                            setResepDokter(res.no_resep);
                        if (resep_racikan.length)
                            setResepRacikan(res.no_resep)
                    })
                    btnTambahResep.removeClass('btn-primary').addClass('btn-danger');
                    btnTambahResep.text('Hapus Resep')
                    btnCetakResep.attr('onclick', `cetakResep('${no_rawat}')`)
                    tabelResepUmum.removeClass('d-none')
                    tabelResepRacikan.removeClass('d-none')
                    btnSimpanObat.removeClass('d-none')
                    btnSimpanRacikan.removeClass('d-none')
                    btnTambahObat.removeClass('d-none')
                    btnTambahRacikan.removeClass('d-none')
                    btnCetakResep.removeClass('d-none')
                } else {
                    btnTambahResep.removeClass('btn-danger').addClass('btn-primary');
                    btnTambahResep.text('Tambah Resep')
                    btnCetakResep.removeAttr('onclick')
                    tabelResepUmum.addClass('d-none')
                    tabelResepRacikan.addClass('d-none')
                    btnSimpanObat.addClass('d-none')
                    btnSimpanRacikan.addClass('d-none')
                    btnTambahObat.addClass('d-none')
                    btnTambahRacikan.addClass('d-none')
                    btnCetakResep.addClass('d-none')
                }
            });
        }
    </script>
@endpush
