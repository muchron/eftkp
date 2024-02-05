<div class="modal modal-blur fade" id="modalPasien" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h5 class="modal-title m-0">Data Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <div class="card border-0">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#pane-form" id="tabs-form" class="nav-link active" data-bs-toggle="tab"><i class="ti ti-user me-2"></i> Form Pasien</a>
                            </li>
                            <li class="nav-item">
                                <a href="#pane-pasien" id="tabs-pasien" class="nav-link" data-bs-toggle="tab"><i class="ti ti-list me-2"></i> Data Pasien</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="pane-form">
                                <h4>Form Input Pasien</h4>
                                <form action="" id="formPasien">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <fieldset class="form-fieldset">
                                                <div class="row gy-1">
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <label class="form-label required">No. Rekam Medis</label>
                                                        <div class="input-group">
                                                            <input type="text" name="no_rkm_medis" id="no_rkm_medis" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" autocomplete="off" value="-" disabled>
                                                            <input type="hidden" name="sttsForm">
                                                            <input type="hidden" name="noUrut">
                                                            <span class="input-group-text">
                                                                <input class="form-check-input m-0" type="checkbox" checked id="checkNoRm" name="checkNoRm" />
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                                        <label class="form-label required">Nama Pasien</label>
                                                        <input type="text" name="nm_pasien" id="nm_pasien" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" autocomplete="off" value="-">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <label class="form-label required">Jenis Kelamin</label>
                                                        <select name="jk" id="jk" class="form-select">
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <label class="form-label required">Golongan Darah</label>
                                                        <select name="gol_darah" id="gol_darah" class="form-select">
                                                            <option value="-" selected>-</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="AO">AO</option>
                                                            <option value="o">O</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <label class="form-label required">Tempat Lahir</label>
                                                        <input type="text" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="tmp_lahir" id="tmp_lahir" autocomplete="off" value="-">
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <label class="form-label required">Tgl Lahir</label>
                                                        <input type="text" class="form-control filterTangal" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="tgl_lahir" id="tgl_lahir" autocomplete="off" value="{{ date('d-m-Y') }}">
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 col-sm-12">
                                                        <label class="form-label">Umur</label>
                                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="umur" id="umur" placeholder="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <label class="form-label">Nama Ibu</label>
                                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="nm_ibu" id="nm_ibu" placeholder="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <label class="form-label">Penanggung Jawab</label>
                                                        <select class="form-select" name="keluarga" id="keluarga">
                                                            <option value="SAUDARA">SAUDARA</option>
                                                            <option value="IBU">IBU</option>
                                                            <option value="ISTRI">ISTRI</option>
                                                            <option value="SUAMI">SUAMI</option>
                                                            <option value="ANAK">ANAK</option>
                                                            <option value="DIRI SENDIRI" selected>DIRI SENDIRI</option>
                                                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <label class="form-label">Nama P.J.</label>
                                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="namakeluarga" id="namakeluarga" placeholder="">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <label class="form-label">Pekerjaan</label>
                                                        <input type="text" value="-" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" name="pekerjaanpj" id="pekerjaanpj" placeholder="">
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <label class="form-label">Suku/Bangsa</label>
                                                        <select class="form-select" name="suku_bangsa" id="suku_bangsa" style="width:100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <label class="form-label">Bahasa</label>
                                                        <select class="form-select" name="bahasa_pasien" id="bahasa_pasien" style="width:100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <label class="form-label">Cacat Fisik</label>
                                                        <select class="form-select" name="cacat_fisik" id="cacat_fisik" style="width:100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <label class="form-label">Agama</label>
                                                        <select class="form-select" name="agama" id="agama" style="width:100%">
                                                            <option value="ISLAM" selected>ISLAM</option>
                                                            <option value="KRISTEN">KRISTEN</option>
                                                            <option value="PROTESTAN">PROTESTAN</option>
                                                            <option value="HINDU">HINDU</option>
                                                            <option value="BUDHA">BUDHA</option>
                                                            <option value="KONGHU CHU">KONGHU CHU</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <label class="form-label">Status Menikah</label>
                                                        <select class="form-select" name="stts_nikah" id="stts_nikah" style="width:100%">
                                                            <option value="BELUM MENIKAH" selected>BELUM MENIKAH</option>
                                                            <option value="MENIKAH">MENIKAH</option>
                                                            <option value="JANDA">JANDA</option>
                                                            <option value="DUDHA">DUDA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <fieldset class="form-fieldset">
                                                <div class="row gy-1">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <label for="kd_pj" class="form-label">Asuransi</label>
                                                        <select name="kd_pj" id="kd_pj" class="form-select" style="width:100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <label for="no_peserta" class="form-label">No Kartu</label>
                                                        <input name="no_peserta" id="no_peserta" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value="-" />
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="no_tlp" class="form-label">No Telp/Hp.</label>
                                                        <input name="no_tlp" id="no_tlp" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value='-' />
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="email" class="form-label">E-Mail</label>
                                                        <input name="email" id="email" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value="-" />
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="pnd" class="form-label">Pendidikan</label>
                                                        <select name="pnd" id="pnd" class="form-select">
                                                            <option value="-" selected>-</option>
                                                            <option value="TK">TK</option>
                                                            <option value="SD">SD</option>
                                                            <option value="SMA">SMA</option>
                                                            <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                                            <option value="D1">D1</option>
                                                            <option value="D2">D2</option>
                                                            <option value="D3">D3</option>
                                                            <option value="D4">D4</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="kd_pj" class="form-label">Pekerjaan</label>
                                                        <input name="pekerjaan" id="pekerjaan" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value='-' />
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="no_ktp" class="form-label">No. KTP/SIM</label>
                                                        <input name="no_ktp" id="no_ktp" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" style="width:100%" value="-" />
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="tgl_daftar" class="form-label">Tgl. Daftar</label>
                                                        <input name="tgl_daftar" id="tgl_daftar" class="form-control filterTanggal" value="{{ date('d-m-Y') }}" />
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input name="alamat" id="alamat" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-" />
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <label for="kd_kel" class="form-label">Kelurahan/Desa</label>
                                                        <select name="kd_kel" id="kd_kel" class="form-select" style="width: 100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="kd_kec" class="form-label">Kecamatan</label>
                                                        <select name="kd_kec" id="kd_kec" class="form-select" style="width: 100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="kd_kab" class="form-label">Kabupaten</label>
                                                        <select name="kd_kab" id="kd_kab" class="form-select" style="width: 100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12">
                                                        <label for="kd_prop" class="form-label">Propinsi</label>
                                                        <select name="kd_prop" id="kd_prop" class="form-select" style="width: 100%">
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                                        <label class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkPj" name="checkPj">
                                                            <span class="form-check-label">Alamat PJ</span>
                                                        </label>
                                                        <input name="alamatpj" id="alamatpj" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-" />
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <label class="form-label" for="perusahaan_pasien">Instansi/Peruhasaan</label>
                                                        <select name="perusahaan_pasien" id="perusahaan_pasien" class="form-select" style="width:100%"></select>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <label class="form-label" for="nip">NIP/NIK</label>
                                                        <input name="nip" id="nip" class="form-control" onfocus="return removeZero(this)" onblur="isEmpty(this)" value="-" />
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="pane-pasien">
                                <div class="table-responsive">
                                    <table class="table table-sm nowrap" id="tbPasien" width="100%"></table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSimpanPasien"><i class="ti ti-device-floppy me-2"></i>Simpan</button>
                <button type="button" class="btn btn-warning" id="btnResetPasien"><i class="ti ti-reload me-2"></i>Baru</button>
            </div>
        </div>
    </div>
