<form action="" method="post" id="formCpptRajal">
    <div class="row">
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-3">
                <label class="form-label">No. Rawat</label>
                <input autocomplete="off" type="text" class="form-control" name="no_rawat" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-lg-4">
            <div class="mb-3">
                <label class="form-label">Pasien</label>
                <div class="input-group mb-2">
                    <input autocomplete="off" type="text" class="form-control" name="no_rkm_medis" readonly>
                    <input autocomplete="off" type="text" class="form-control w-50" name="nm_pasien" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-3">
                <label class="form-label">Tgl. Lahir / Umur</label>
                <input autocomplete="off" type="text" class="form-control" name="tgl_lahir" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-3">
                <label class="form-label">Keluarga</label>
                <input autocomplete="off" type="text" class="form-control" name="keluarga" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-3">
                <label class="form-label">Pembiayaan</label>
                <input autocomplete="off" type="text" class="form-control" name="pembiayaan" readonly>
            </div>
        </div>
    </div>
    <fieldset class="form-fieldset">
        <div class="row gy-2">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Subjek</label>
                            <textarea class="form-control" rows="6" autocomplete="off" name="keluhan"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Objek</label>
                            <textarea class="form-control" rows="6" autocomplete="off" name="pemeriksaan"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Suhu (<sup>o</sup>C)</label>
                            <div class="input-group mb-2">
                                <input autocomplete="off" type="text" class="form-control" name="suhu" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Tinggi (cm)</label>
                            <div class="input-group mb-2">
                                <input autocomplete="off" type="text" class="form-control" name="tinggi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Berat (Kg)</label>
                            <div class="input-group mb-2">
                                <input autocomplete="off" type="text" class="form-control" name="tinggi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Tensi (mmHg)</label>
                            <div class="input-group mb-2">
                                <input autocomplete="off" type="text" class="form-control" name="tinggi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Respirasi (/mnt)</label>
                            <div class="input-group mb-2">
                                <input autocomplete="off" type="text" class="form-control" name="tinggi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Nadi (/mnt)</label>
                            <div class="input-group mb-2">
                                <input autocomplete="off" type="text" class="form-control" name="nadi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Asesmen</label>
                            <textarea class="form-control" rows="6" autocomplete="off" name="penilaian"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
@push('script')
    <script>
        function modalCppt(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                console.log('RESPONSE ===', response);
                $('#formCpptRajal input[name=no_rawat]').val(no_rawat)
                $('#formCpptRajal input[name=no_rkm_medis]').val(response.no_rkm_medis)
                $('#formCpptRajal input[name=nm_pasien]').val(`${response.pasien.nm_pasien} / ${response.pasien.jk == 'L' ? 'Laki-laki' : 'Perempuan'}`)
                $('#formCpptRajal input[name=tgl_lahir]').val(`${formatTanggal(response.pasien.tgl_lahir)} / ${response.umurdaftar} ${response.sttsumur}`)
                $('#formCpptRajal input[name=keluarga]').val(`${response.pasien.keluarga} : ${response.pasien.namakeluarga}`)
                $('#formCpptRajal input[name=pembiayaan]').val(`${response.penjab.png_jawab}`)
            })
            $('#modalCppt').modal('show')
        }
    </script>
@endpush
