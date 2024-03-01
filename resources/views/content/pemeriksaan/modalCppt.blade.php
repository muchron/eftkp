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
            $(e.currentTarget).find('#formCpptRajal').find('input, textarea').val('-')
        })
        $('#modalCppt').on('shown.bs.modal', (e) => {
            switcTab(tabObat)
        })

        function switcTab(tabElement, target = '') {
            $('.nav-link').removeClass('active');
            $('.tab-pane').removeClass('show active');

            if (target) {
                const element = tabElement.find(`a[href="#${target}"]`)
                $(element).addClass('active')
                $(target).addClass('show active');
            } else {
                tabElement.find('a').each((index, element) => {
                    if (index == 0) {
                        const target = $(element).attr('href')
                        $(element).addClass('active')
                        $(target).addClass('show active');
                    }
                })
            }

        }

        function modalCppt(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                $('#formCpptRajal input[name=no_rawat]').val(no_rawat)
                $('#formCpptRajal input[name=stts]').val(response.stts)
                $('#formCpptRajal input[name=no_rkm_medis]').val(response.no_rkm_medis)
                $('#formCpptRajal input[name=nm_pasien]').val(`${response.pasien.nm_pasien} / ${response.pasien.jk == 'L' ? 'Laki-laki' : 'Perempuan'}`)
                $('#formCpptRajal input[name=tgl_lahir]').val(`${formatTanggal(response.pasien.tgl_lahir)} / ${response.umurdaftar} ${response.sttsumur}`)
                $('#formCpptRajal input[name=keluarga]').val(`${response.pasien.keluarga} : ${response.pasien.namakeluarga}`)
                $('#formCpptRajal input[name=pembiayaan]').val(`${response.penjab.png_jawab}`)
                $('#formCpptRajal input[name=nip]').val(`${response.kd_dokter}`)
                $('#formCpptRajal input[name=nm_dokter]').val(`${response.dokter.nm_dokter}`)
                $('#formCpptRajal input[name=pembiayaan]').val(`${response.penjab.png_jawab}`)
                $('#formCpptRajal input[name=no_peserta]').val(`${response.pasien.no_peserta}`)
                $('#formCpptRajal input[name=kd_poli]').val(`${response.kd_poli}`)
                $('#formCpptRajal input[name=nm_poli]').val(`${response.poliklinik.nm_poli}`)
                $('#formCpptRajal input[name=kd_poli_pcare]').val(`${response.poliklinik.maping?.kd_poli_pcare}`)
                $('#formKunjunganPcare input[name=tgl_daftar]').val(`${splitTanggal(response.tgl_registrasi)}`)
                $('#formKunjunganPcare input[name=nm_poli_pcare]').val(`${response.poliklinik.maping?.nm_poli_pcare}`)
                $('#formKunjunganPcare input[name=kd_dokter_pcare]').val(`${response.dokter.maping?.kd_dokter_pcare}`)
                $('#btnTambahResep').attr('onclick', `tambahResep('${no_rawat}')`)
                $('#btnDiagnosaPasien').attr('onclick', `diagnosaPasien('${no_rawat}')`);
                $('#btnTindakanPasien').attr('onclick', `tindakanPasien('${no_rawat}')`);
                setRiwayat(response.no_rkm_medis)
                if (response.pasien.alergi.length) {
                    const alergi = response.pasien.alergi;
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

                getResep({
                    no_rawat: no_rawat,
                }).done((resep) => {
                    tabelResepUmum.find('tbody').empty()
                    if (resep.length) {
                        resep.map((res) => {
                            btnTambahResep.attr('onclick', `hapusResep('${no_rawat}')`)
                            $(`#no_resep`).val(res.no_resep);
                            if (res.resep_dokter.length)
                                setResepDokter(res.no_resep);
                            if (res.resep_racikan.length)
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
                if (response.pemeriksaan_ralan) {
                    const pemeriksaan = response.pemeriksaan_ralan;
                    Object.keys(pemeriksaan).map((key, index) => {
                        select = $(`#formCpptRajal select[name=${key}]`);
                        input = $(`#formCpptRajal input[name=${key}]`);
                        textarea = $(`#formCpptRajal textarea[name=${key}]`);

                        if (textarea.length) {
                            textarea.val(pemeriksaan[key] ? pemeriksaan[key] : '-')
                        } else {
                            textarea.text('0')
                        }

                        if (input.length) {
                            const periksa = key == 'nip' ? response.kd_dokter : pemeriksaan[key]
                            input.val(periksa ? periksa : '0')
                        } else {
                            input.val('-')
                        }
                        if (select.length) {
                            select.find(`option:contains("${pemeriksaan[key]}")`).attr('selected', 'selected')
                        }
                    })
                }

            })
            $('#modalCppt').modal('show')
        }
    </script>
@endpush