</div>
@include('content.registrasi._modalRegistrasiPaisen')
@push('script')
    <script>
        var formPasien = $('#formPasien');
        var modalPasien = $('#modalPasien');
        var sukuBangsa = formPasien.find('select[name=suku_bangsa]');
        var bahasaPasien = formPasien.find('select[name=bahasa_pasien]');
        var cacatFisik = formPasien.find('select[name=cacat_fisik]');
        var penjab = formPasien.find('select[name=kd_pj]');
        var kelurahan = formPasien.find('select[name=kd_kel]');
        var kecamatan = formPasien.find('select[name=kd_kec]');
        var kabupaten = formPasien.find('select[name=kd_kab]');
        var propinsi = formPasien.find('select[name=kd_prop]');
        var perusahaan = formPasien.find('select[name=perusahaan_pasien]');
        var checkPj = formPasien.find('input[id=checkPj]');
        var checkNoRm = formPasien.find('input[id=checkNoRm]');
        var tglLahir = formPasien.find('input[name=tgl_lahir]');
        var url = "{{ url('') }}"
        var periksaPendaftaran = $('#periksaPendaftaran');
        var tabFormPasien = new bootstrap.Tab('#tabs-form');
        var tabTablePasien = new bootstrap.Tab($('#tabs-pasien'));

        modalPasien.on('show.bs.modal', () => {
            tabFormPasien.show()
        })

        function setUmurDaftar(tglLahir) {
            let umurArray = hitungUmur(tglLahir).split(';');
            const umur = umurArray.map((val, index) => {
                if (val > 0) {
                    return {
                        value: val,
                        index: index
                    };
                }
            }).find(element => element !== undefined)
            if (!umur) {
                return '0 Hr';
            } else {
                return `${umur.value} ${umur.index == 0 ? 'Th' : umur.index == 1 ? 'Bl' : 'Hr'}`;
            }
        }

        $('#btnSimpanPasien').on('click', (e) => {
            e.preventDefault;
            const data = getDataForm('formPasien', ['input', 'select']);
            loadingAjax();
            $.post(`${url}/pasien`, data).done((response) => {
                if (response) {
                    alertSuccessAjax('Berhasil').then(() => {
                        renderTbPasien();
                        document.getElementById('formPasien').reset();
                        if (data.checkNoRm) {
                            $.get(`${url}/set/norm`).done((response) => {
                                formPasien.find('input[name=no_rkm_medis]').val(response)
                            })
                        }
                    })
                    resetSelect();
                    if (formPasien.find('input[name=sttsForm]').val() == 'bridging') {
                        regPoliBpjs(data);
                        renderPendaftaranPcare(start = '', length = '')
                    }
                    // modalPasien.modal('hide');
                    tabTablePasien.show();
                }
            }).fail((request) => {
                alertErrorAjax(request)
            })
        })

        function regPoliBpjs(data) {
            $.get(`${url}/bridging/pcare/pendaftaran/nourut/${data.noUrut}`).done((pendaftaran) => {
                if (pendaftaran.metaData.code == 200) {
                    const response = pendaftaran.response;
                    periksaPendaftaran.removeClass('d-none');
                    formRegistrasiPoli.find('input[name=nm_poli_pcare]').val(response.poli.nmPoli)
                    formRegistrasiPoli.find('input[name=bridging]').val('bridging')
                    formRegistrasiPoli.find('input[name=kd_poli_pcare]').val(response.poli.kdPoli)
                    formRegistrasiPoli.find('input[name=tkp]').val(response.tkp.nmTkp == 'RJTP' ? 'RAWAT JALAN' : 'RAWAT INAP')
                    formRegistrasiPoli.find('input[name=kdTkp]').val(response.tkp.kdTkp)
                    formRegistrasiPoli.find('input[name=keluhan]').val(response.keluhan)
                    formRegistrasiPoli.find('input[name=sistole]').val(response.sistole)
                    formRegistrasiPoli.find('input[name=diastole]').val(response.diastole)
                    formRegistrasiPoli.find('input[name=tinggi]').val(response.tinggiBadan)
                    formRegistrasiPoli.find('input[name=berat]').val(response.beratBadan)
                    formRegistrasiPoli.find('input[name=respirasi]').val(response.respRate)
                    formRegistrasiPoli.find('input[name=nadi]').val(response.heartRate)
                    formRegistrasiPoli.find('input[name=lingkar_perut]').val(response.lingkarPerut)
                    formRegistrasiPoli.find('input[name=no_peserta]').val(response.peserta.noKartu)
                    formRegistrasiPoli.find('input[name=no_rkm_medis]').val(data.no_rkm_medis)
                    formRegistrasiPoli.find('input[name=nm_pasien]').val(data.nm_pasien)
                    formRegistrasiPoli.find('input[name=umurdaftar]').val(data.umurdaftar)
                    formRegistrasiPoli.find('input[name=namakeluarga]').val(data.namakeluarga)
                    formRegistrasiPoli.find('input[name=keluarga]').val(data.keluarga)
                    formRegistrasiPoli.find('input[name=alamatpj]').val(data.alamatpj)
                    formRegistrasiPoli.find('input[name=status]').val('Baru')
                    formRegistrasiPoli.find('input[name=noUrut]').val(data.noUrut)
                    formRegistrasiPoli.find('input[name=umurdaftar]').val(setUmurDaftar(splitTanggal(response.peserta.tglLahir)))

                    // SET PENJAB
                    selectPenjab(formRegistrasiPoli.find('select[name=kd_pj]'), modalRegistrasi);
                    const bpjs = new Option(`BPJ - BPJS`, 'BPJ', true, true);
                    formRegistrasiPoli.find('select[name=kd_pj]').append(bpjs).trigger('change');


                    // SET POLIKLINIK
                    $.get(`${url}/mapping/pcare/poliklinik`, {
                        kdPoliPcare: response.poli.kdPoli
                    }).done((resultPoli) => {
                        selectPoliklinik(formRegistrasiPoli.find('select[name=kd_poli]'), modalRegistrasi);
                        const poli = new Option(`${resultPoli.poliklinik.kd_poli} - ${resultPoli.poliklinik.nm_poli}`, `${resultPoli.poliklinik.kd_poli}`, true, true);
                        formRegistrasiPoli.find('select[name=kd_poli]').append(poli).trigger('change');
                        formRegistrasiPoli.find('input[name=kd_poli_pcare]').val(response.poli.kdPoli)
                    })

                    // GET DOKTER
                    $.get(`${url}/bridging/pcare/dokter`).done((respDokter) => {
                        const dokter = respDokter.response.list
                        const kdDokterPcare = dokter.map((dr, index) => {
                            if (index == 0) {
                                return dr.kdDokter;
                            }
                        }).join('')

                        $.get(`${url}/mapping/pcare/dokter`, {
                            kdDokterPcare: kdDokterPcare
                        }).done((resDokter) => {
                            selectDokter(formRegistrasiPoli.find('select[name=kd_dokter]'), modalRegistrasi);
                            const dokter = new Option(`${resDokter.kd_dokter} - ${resDokter.nm_dokter_pcare}`, `${resDokter.kd_dokter}`, true, true);
                            formRegistrasiPoli.find('select[name=kd_dokter]').append(dokter).trigger('change');
                            formRegistrasiPoli.find('input[name=kd_dokter_pcare]').val(kdDokterPcare);
                        })
                    })


                    modalRegistrasi.modal('show')
                    loadingAjax().close();
                }
            })
        }

        tglLahir.on('change', (e) => {
            var tanggal = splitTanggal(e.currentTarget.value);
            const umur = hitungUmur(tanggal)
            const textTglLahir = `${umur.split(';')[0]} Th ${umur.split(';')[1]} Bl ${umur.split(';')[2]} Hr`
            formPasien.find('input[name=umur]').val(textTglLahir)
        })

        function resetSelect() {
            formPasien.find('input[name=checkNoRm]').attr('disabled', false);
            selectSukuBangsa(sukuBangsa, modalPasien, '-');
            selectBahasaPasien(bahasaPasien, modalPasien, 'INDONESIA');
            selectCacatFisik(cacatFisik, modalPasien, 'TIDAK ADA');
            selectPenjab(penjab, modalPasien);

            const noPeserta = formPasien.find('input[name=no_peserta]').val()
            if (noPeserta.length == 13) {
                const bpjs = new Option('BPJ - BPJS', 'BPJS', true, true);
                formPasien.find('select[name=kd_pj]').append(bpjs).trigger('change');
            }
            selectKelurahan(kelurahan, modalPasien);
            selectKecamatan(kecamatan, modalPasien);
            selectKabupaten(kabupaten, modalPasien);
            selectPropinsi(propinsi, modalPasien);
            selectPerusahaan(perusahaan, modalPasien);
        }

        $('#modalPasien').on('shown.bs.modal', (e) => {
            renderTbPasien();
            resetSelect();
            $.get(`${url}/set/norm`).done((response) => {
                formPasien.find('input[name=no_rkm_medis]').val(response)
            })
            const umur = hitungUmur(splitTanggal(tglLahir.val()))
            const textTglLahir = `${umur.split(';')[0]} Th ${umur.split(';')[1]} Bl ${umur.split(';')[2]} Hr`
            formPasien.find('input[name=umur]').val(textTglLahir)
        })

        $('#modalPasien').on('hidden.bs.modal', (e) => {
            resetSelect();
        })

        checkPj.on('change', (e) => {
            const isChecked = $(e.currentTarget).is(':checked');
            let alamatpj = '';
            if (isChecked) {
                const alamatText = formPasien.find(`input[name=alamat]`).val()
                const propText = propinsi.find(`option:selected`).text()
                const kabText = kabupaten.find(`option:selected`).text()
                const kecText = kecamatan.find(`option:selected`).text()
                const kelText = kelurahan.find(`option:selected`).text()
                alamatpj = `${alamatText}, ${kelText}, ${kecText}, ${kabText}, ${propText}`
            } else {
                alamatpj = `-`
            }
            formPasien.find('input[name=alamatpj]').val(alamatpj)

        })
        checkNoRm.on('change', (e) => {
            const isChecked = $(e.currentTarget).is(':checked');
            const noRkmMedis = formPasien.find('input[name=no_rkm_medis]');
            if (isChecked) {
                $.get(`${url}/set/norm`).done((response) => {
                    noRkmMedis.attr('disabled', true);
                    noRkmMedis.val(response)
                })
            } else {
                noRkmMedis.attr('disabled', false);
            }
        })

        sukuBangsa.on('select2:select', (e) => {
            const selectedSuku = e.currentTarget.value;
            $.post(`${url}/suku`, {
                suku: selectedSuku,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(selectedSuku, response.id, true, true);
                    sukuBangsa.append(option).trigger('change');
                }
            })
        });

        bahasaPasien.on('select2:select', (e) => {
            const selectBahasa = e.currentTarget.value;
            $.post(`${url}/bahasa`, {
                bahasa: selectBahasa,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(selectBahasa, response.id, true, true);
                    bahasaPasien.append(option).trigger('change');
                }
            })
        })
        kelurahan.on('select2:select', (e) => {
            const nmKelurahan = e.currentTarget.value.toUpperCase();
            $.post(`${url}/kelurahan`, {
                kelurahan: nmKelurahan,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmKelurahan, response.id, true, true);
                    kelurahan.append(option).trigger('change');
                }
            })
        })
        kecamatan.on('select2:select', (e) => {
            const nmKecamatan = e.currentTarget.value.toUpperCase();
            $.post(`${url}/kecamatan`, {
                kecamatan: nmKecamatan,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmKecamatan, response.id, true, true);
                    kecamatan.append(option).trigger('change');
                }
            })
        })
        kabupaten.on('select2:select', (e) => {
            const nmKabupaten = e.currentTarget.value.toUpperCase();
            $.post(`${url}/kabupaten`, {
                kabupaten: nmKabupaten,
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmKabupaten, response.id, true, true);
                    kabupaten.append(option).trigger('change');
                }
            })
        })
        propinsi.on('select2:select', (e) => {
            const nmPropinsi = e.currentTarget.value.toUpperCase();
            $.post(`${url}/propinsi`, {
                propinsi: nmPropinsi,
            }).done((response) => {
                console.log(response);
                if (response.message == 'SUKSES') {
                    toast();
                    const option = new Option(nmPropinsi, response.id, true, true);
                    propinsi.append(option).trigger('change');
                }
            })
        })

        function renderTbPasien(tglRegistrasi = '') {
            const tbReferensi = new DataTable('#tbPasien', {
                destroy: true,
                stateSave: true,
                serverSide: true,
                processing: true,
                searching: true,
                responsive: true,
                scroller: true,
                fixedHeader: true,
                columnDefs: [{
                        name: "no_rkm_medis",
                        targets: 0
                    },
                    {
                        name: "nm_pasien",
                        targets: 1
                    },
                ],
                ajax: {
                    url: `${url}/pasien`,
                    data: {
                        datatable: true,
                        tglRegistrasi: tglRegistrasi,
                    }
                },

                createdRow: (row, data, index) => {
                    $(row).addClass('rows-pasien');
                    $(row).attr('data-id', data.no_rkm_medis);
                },
                columns: [{
                        title: 'No RM.',
                        data: 'no_rkm_medis',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Nama',
                        data: 'nm_pasien',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'JK',
                        data: 'jk',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Tmp. Lahir',
                        data: 'tmp_lahir',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Tgl. Lahir',
                        data: 'tgl_lahir',
                        render: (data, type, row, meta) => {
                            return splitTanggal(data);
                        }
                    },
                    {
                        title: 'Umur',
                        data: 'umur',
                        render: (data, type, row, meta) => {
                            return data;
                        }
                    },
                    {
                        title: 'Alamat',
                        data: 'alamat',
                        render: (data, type, row, meta) => {
                            return `${data}, ${row.kel.nm_kel}, ${row.kec.nm_kec}`;
                        }

                    },
                    {
                        title: 'Asuransi',
                        data: 'penjab',
                        render: (data, type, row, meta) => {
                            return `${data.png_jawab}`;
                        }

                    },
                    {
                        title: 'No. Peserta',
                        data: 'no_peserta',
                        render: (data, type, row, meta) => {
                            return data;
                        }

                    },
                    {
                        title: '',
                        data: 'no_rkm_medis',
                        render: (data, type, row, meta) => {
                            return `<button class="btn btn-primary btn-sm" onclick="registrasiPoli('${data}')"><i class="ti ti-plus"></i></button>`;
                        }

                    },
                ],
            })
        }

        $('#btnResetPasien').on('click', (e) => {
            resetSelect();
            formPasien.find('input[name=checkNoRm]').attr('disabled', false);
            $('#formPasien').trigger('reset');
            $.get(`${url}/set/norm`).done((response) => {
                formPasien.find('input[name=no_rkm_medis]').val(response)
            })
        })

        function editPasien(no_rkm_medis) {
            $.get(`${url}/pasien`, {
                no_rkm_medis: no_rkm_medis,
            }).done((response) => {
                formPasien.find('input[name=no_rkm_medis]').val(no_rkm_medis);
                formPasien.find('input[name=checkNoRm]').attr('disabled', true);
                formPasien.find('input[name=nm_pasien]').val(response.nm_pasien);
                formPasien.find('select[name=jk]').val(response.jk).change();
                formPasien.find('select[name=gol_darah]').val(response.gol_darah).change();
                formPasien.find('input[name=tmp_lahir]').val(response.tmp_lahir);
                formPasien.find('input[name=tgl_lahir]').val(splitTanggal(response.tgl_lahir));
                formPasien.find('input[name=umur]').val(response.umur);
                formPasien.find('input[name=nm_ibu]').val(response.nm_ibu);
                formPasien.find('select[name=keluarga]').val(response.keluarga);
                formPasien.find('input[name=pekerjaan]').val(response.pekerjaan);
                formPasien.find('input[name=namakeluarga]').val(response.namakeluarga);
                formPasien.find('input[name=pekerjaanpj]').val(response.pekerjaanpj);
                formPasien.find('select[name=agama]').val(response.agama).change();
                formPasien.find('select[name=stts_nikah]').val(response.stts_nikah).change();
                formPasien.find('input[name=no_kartu]').val(response.no_kartu);
                formPasien.find('input[name=no_tlp]').val(response.no_tlp);
                formPasien.find('input[name=email]').val(response.email);
                formPasien.find('select[name=pnd]').val(response.pnd).change();
                formPasien.find('input[name=alamat]').val(response.alamat);
                formPasien.find('input[name=alamatpj]').val(`${response.alamatpj}, ${response.kecamatanpj}, ${response.kabupatenpj}, ${response.propinsipj}`);
                formPasien.find('input[name=nip]').val(response.nip);

                const suku = new Option(`${response.suku_bangsa.nama_suku_bangsa}`, `${response.suku_bangsa.id}`, true, true);
                formPasien.find('select[name=suku_bangsa]').append(suku).trigger('change');

                const bahasa = new Option(`${response.bahasa_pasien.nama_bahasa}`, `${response.bahasa_pasien.id}`, true, true);
                formPasien.find('select[name=bahasa_pasien]').append(bahasa).trigger('change');

                const cacat = new Option(`${response.cacat_fisik.nama_cacat}`, `${response.cacat_fisik.id}`, true, true);
                formPasien.find('select[name=cacat_fisik]').append(cacat).trigger('change');

                const penjab = new Option(`${response.penjab.png_jawab}`, `${response.penjab.kd_pj}`, true, true);
                formPasien.find('select[name=kd_pj]').append(penjab).trigger('change');

                const kel = new Option(`${response.kel.nm_kel}`, `${response.kel.kd_kel}`, true, true);
                kelurahan.append(kel).trigger('change');

                const kec = new Option(`${response.kec.nm_kec}`, `${response.kec.kd_kec}`, true, true);
                kecamatan.append(kec).trigger('change');

                const kab = new Option(`${response.kab.nm_kab}`, `${response.kab.kd_kab}`, true, true);
                kabupaten.append(kab).trigger('change');

                const prop = new Option(`${response.prop.nm_prop}`, `${response.prop.kd_prop}`, true, true);
                propinsi.append(prop).trigger('change');

                const inst = new Option(`${response.perusahaan_pasien.nama_perusahaan}`, `${response.perusahaan_pasien.kode_perusahaan}`, true, true);
                perusahaan.append(inst).trigger('change');


                // formPasien.find('input[name=nm_pasien]').val('');
                console.log(response.alamatpj);
                tabFormPasien.show();
            })
        }
    </script>
@endpush
