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
    @include('content.registrasi._modalRujukanEksternal')
    @include('content.registrasi._modalSuratSakit')
    @include('content.registrasi._modalSuratSehat')
    @include('content.registrasi._modalObatPcare')
    @include('content.pemeriksaan.modal.penilaianAwal._modalPenilaianAwal')
    @include('content.pemeriksaan.modal.penilaianAwal._modalSkriningJatuh')
    @include('content.registrasi._modalRiwayat')
@endsection
@push('script')
    <script>
        //Script Reistrasi
        let selectStatusLayan = formFilterRegistrasi.find('select[name="stts"'); //get data from selection filter stts
        $(document).ready(() => {
            $('#tglAwal').val(tglAwal)
            $('#tglAkhir').val(tglAkhir)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        function setStatusLayan(no_rawat, status) {
            return $.post(`${url}/registrasi/update/status`, {
                stts: status,
                no_rawat: no_rawat
            }).done(() => {
                loadTabelRegistrasi(tglAwal, tglAkhir, selectFilterStts.val(), selectFilterDokter.val())
            }).fail((error, status, code) => {
                if (error.status !== 500) {
                    const errorMessage = {
                        status: error.status,
                        statusText: code,
                        responseJSON: error.responseJSON.message,
                    }
                    console.log(errorMessage)
                    alertErrorAjax(errorMessage)

                } else {
                    alertErrorAjax(error)
                }
            });
        }

        function ubahRegistrasi(no_rawat) {
            modalRegistrasi.modal('show');
            getRegDetail(no_rawat).done((response) => {
                const {
                    pasien,
                    penjab,
                    dokter,
                    poliklinik
                } = response;
                checkJam.prop('checked', false).trigger('change')
                checkNoReg.prop('checked', false).trigger('change')

                formRegistrasiPoli.find('input').prop('disabled', true)
                formRegistrasiPoli.find('input[name="no_reg"]').prop('disabled', false).val(response.no_reg)
                formRegistrasiPoli.find('input[name="no_rawat"]').val(response.no_rawat)
                formRegistrasiPoli.find('input[name="no_rkm_medis"]').val(response.no_rkm_medis)
                formRegistrasiPoli.find('input[name="nm_pasien"]').val(pasien.nm_pasien)
                formRegistrasiPoli.find('input[name=keluarga]').val(response.hubunganpj)
                formRegistrasiPoli.find('input[name=namakeluarga]').val(response.p_jawab)
                formRegistrasiPoli.find('input[name=alamatpj]').val(response.almt_pj)
                formRegistrasiPoli.find('input[name=status]').val(response.stts_daftar)
                formRegistrasiPoli.find('input[name=no_peserta]').prop('disabled', false)
                modalRegistrasi.find('.modal-title').html('Ubah Data Registrasi')

                const pj = new Option(`${response.kd_pj} - ${penjab?.png_jawab}`, response.kd_pj, true, true);
                const dpjp = new Option(`${response.kd_dokter} - ${dokter?.nm_dokter}`, response.kd_dokter, true, true);
                const poli = new Option(`${response.kd_poli} - ${poliklinik?.nm_poli}`, response.kd_poli, true, true);
                formRegistrasiPoli.find('select[name=kd_pj]').append(pj)
                formRegistrasiPoli.find('select[name=kd_dokter]').append(dpjp)
                formRegistrasiPoli.find('select[name=kd_poli]').append(poli)
                btnSimpanReg.removeAttr('onclick').attr('onclick', 'updateRegPeriksa()')
            });
        }

        function updateRegPeriksa() {
            const data = getDataForm('formRegistrasiPoli', ['input', 'select']);
            swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan mengubah data registrasi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(`${url}/registrasi/update`, {
                        no_rawat: data['no_rawat'],
                        kd_pj: data['kd_pj'],
                        kd_dokter: data['kd_dokter'],
                        no_reg: data['no_reg'],
                        kd_poli: data['kd_poli'],
                    }).done((response) => {
                        alertSuccessAjax().then(() => {
                            loadTabelRegistrasi(tglAwal, tglAkhir, selectFilterStts.val(), selectFilterDokter.val())
                            modalRegistrasi.modal('hide')
                        })
                    }).fail((error, status, code) => {
                        if (error.status !== 500) {
                            const errorMessage = {
                                status: error.status,
                                statusText: code,
                                responseJSON: error.responseJSON.message,
                            }
                            console.log(errorMessage)
                            alertErrorAjax(errorMessage)

                        } else {
                            alertErrorAjax(error)
                        }
                    })
                }
            })

        }
    </script>
@endpush
