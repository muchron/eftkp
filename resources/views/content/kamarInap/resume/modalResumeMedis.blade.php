<div class="modal modal-blur fade" id="modalResumeMedis" tabindex="-1" aria-modal="false" role="dialog"
     data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Resume Medis Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="" id="formResumeMedis">
                    <div class="row gy-2">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label for="pasien">
                            Pasien
                        </label>
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-3">
                                <input type="text" class="form-control  no_rawat"
                                       id="no_rawat" name="no_rawat" readonly/>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="no_rkm_medis" name="no_rkm_medis" readonly/>
                                    <input type="text" class="form-control w-50" id="pasien" name="pasien" readonly/>
                                </div>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-4">
                                <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" readonly/>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="dokter">Dokter</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                       id="kd_dokter" name="kd_dokter" readonly>
                                    <input type="text" class="form-control w-50"
                                       id="dokter" name="dokter" readonly>
                                </div>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="kamar">Kamar Pembiayaan</label>
                                <div class="input-group" >
                                    <input type="text" class="form-control"  id="kd_kamar"
                                           name="kd_kamar" readonly/>
                                    <input type="text" class="form-control w-50"  id="kamar"
                                           name="kamar" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-2">
                                <label for="tgl_masuk">Tgl. Masuk</label>
                                <input type="text" class="form-control"
                                       id="tgl_masuk" name="tgl_masuk" readonly/>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-2">
                                <label for="tgl_masuk">Tgl. Keluar</label>
                                <input type="text" class="form-control"
                                       id="tgl_keluar" name="tgl_keluar" readonly/>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-3">
                                <label for="diagnosa_awal">Diagnosa Awal</label>
                                <input type="text" class="form-control"
                                       id="diagnosa_awal" name="diagnosa_awal" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-"/>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-3">
                                <label for="alasan">Indikasi Rawat</label>
                                <input type="text" class="form-control"
                                       id="alasan" name="alasan" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                       value="-" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-sm-12 col-md-12 col-lg-7">
                        <div class="separator m-2">1. Riwayat Kesehatan</div>
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="keluhan">Keluhan Utama <a href="javascript:void(0)" id="srcKeluhan"
                                                                      onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'keluhan')"><i
                                            class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="keluhan_utama" id="keluhan_utama" cols="30"
                                          rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="pemeriksaan_fisik">Pemeriksaan Fisik <a href="javascript:void(0)"
                                                                                    id="srcPemeriksaan"
                                                                                    onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'pemeriksaan')"><i
                                            class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="pemeriksaan_fisik" id="pemeriksaan_fisik" cols="30"
                                          rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="pemeriksaan_penunjang" id="srcRadiologi"
                                       onclick="listHasilRadiologi('2024/01/07/000515', '063263', 'IGDK')">Pemeriksaan
                                    Radiologi Terpenting <a href="javascript:void(0)" id="srcRadiologi"
                                                            onclick="listHasilRadiologi('2024/01/07/000515', '063263', 'IGDK')"><i
                                            class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="pemeriksaan_penunjang" id="pemeriksaan_penunjang"
                                          cols="30" rows="10" onfocus="removeZero(this)"
                                          onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="hasil_lanorat">Pemeriksaan Laborat Terpenting <a href="javascript:void(0)"
                                                                                             id="srcLab"
                                                                                             onclick="listHasilLab('2024/01/07/000515', '063263', 'IGDK')"><i
                                            class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="hasil_laborat" id="hasil_laborat" cols="30"
                                          rows="10" onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="tindakan_dan_operasi">Tindakan/Operasi Selama Perawatan </label>
                                <textarea class="form-control" name="tindakan_dan_operasi" id="tindakan_dan_operasi"
                                          cols="30" rows="10" onfocus="removeZero(this)"
                                          onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-6">
                                <label for="obat_di_rs">Obat-obatan Selama Perwatan <a href="javascript:void(0)"
                                                                                       id="srcObat"
                                                                                       onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'obat')"><i
                                            class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="obat_di_rs" id="obat_di_rs" cols="30" rows="10"
                                          onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="separator m-2">2. Diagnosa Akhir</div>
                        <div class="row gy-2">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_utama" class="mt-2">Diagnosa Utama</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_utama" id="diagnosa_utama" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_diagnosa_utama" id="kd_diagnosa_utama" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_utama', 'diagnosa_utama')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder" class="mt-2">Diagnosa sekunder 1</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
{{--                                <input type="text" class="form-control" name="diagnosa_sekunder" id="diagnosa_sekunder" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">--}}
                                    <select class="form-select" id="diagnosa_sekunder" name="diagnosa_sekunder"></select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
{{--                                    <select class="form-select" id="kd_diagnosa_sekunder" name="kd_diagnosa_sekunder" onchange="console.log(this)"></select>--}}
{{--                                <div class="input-group">--}}
                                    <input type="text" class="form-control" name="kd_diagnosa_sekunder" id="kd_diagnosa_sekunder" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
{{--                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap(this)" data-kode="kd_diagnosa_skunder" data-target="diagnosa_sekunder"><i class="ti ti-search"></i></button>--}}
{{--                                </div>--}}
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder2" class="mt-2">Diagnosa sekunder 2</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_sekunder2" id="diagnosa_sekunder2" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_diagnosa_sekunder2" id="kd_diagnosa_sekunder2" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_sekunder2', 'diagnosa_sekunder2')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder3" class="mt-2">Diagnosa sekunder 3</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_sekunder3" id="diagnosa_sekunder3" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div type="text" class="input-group">
                                    <input class="form-control" name="kd_diagnosa_sekunder3" id="kd_diagnosa_sekunder3" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_sekunder3', 'diagnosa_sekunder3')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder4" class="mt-2">Diagnosa sekunder 4</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_sekunder4" id="diagnosa_sekunder4" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_diagnosa_sekunder4" id="kd_diagnosa_sekunder4" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_sekunder4', 'diagnosa_sekunder4')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder5" class="mt-2">Diagnosa sekunder 5</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_sekunder5" id="diagnosa_sekunder5" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_diagnosa_sekunder5" id="kd_diagnosa_sekunder5" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_sekunder5', 'diagnosa_sekunder5')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder6" class="mt-2">Diagnosa sekunder 6</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_sekunder6" id="diagnosa_sekunder6" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_diagnosa_sekunder6" id="kd_diagnosa_sekunder6" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_sekunder6', 'diagnosa_sekunder6')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="diagnosa_sekunder7" class="mt-2">Diagnosa sekunder 7</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control" name="diagnosa_sekunder7" id="diagnosa_sekunder7" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kd_diagnosa_sekunder7" id="kd_diagnosa_sekunder7" onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id="" onclick="getDiagnosaRanap('diagnosa','kd_diagnosa_sekunder7', 'diagnosa_sekunder7')"><i class="ti ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="separator m-2">3. Prosedur</div>
                        <div class="row gy-2">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_utama" class="mt-2">Prosedur Utama</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control " name="prosedur_utama" id="prosedur_utama"
                                       onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control " name="kd_prosedur_utama"
                                           id="kd_prosedur_utama" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                           value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id=""
                                            onclick="getDiagnosaRanap('prosedur','kd_prosedur_utama', 'prosedur_utama')">
                                        <i class="ti ti-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_sekunder1" class="mt-2">Prosedur sekunder 1</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control " name="prosedur_sekunder"
                                       id="prosedur_sekunder" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                       value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control " name="kd_prosedur_sekunder"
                                           id="kd_prosedur_sekunder" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                           value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id=""
                                            onclick="getDiagnosaRanap('prosedur','kd_prosedur_sekunder', 'prosedur_sekunder')">
                                        <i class="ti ti-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_sekunder2" class="mt-2">Prosedur sekunder 2</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control " name="prosedur_sekunder2"
                                       id="prosedur_sekunder2" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                       value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control " name="kd_prosedur_sekunder2"
                                           id="kd_prosedur_sekunder2" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                           value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id=""
                                            onclick="getDiagnosaRanap('prosedur','kd_prosedur_sekunder2', 'prosedur_sekunder2')">
                                        <i class="ti ti-search"></i></button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <label for="prosedur_sekunder3" class="mt-2">Prosedur sekunder 3</label>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-6 mb-2">
                                <input type="text" class="form-control " name="prosedur_sekunder3"
                                       id="prosedur_sekunder3" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                       value="-">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control " name="kd_prosedur_sekunder3"
                                           id="kd_prosedur_sekunder3" onfocus="removeZero(this)" onblur="isEmpty(this)"
                                           value="-">
                                    <button class="btn btn-primary btn-diagnosa" type="button" id=""
                                            onclick="getDiagnosaRanap('prosedur','kd_prosedur_sekunder3', 'prosedur_sekunder3')">
                                        <i class="ti ti-search"></i></button>
                                </div>
                            </div>

                        </div>

                        <div class="row gy-2">
                            <div class="separator mt-2 mb-2"></div>
                            <div class="mb-2 col-sm-12 col-md-12 col-lg-12">
                                <label for="edukasi">Instruksi/Anjuran dan Edukasi (Follow up)</label>
                                <textarea class="form-control" name="edukasi" id="edukasi" cols="30" rows="5"
                                          onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                            <div class="row gy-2">
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
                                        <option value="Pulang Atas Permintaan Sendiri">Pulang Atas Permintaan Sendiri
                                        </option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="mb-2 col-sm-12 col-md-6 col-lg-2">
                                    <label for="ket_keluar"></label>
                                    <input class="form-control " name="ket_keluar" id="ket_keluar"
                                           onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                                </div>
                            </div>
                        </div>
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-6 col-lg-3">
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
                                <input class="form-control " name="ket_dilanjutkan" id="ket_dilanjutkan"
                                       onfocus="removeZero(this)" onblur="isEmpty(this)" value="-">
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 col-lg-5">
                                <label for="tgl_kontrol">Tanggal Kontrol</label>
                                <div class="input-group">
                                <input class="form-control filterTangal" name="tgl_kontrol" id="tgl_kontrol"
                                       onfocus="removeZero(this)" onblur="isEmpty(this)">
                                <input name="jam_kontrol" id="jam_kontrol" type="hidden" value="{{date('H:i:s')}}">
                                </div>
                            </div>

                        </div>
                        <div class="row gy-2">
                            <div class="mb-2 col-sm-12 col-md-12 col-lg-12">
                                <label for="obat_pulang">Obat Pulang <a href="javascript:void(0)" id="srcObatPulang"
                                                                        class="badge text-bg-primary"
                                                                        onclick="listRiwayatPemeriksaan('2024/01/07/000515', 'obatpulang')"><i
                                            class="ti ti-search"></i></a></label>
                                <textarea class="form-control" name="obat_pulang" id="obat_pulang" cols="30" rows="5"
                                          onfocus="removeZero(this)" onblur="isEmpty(this)">-</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
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
    let formResumeMedis = $('#formResumeMedis');

    function resumeMedis(no_rawat) {
        modalResumeMedis.modal('show');
        getRegDetail(no_rawat).done((response)=>{
            console.log(response)

            formResumeMedis.find('input[name="no_rawat"]').val(response.no_rawat)
            formResumeMedis.find('input[name="no_rkm_medis"]').val(response.no_rkm_medis)
            formResumeMedis.find('input[name="pasien"]').val(`${response.pasien.nm_pasien} (${response.pasien.jk})`);
            formResumeMedis.find('input[name="tgl_lahir"]').val(`${formatTanggal(response.pasien.tgl_lahir)} (${response.umurdaftar} ${response.sttsumur})`);
            formResumeMedis.find('input[name="kd_dokter"]').val(response.kd_dokter);
            formResumeMedis.find('input[name="dokter"]').val(response.dokter.nm_dokter);
            formResumeMedis.find('input[name="kd_kamar"]').val(response.kamar_inap.kd_kamar);
            formResumeMedis.find('input[name="kamar"]').val(response.kamar_inap.kamar.bangsal.nm_bangsal);
            formResumeMedis.find('input[name="tgl_masuk"]').val(`${formatTanggal(response.kamar_inap.tgl_masuk)} ${response.kamar_inap.jam_masuk} `);
            formResumeMedis.find('input[name="tgl_keluar"]').val(`${response.kamar_inap.tgl_keluar != '0000-00-00' ? `${formatTanggal(response.kamar_inap.tgl_keluar)} ${response.kamar_inap.jam_keluar}` : '-'}`);
            formResumeMedis.find('input[name="diagnosa_awal"]').val(response.kamar_inap.diagnosa_awal);

        })
    }

    function setResponseToForm(response, formId, ...element) {
            element.forEach((el, index)=>{
                Object.keys(response).map((key, index) => {
                    const findElement = formId.find(`${el}[name="${key}"]`)
                    findElement.val(response[`${key}`]);
                });
            })
    }

    function getDiagnosaRanap(params){
        $.get(`${url}/penyakit/get`).done((response)=>{
            console.log(response);
        })
    }

    modalResumeMedis.on('shown.bs.modal', ()=>{
        selectPenyakit($('#diagnosa_sekunder'), formResumeMedis).on('select2:select', (e)=>{
            const data = e.params.data.id === e.params.data.text ? '-' : e.params.data.text.split('-')[0];
            $('#kd_diagnosa_sekunder').val(data)
            console.log(data)
        });
    })
</script>
@endpush
