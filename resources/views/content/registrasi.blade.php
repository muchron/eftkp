@extends('layout')

@section('body')
    <div class="container-xl h-100">
        {{-- <div class="row"> --}}
        {{-- <div class="col-lg-12 col-md-12 col-sm-12"> --}}
        @include('content.registrasi._tabelRegistrasi')
        {{-- </div> --}}
        {{-- </div> --}}
    </div>
    @include('content.registrasi._modalRujukanInternal')
    @include('content.registrasi._modalSuratSakit')
    @include('content.pemeriksaan.modal.penilaianAwal._modalPenilaianAwal')
    @include('content.pemeriksaan.modal.penilaianAwal._modalSkriningJatuh')
@endsection
@push('script')
    <script>
        var modalRujukanInternal = $('#modalRujukanInternal');
        var formRujukInternalPoli = $('#formRujukanInternalPoli');
        $(document).ready(() => {

            var tanggal = "{{ date('Y-m-d') }}";
            var tglAwal = localStorage.getItem('tglAwal') ? localStorage.getItem('tglAwal') : tanggal;
            var tglAkhir = localStorage.getItem('tglAkhir') ? localStorage.getItem('tglAkhir') : tanggal;

            $('#tglAwal').val(splitTanggal(tglAwal))
            $('#tglAkhir').val(splitTanggal(tglAkhir))

            loadTabelRegistrasi(tglAwal, tglAkhir)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.filterTangal').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayBtn: true,
                todayHighlight: true,
                language: "id",
            });
        })

        function modalCppt(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                $('#formCpptRajal input[name=no_rawat]').val(no_rawat)
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
                        btnTambahResep.text('TambahResep')
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

        $('#formFilterTanggal').on('submit', (e) => {
            e.preventDefault();
            const tglAwal = splitTanggal($('#formFilterTanggal input[name=tglAwal]').val())
            const tglAkhir = splitTanggal($('#formFilterTanggal input[name=tglAkhir]').val())
            localStorage.setItem('tglAwal', tglAwal)
            localStorage.setItem('tglAkhir', tglAkhir)
            loadTabelRegistrasi(tglAwal, tglAkhir);
        })

        function rujukInternal(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                modalRujukanInternal.modal('show')
                formRujukInternalPoli.find('input[name=no_rawat]').val(no_rawat)
                formRujukInternalPoli.find('input[name=no_rkm_medis]').val(response.no_rkm_medis)
                formRujukInternalPoli.find('input[name=nm_pasien]').val(response.pasien.nm_pasien)
                formRujukInternalPoli.find('input[name=poliklinik]').val(response.poliklinik.nm_poli)
            })
        }
    </script>
@endpush
