<form action="" method="post" id="formCpptRajal">
    <div class="row">
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-1">
                <label class="form-label">No. Rawat</label>
                <input autocomplete="off" type="text" class="form-control" name="no_rawat" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-lg-4">
            <div class="mb-1">
                <label class="form-label">Pasien</label>
                <div class="input-group mb-2">
                    <input autocomplete="off" type="text" class="form-control" name="no_rkm_medis" readonly>
                    <input autocomplete="off" type="text" class="form-control w-50" name="nm_pasien" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-1">
                <label class="form-label">Tgl. Lahir / Umur</label>
                <input autocomplete="off" type="text" class="form-control" name="tgl_lahir" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-1">
                <label class="form-label">Keluarga</label>
                <input autocomplete="off" type="text" class="form-control" name="keluarga" readonly>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 col-lg-2">
            <div class="mb-1">
                <label class="form-label">Pembiayaan</label>
                <input autocomplete="off" type="text" class="form-control" name="pembiayaan" readonly>
            </div>
        </div>
    </div>
    <fieldset class="form-fieldset">
        <div class="row gy-2">
            <div class="col-xl-6 col-lg-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-1">
                            <label class="form-label">Subjek</label>
                            <textarea class="form-control" rows="5" autocomplete="off" name="keluhan"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-1">
                            <label class="form-label">Objek</label>
                            <textarea class="form-control" rows="5" autocomplete="off" name="pemeriksaan"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Suhu</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="suhu">
                                <span class="input-group-text">
                                    °C
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Tinggi</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="tinggi">
                                <span class="input-group-text">
                                    cm
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Berat</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="berat">
                                <span class="input-group-text">
                                    Kg
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Tensi</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="berat">
                                <span class="input-group-text">
                                    mmHg
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Respirasi</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="respirasi">
                                <span class="input-group-text">
                                    x/mnt
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Nadi (/mnt)</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="nadi">
                                <span class="input-group-text">
                                    x/mnt
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">SpO²</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="spo2">
                                <span class="input-group-text">
                                    %
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-1col-md-2 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">GCS</label>
                            <div class="input-group input-group-flat">
                                <input autocomplete="off" type="text" class="form-control" name="gcs">
                                <span class="input-group-text">
                                    (E,V,M)
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Kesadaran</label>
                            <select class="form-select" name="kesadaran">
                                <option value="Compos Mentis">Compos Mentis</option>
                                <option value="Apatis">Apatis</option>
                                <option value="Somnolence">Somnolence</option>
                                <option value="Sopor">Sopor</option>
                                <option value="Coma">Coma</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Alergi</label>
                            <input autocomplete="off" type="text" class="form-control" name="alergi">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                        <label class="form-label">Diagnosa</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="diagnosa" autocomplete="off" readonly>
                            <button class="btn w-5" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="-5 -5 24 30" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-1">
                            <label class="form-label">Asesmen</label>
                            <textarea class="form-control" rows="5" autocomplete="off" name="penilaian"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-1">
                            <label class="form-label">Plan</label>
                            <textarea class="form-control" rows="5" autocomplete="off" name="rtl"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="mb-1">
                        <label class="form-label">Instruksi</label>
                        <textarea class="form-control" rows="5" autocomplete="off" name="instruksi"></textarea>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    @include('content.pemeriksaan.modal._tabResep')
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
