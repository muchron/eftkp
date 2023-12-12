<div class="modal modal-blur fade" id="modalKunjunganPcare" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Lengkapi Data Kunjungan Pcare</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="">
                <form id="formKunjunganPcare">
                    <fieldset class="form-fieldset">
                        <div class="row gy-2">
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                                <label for="form-label">No. Peserta BPJS</label>
                                <input type="text" class="form-control" name="no_peserta" id="no_peserta">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                                <label class="form-label">No. Rawat</label>
                                <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="no_rawat" readonly>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <label class="form-label">Pasien</label>
                                <div class="input-group mb-2">
                                    <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="no_rkm_medis" readonly>
                                    <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control w-50" name="nm_pasien" readonly>

                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                                <label class="form-label">Poli Tujuan</label>
                                <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="nm_poli_pcare" readonly>
                                <input type="hidden" name="kd_poli_pcare">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                                <label for="form-label">Tanggal Daftar</label>
                                <input type="text" class="form-control" name="tgl_daftar" id="tgl_daftar">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <label class="form-label">Keluhan</label>
                                <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" type="text" class="form-control" name="keluhan">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <label for="form-label">Jenis Kunjungan</label>
                                <div class="mt-2">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kunjSakit" checked="">
                                        <span class="form-check-label">Kunjungan Sakit</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kunjSakit">
                                        <span class="form-check-label">Kunjungan Sehat</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                                <label for="form-label">TKP</label>
                                <div class="mt-2">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kdTkp" value="10" checked="">
                                        <span class="form-check-label">Rawat Jalan</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kdTkp" value="20">
                                        <span class="form-check-label">Rawat Inap</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kdTkp" value="20">
                                        <span class="form-check-label">Promotif Preventif</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Tensi</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tensi">
                                        <span class="input-group-text">
                                            mmHg
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Suhu</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="suhu_tubuh">
                                        <span class="input-group-text">
                                            °C
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Tinggi</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="tinggi">
                                        <span class="input-group-text">
                                            cm
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Berat</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="berat">
                                        <span class="input-group-text">
                                            Kg
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Respirasi</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="respirasi">
                                        <span class="input-group-text">
                                            x/mnt
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Nadi (/mnt)</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="nadi">
                                        <span class="input-group-text">
                                            x/mnt
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-3 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Heart Rate</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="heartRate" value="0">
                                        <span class="input-group-text">
                                            dpm
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12">
                                <div class="mb-1">
                                    <label class="form-label">Lingkar Perut</label>
                                    <div class="input-group input-group-flat">
                                        <input autocomplete="off" onfocus="return removeZero(this)" onblur="isEmpty(this)" onkeypress="return hanyaAngka(this)" type="text" class="form-control text-end" name="lingkar_perut">
                                        <span class="input-group-text">
                                            cm
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-fieldset">
                        <div class="row gy-2">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="row gy-2">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                        <label class="form-label">Tgl Kunjungan</label>
                                        <input class="form-control filterTangal" placeholder="Select a date" id="tglKunjungan" name="tglKunjungan" value="{{ date('d-m-Y') }}">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                        <label class="form-label">Tgl Pulang</label>
                                        <input class="form-control filterTangal" placeholder="Select a date" id="tglPulang" name="tglPulang" value="{{ date('d-m-Y') }}">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                        <label class="form-label">Kesadaran</label>
                                        <select class="form-select" name="kesadaran">
                                            <option value="01">Compos Mentis</option>
                                            <option value="02">Somnolence</option>
                                            <option value="03">Sopor</option>
                                            <option value="04">Coma</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Terapi</label>
                                        <input autocomplete="off" type="text" class="form-control" name="instruksi">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <label class="form-label">Status Pulang</label>
                                        <select class="form-select" name="sttsPulang">
                                            <option value="0">Sembuh</option>
                                            <option value="1">Meninggal</option>
                                            <option value="2">Pulang Paksa</option>
                                            <option value="4">Rujuk Vertikal</option>
                                            <option value="6">Rujuk Horizontal</option>
                                            <option value="9">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="row gy-2">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Dokter</label>
                                        <div class="input-group">
                                            <input autocomplete="off" type="text" class="form-control" name="kd_dokter_pcare" readonly="">
                                            <input autocomplete="off" type="text" class="form-control w-50" name="nm_dokter" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Diagnosa 1</label>
                                        <div class="input-group">
                                            <input autocomplete="off" type="text" class="form-control" name="kdDiagnosa1" readonly="">
                                            <input autocomplete="off" type="text" class="form-control w-75" name="diagnosa1" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Diagnosa 2</label>
                                        <div class="input-group">
                                            <input autocomplete="off" type="text" class="form-control" name="kdDiagnosa2" readonly="">
                                            <input autocomplete="off" type="text" class="form-control w-75" name="diagnosa2" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="form-label">Diagnosa 3</label>
                                        <div class="input-group">
                                            <input autocomplete="off" type="text" class="form-control" name="kdDiagnosa3" readonly="">
                                            <input autocomplete="off" type="text" class="form-control w-75" name="diagnosa3" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                    <fieldset class="form-fieldset">
                        <div class="row gy-2" id="formRujukanLanjut">
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                                <label class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="rujukanLanjut" id="rujukanLanjut">
                                    <span class="form-check-label">Rujukan Lanjut</span>
                                </label>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                <label class="form-label" for="tglEstRujukan">Tgl. Estimasi Rujukan</label>
                                <input class="form-control filterTangal" placeholder="Select a date" id="tglEstRujukan" name="tglEstRujukan" value="{{ date('d-m-Y') }}">
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                                <label class="form-label" for="ppkRujukan">PPK Rujukan</label>
                                <div class="input-group">
                                    <input class="form-control" id="kdPpkRujukan" name="kdPpkRujukan" value="">
                                    <input class="form-control w-50" id="ppkRujukan" name="ppkRujukan" value="">
                                    <button class="btn btn-outline-secondary" type="button" id="btnPpkRujukan"><i class="ti ti-search"></i></button>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="row gy-2" id="formRujukanSpesialis">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisRujukan" id="rujukanSpesialis" data-target="formRujukanSpesialis">
                                            <span class="form-check-label">Spesialis/Subspesialis</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="subSpesialis" name="subSpesialis" readonly>
                                            <input type="text" class="form-control" id="spesialis" name="spesialis" readonly>
                                            <button class="btn btn-outline-secondary" type="button" id="btnSubSpesialis" onclick="renderReferensiSpesialis()"><i class="ti ti-search"></i></button>
                                        </div>
                                        <input type="hidden" id="kdSpesialis" name="kdSpesialis">
                                        <input type="hidden" id="kdSubSpesialis" name="kdSubSpesialis">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-label">
                                            Sarana
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kdSarana" name="kdSarana">
                                            <input type="text" class="form-control w-50" id="sarana" name="sarana">
                                            <button class="btn btn-outline-secondary" type="button" id="btnSarana"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="row gy-2" id="formRujukanKhusus">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisRujukan" id="rujukanKhusus" data-target="formRujukanKhusus">
                                            <span class="form-check-label">Khusus</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kdKhusus" name="kdKhusus">
                                            <input type="text" class="form-control w-50" id="khusus" name="khusus">
                                            <button class="btn btn-outline-secondary" type="button" id="btnKhusus"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-label">
                                            Subspesialis
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kdKhususSub" name="kdKhususSub">
                                            <input type="text" class="form-control w-50" id="khususSub" name="khususSub">
                                            <button class="btn btn-outline-secondary" type="button" id="btnKhususSub"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-label">
                                            Catatan
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="caratanKhusus" name="caratanKhusus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="row gy-2" id="formRujukanInternal">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="jenisRujukan" id="rujukanInternal" data-target="formRujukanInternal">
                                            <span class="form-check-label">Internal</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kdInternal" name="kdInternal">
                                            <input type="text" class="form-control w-50" id="internal" name="internal">
                                            <button class="btn btn-outline-secondary" type="button" id="btnInternal"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-label">
                                            TACC
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kdTacc" name="kdTacc" readonly>
                                            <input type="text" class="form-control w-50" id="nmTacc" name="nmTacc" readonly>
                                            <button class="btn btn-outline-secondary" type="button" id="btnInternal"><i class="ti ti-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="form-label">
                                            Alasan TACC
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="alasanTacc" name="alasanTacc" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="ti ti-device-floppy"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        var formKunjunganPcare = $('#formKunjunganPcare')
        var formRujukanLanjut = $('#formRujukanLanjut')
        var formRujukanSpesialis = $('#formRujukanSpesialis')
        var formRujukanInternal = $('#formRujukanInternal')
        var formRujukanKhusus = $('#formRujukanKhusus')
        $('#modalKunjunganPcare').on('shown.bs.modal', () => {
            formRujukanKhusus.find(['input', 'button']).prop('disabled', 'disabled')
            formRujukanLanjut.find('input').prop('disabled', 'disabled')
            formRujukanLanjut.find('button').prop('disabled', 'disabled')
            formRujukanLanjut.find('#rujukanLanjut').prop('disabled', false)
        })

        function showModalKunjunganPcare(data) {
            Object.keys(data).map((key, index) => {
                input = $(`#formKunjunganPcare input[name=${key}]`);
                select = $(`#formKunjunganPcare select[name=${key}]`);
                if (input.length) {
                    if (key == 'nm_pasien') {
                        data[key] = data[key].split(' / ')[0]
                    }
                    input.val(data[key])
                }
                if (select.length) {
                    select.find(`option:contains("${data[key]}")`).attr('selected', 'selected')
                }
            })

            getDiagnosaPasien(data.no_rawat).done((response) => {
                console.log('DIAGNOSA ===', response);
                response.map((diagnosa) => {
                    console.log(`kdDiagnosa${diagnosa.prioritas}`);
                    formKunjunganPcare.find(`input[name=kdDiagnosa${diagnosa.prioritas}]`).val(diagnosa.kd_penyakit)
                    formKunjunganPcare.find(`input[name=diagnosa${diagnosa.prioritas}]`).val(diagnosa.penyakit.nm_penyakit)
                })
            })

            $('#modalKunjunganPcare').modal('show')
        }
        $('#rujukanLanjut').on('change', (e) => {
            const btnRujukan = $('#rujukanLanjut')
            const isChecked = btnRujukan.is(':checked');
            // const checkbox = $('#formRujukanLanjut').find('input[type=checkbox]')
            const button = $('#formRujukanLanjut').find('button')
            const radio = formRujukanLanjut.find('input[type=radio]').removeAttr('disabled')
            if (!isChecked) {
                $('#formRujukanLanjut').find('input').prop('disabled', 'disabled')
                btnRujukan.removeAttr('disabled')
                radio.each((index, prop) => {
                    const target = $(`#${prop.id}`).data('target');
                    button.prop('disabled', 'disabled')
                    switchForm(prop.id, target, ['input', 'button'])
                })
            } else {
                $('#formRujukanLanjut').find('input').removeAttr('disabled')
                button.removeAttr('disabled', 'disabled')
                radio.each((index, prop) => {
                    const target = $(`#${prop.id}`).data('target');
                    switchForm(prop.id, target, ['input', 'button'])
                })
            }
        })

        $('#rujukanSpesialis').on('change', (e) => {
            switchForm('rujukanSpesialis', 'formRujukanSpesialis', ['input', 'button'])
            formRujukanKhusus.find('input').attr('disabled', 'disabled')
            formRujukanKhusus.find('input[type=radio]').removeAttr('disabled')
            formRujukanKhusus.find('button').attr('disabled', 'disabled')
            formRujukanInternal.find('input').attr('disabled', 'disabled')
            formRujukanInternal.find('input[type=radio]').removeAttr('disabled')
            formRujukanInternal.find('button').attr('disabled', 'disabled')
        })
        $('#rujukanKhusus').on('change', (e) => {
            switchForm('rujukanKhusus', 'formRujukanKhusus', ['input', 'button'])
            formRujukanInternal.find('input').attr('disabled', 'disabled')
            formRujukanInternal.find('input[type=radio]').removeAttr('disabled')
            formRujukanInternal.find('button').attr('disabled', 'disabled')
            formRujukanSpesialis.find('input').attr('disabled', 'disabled')
            formRujukanSpesialis.find('input[type=radio]').removeAttr('disabled')
            formRujukanSpesialis.find('button').attr('disabled', 'disabled')
        })
        $('#rujukanInternal').on('change', (e) => {
            switchForm('rujukanInternal', 'formRujukanInternal', ['input', 'button'])
            formRujukanSpesialis.find('input').attr('disabled', 'disabled')
            formRujukanSpesialis.find('input[type=radio]').removeAttr('disabled')
            formRujukanSpesialis.find('button').attr('disabled', 'disabled')
            formRujukanKhusus.find('input').attr('disabled', 'disabled')
            formRujukanKhusus.find('input[type=radio]').removeAttr('disabled')
            formRujukanKhusus.find('button').attr('disabled', 'disabled')

        })

        function switchForm(trigger, id, element = []) {
            const btnTrigger = $(`#${trigger}`)
            const isChecked = btnTrigger.is(':checked');

            if (!isChecked) {
                element.forEach((el) => {
                    $(`#${id}`).find(el).prop('disabled', 'disabled')
                    btnTrigger.removeAttr('disabled')
                })
            } else {
                element.forEach((el) => {
                    $(`#${id}`).find(el).removeAttr('disabled')
                })
            }
        }
        $('#btnPpkRujukan').on('click', (e) => {
            e.preventDefault();
            renderReferensiSpesialis()
        })
    </script>
@endpush
