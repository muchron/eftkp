<div class="modal modal-blur fade" id="modalResumeMedis" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Resume Medis Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="row gy-2">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label for="pasien">
                            Pasien
                        </label>
                        <div class="row">
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-3">
                                <input type="text" class="form-control  no_rawat" placeholder="" aria-label="" id="no_rawat" name="no_rawat" readonly="" style="background-color: #e9ecef;cursor:not-allowed;">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-5">
                                <input type="search" style="background-color: #e9ecef;cursor:not-allowed" class="form-control  pasien" id="pasien" name="pasien" placeholder="" aria-label="" aria-describedby="pasien" readonly="">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-4">
                                <input type="search" style="background-color: #e9ecef;cursor:not-allowed" class="form-control  tgl_lahir" id="tgl_lahir" name="tgl_lahir" placeholder="" aria-label="" aria-describedby="pasien" readonly="">
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="row">
                            <div class="mb-2 col-sm-12 col-md-2 col-lg-2">
                                <label for="dokter">Dokter</label>
                                <input type="search" class="form-control  kd_dokter" placeholder="" aria-label="" id="kd_dokter" name="kd_dokter" readonly="">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-4">
                                <label for="kd_dokter"></label>
                                <input type="search" class="form-control  dokter" placeholder="" aria-label="" id="dokter" name="dokter" readonly="">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="kamar">Kamar Pembiayaan</label>
                                <input type="search" class="form-control  kamar" placeholder="" aria-label="" id="kamar" name="kamar" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-2">
                                <label for="tgl_masuk">Tgl. Masuk</label>
                                <input type="search" class="form-control  tgl_masuk" placeholder="" aria-label="" id="tgl_masuk" name="tgl_masuk" readonly="">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-2">
                                <label for="tgl_masuk">Tgl. Keluar</label>
                                <input type="search" class="form-control  tgl_keluar" placeholder="" aria-label="" id="tgl_keluar" name="tgl_keluar" readonly="">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_awal">Diagnosa Awal</label>
                                <input type="search" class="form-control  diagnosa_awal" placeholder="" aria-label="" id="diagnosa_awal" name="diagnosa_awal">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-3">
                                <label for="alasan">Indikasi Rawat</label>
                                <input type="search" class="form-control  alasan" placeholder="" aria-label="" id="alasan" name="alasan" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-sm-12 col-md-12 col-lg-7">
                        <div class="separator m-2">1. Riwayat Kesehatan</div>
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="keluhan">Keluhan Utama <a href="javascript:void(0)" id="srcKeluhan" onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'keluhan')"><i class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="keluhan_utama" id="keluhan_utama" cols="30" rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="pemeriksaan_fisik">Pemeriksaan Fisik <a href="javascript:void(0)" id="srcPemeriksaan" onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'pemeriksaan')"><i class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="pemeriksaan_fisik" id="pemeriksaan_fisik" cols="30" rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="pemeriksaan_penunjang" id="srcRadiologi" onclick="listHasilRadiologi('2024/01/07/000515', '063263', 'IGDK')">Pemeriksaan Radiologi Terpenting <a href="javascript:void(0)" id="srcRadiologi" onclick="listHasilRadiologi('2024/01/07/000515', '063263', 'IGDK')"><i class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang" cols="30" rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="hasil_lanorat">Pemeriksaan Laborat Terpenting <a href="javascript:void(0)" id="srcLab" onclick="listHasilLab('2024/01/07/000515', '063263', 'IGDK')"><i class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="hasil_laborat" id="hasil_laborat" cols="30" rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="tindakan_dan_operasi">Tindakan/Operasi Selama Perawatan </label>
                                <textarea class="form-control" name="tindakan_dan_operasi" id="tindakan_dan_operasi" cols="30" rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="obat_di_rs">Obat-obatan Selama Perwatan <a href="javascript:void(0)" id="srcObat" onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'obat')"><i class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="obat_di_rs" id="obat_di_rs" cols="30" rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="separator m-2">2. Diagnosa Akhir</div>
                        <div class="row gy-2">
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_utama" class="mt-2">Diagnosa Utama</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_utama" id="diagnosa_utama"></select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_sekunder1" class="mt-2">Diagnosa Sekunder1</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_sekunder1" id="diagnosa_sekunder1"></select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_sekunder2" class="mt-2">Diagnosa Sekunder2</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_sekunder2" id="diagnosa_sekunder2"></select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_sekunder3" class="mt-2">Diagnosa Sekunder3</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_sekunder3" id="diagnosa_sekunder3"></select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_sekunder4" class="mt-2">Diagnosa Sekunder4</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_sekunder4" id="diagnosa_sekunder4"></select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_sekunder5" class="mt-2">Diagnosa Sekunder5</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_sekunder5" id="diagnosa_sekunder5"></select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_sekunder6" class="mt-2">Diagnosa Sekunder6</label>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9">
                                <select class="form-select " name="diagnosa_sekunder6" id="diagnosa_sekunder6"></select>
                            </div>
                        </div>
                        <div class="separator m-2">3. Prosedur</div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_utama" class="mt-2">Prosedur Utama</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="search" class="form-control " name="prosedur_utama" id="prosedur_utama" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="search" class="form-control " name="kd_prosedur_utama" id="kd_prosedur_utama" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-sm btn-diagnosa" type="button" id="" onclick="listDiagnosaRanap('prosedur','kd_prosedur_utama', 'prosedur_utama')"><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_sekunder1" class="mt-2">Prosedur sekunder 1</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="search" class="form-control " name="prosedur_sekunder" id="prosedur_sekunder" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="search" class="form-control " name="kd_prosedur_sekunder" id="kd_prosedur_sekunder" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-sm btn-diagnosa" type="button" id="" onclick="listDiagnosaRanap('prosedur','kd_prosedur_sekunder', 'prosedur_sekunder')"><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_sekunder2" class="mt-2">Prosedur sekunder 2</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="search" class="form-control " name="prosedur_sekunder2" id="prosedur_sekunder2" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="search" class="form-control " name="kd_prosedur_sekunder2" id="kd_prosedur_sekunder2" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-sm btn-diagnosa" type="button" id="" onclick="listDiagnosaRanap('prosedur','kd_prosedur_sekunder2', 'prosedur_sekunder2')"><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_sekunder3" class="mt-2">Prosedur sekunder 3</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="search" class="form-control " name="prosedur_sekunder3" id="prosedur_sekunder3" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="search" class="form-control " name="kd_prosedur_sekunder3" id="kd_prosedur_sekunder3" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-sm btn-diagnosa" type="button" id="" onclick="listDiagnosaRanap('prosedur','kd_prosedur_sekunder3', 'prosedur_sekunder3')"><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="separator mt-2 mb-2"></div>
                            <div class="mb-2 col-sm-12 col-md-12 col-lg-12">
                                <label for="edukasi">Instruksi/Anjuran dan Edukasi (Follow up)</label>
                                <textarea class="form-control" name="edukasi" id="edukasi" cols="30" rows="5" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="row">
                                <div class="mb-2 col-sm-12 col-md-6 col-lg-3">
                                    <label for="keadaan">Kondisi Pulang</label>
                                    <select class="form-select" name="keadaan" id="keadaan">
                                        <option value="Membaik">Membaik</option>
                                        <option value="Sembuh">Sembuh</option>
                                        <option value="Keadaan Khusus">Keadaan Khusus</option>
                                        <option value="Meninggal">Meninggal</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-sm-12 col-md-6 col-lg-3">
                                    <label for="ket_keadaan"></label>
                                    <select class="form-select" name="ket_keadaan" id="ket_keadaan">
                                        <option value="SANAM">SANAM</option>
                                        <option value="BONAM">BONAM</option>
                                        <option value="MALAM">MALAM</option>
                                        <option value="BUBIA">BUBIA</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-sm-12 col-md-6 col-lg-4">
                                    <label for="cara_keluar">Cara Keluar</label>
                                    <select class="form-select" name="cara_keluar" id="cara_keluar">
                                        <option value="Atas Izin Dokter">Atas Izin Dokter</option>
                                        <option value="Pindah RS">Pindah RS</option>
                                        <option value="Pulang Atas Permintaan Sendiri">Pulang Atas Permintaan Sendiri</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-sm-12 col-md-6 col-lg-2">
                                    <label for="ket_keluar"></label>
                                    <input class="form-control " name="ket_keluar" id="ket_keluar" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-sm-12 col-md-2 col-lg-3">
                                <label for="dilanjutkan">Dilanjutkan</label>
                                <select class="form-select" name="dilanjutkan" id="dilanjutkan">
                                    <option value="Kembali Ke RS">Kembali Ke RS</option>
                                    <option value="RS Lain">RS Lain</option>
                                    <option value="Dokter Luar">Dokter Luar</option>
                                    <option value="Puskesmes">Puskesmas</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-4">
                                <label for="ket_dilanjutkan"></label>
                                <input class="form-control " name="ket_dilanjutkan" id="ket_dilanjutkan" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-5">
                                <label for="tgl_kontrol">Tanggal Kontrol</label>
                                <input class="form-control " name="tgl_kontrol" id="tgl_kontrol" onfocus="removeZero(this)" onblur="isEmpty(this)">
                                <input name="jam_kontrol" id="jam_kontrol" type="hidden" value="21:19:07">
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-2 col-sm-12 col-md-2 col-lg-3">
                                <label for="shk">SHK</label>
                                <select class="form-select" name="shk" id="shk">
                                    <option value="-" selected="">-</option>
                                    <option value="Belum">Belum</option>
                                    <option value="Sudah">Sudah</option>
                                </select>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-10 col-lg-9">
                                <label for="shk_keterangan"></label>
                                <input class="form-control " name="shk_keterangan" id="shk_keterangan" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-sm-12 col-md-12 col-lg-12">
                                <label for="obat_pulang">Obat Pulang <a href="javascript:void(0)" id="srcObatPulang" class="badge text-bg-primary" onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'obatpulang')"><i class="bi bi-search"></i></a></label>
                                <textarea class="form-control" name="obat_pulang" id="obat_pulang" cols="30" rows="5" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="ti ti-x me-2"></i>Keluar</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        let modalResumeMedis = $('#modalResumeMedis');
        function resumeMedis(no_rawat){
            modalResumeMedis.modal('show');
        }

    </script>
@endpush
