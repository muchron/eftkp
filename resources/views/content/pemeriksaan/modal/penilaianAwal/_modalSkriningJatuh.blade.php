<div class="modal modal-blur fade" id="modalSkriningJatuh" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Skrining Resiko Jatuh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="">
                <div class="alert alert-success d-none" role="alert" id="alertPenilaian">
                    <h4 class="alert-title">Sudah dilakukan penilaian awal pada</h4>
                    <div class="text-secondary">
                        <p id="tgl_penilaian" class="m-0"></p>
                    </div>
                </div>
                <form action="" id="formPenilaianAwalKeperawatan">
                    <fieldset class="form-fieldset">
                        <div class="row gy-2">
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <label for="no_rawat" class="form-label">No. Rawat</label>
                                <input type="text" class="form-control" id="no_rawat" name="no_rawat" onfocus="return removeZero(this)" onblur="isEmpty(this)" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="pasien" class="form-label">Pasien</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="no_rkm_medis" name="no_rkm_medis" onfocus="return removeZero(this)" onblur="isEmpty(this)" readonly>
                                    <input type="text" class="form-control w-50" id="pasien" name="pasien" onfocus="return removeZero(this)" onblur="isEmpty(this)" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <label for="tgl_lahir" class="form-label">Tgl. Lahir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" onfocus="return removeZero(this)" onblur="isEmpty(this)" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12">
                                <label for="informasi" class="form-label">Petugas</label>
                                <input type="text" class="form-control" id="petugas" name="petugas" onfocus="return removeZero(this)" onblur="isEmpty(this)" readonly value="{{ session()->get('pegawai')->nama }}">
                            </div>
                        </div>
                    </fieldset>

                    <div class="row gy-2">
                        <div class="separator mt-2">1. Pengkajian Resiko Jatuh Up & Go</div>
                        <div class="col-lg-8"><label for="form-label">a. Pasien memerlukan bantuan saat duduk/berdiri/berjalan</label></div>
                        <div class="col-lg-4">
                            <select name="bantuan" id="bantuan" class="form-select">
                                <option value="Tidak" selected>Tidak</option>
                                <option value="Ya">Ya</option>
                            </select>
                        </div>
                        <div class="col-lg-8"><label for="form-label">b. Pasien tampak tidak seimbang (sempoyongan/limbung)</label></div>
                        <div class="col-lg-4">
                            <select name="seimbang" id="seimbang" class="form-select">
                                <option value="Tidak" selected>Tidak</option>
                                <option value="Ya">Ya</option>
                            </select>
                        </div>
                        <div class="separator mt-2">2. Hasil</div>
                        <div class="col-lg-4"><label for="form-label">Hasil</label></div>
                        <div class="col-lg-4">
                            <select name="hasil" id="hasil" class="form-select">
                                <option value="Tidak beresiko (tidak ditemukan a dan b)" selected>Tidak beresiko (tidak ditemukan a dan b)</option>
                                <option value="Resiko rendah (ditemukan a/b)">Resiko rendah (ditemukan a/b)</option>
                                <option value="Resiko tinggi (ditemukan a dan b)">Ditemukan salah satu hasil dari a atau b</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select name="ket_hasil" id="ket_hasil" class="form-select">
                                <option value="Tidak beresiko jatuh" selected>Tidak beresiko jatuh</option>
                                <option value="Beresiko jatuh">Beresiko jatuh</option>
                            </select>
                        </div>
                        <div class="separator mt-2">3. Tindakan</div>
                        <div class="col-lg-4"><label for="form-label">Tindakan</label></div>
                        <div class="col-lg-4">
                            <select name="tindakan" id="tindakan" class="form-select">
                                <option value="Tidak Ada Tindakan" selected>Tidak Ada Tindakan</option>
                                <option value="Pasang Pita Kuning">Pasang Pita Kuning</option>
                                <option value="Edukasi">Edukasi</option>
                                <option value="Memberi Alat Bantu Jalan">Memberi Alat Bantu Jalan</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnCetak" onclick="simpanPenilaianAwalKeperawatan()"><i class="ti ti-device-floppy me-1"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var modalSkriningJatuh = $('#modalSkriningJatuh')

        function skriningResikoJatuh(no_rawat) {
            getRegDetail(no_rawat).done((response) => {
                modalSkriningJatuh.find('input[name="no_rawat"]').val(response.no_rawat);
                modalSkriningJatuh.find('input[name="no_rkm_medis"]').val(response.no_rkm_medis);
                modalSkriningJatuh.find('input[name="pasien"]').val(`${response.pasien.nm_pasien} (${response.pasien.jk})`);
                modalSkriningJatuh.find('input[name="tgl_lahir"]').val(`${splitTanggal(response.pasien.tgl_lahir)} / ${response.umurdaftar} ${response.sttsumur}`);
                modalSkriningJatuh.find('input[name="pekerjaan"]').val(response.pasien.pekerjaan);
                modalSkriningJatuh.find('input[name="pendidikan"]').val(response.pasien.pnd);
                modalSkriningJatuh.find('input[name="cacat_fisik"]').val(response.pasien.cacat_fisik.nama_cacat);
                modalSkriningJatuh.modal('show');

            })
        }
    </script>
@endpush
