// AJAX
function getRegPeriksa(startDate = '', endDate = '') {
    const registrasi = $.get('registrasi/get', {
        startDate: startDate,
        endDate: endDate
    })
    return registrasi;
}

// AJAX
function formatTanggal(tanggal) {
    tgl = tanggal.split(' ')[0]
    let t = new Date(tgl);
    let bulan = '';
    switch ((t.getMonth() + 1)) {
        case 1:
            bulan = "Januari";
            break;
        case 2:
            bulan = "Februari";
            break;
        case 3:
            bulan = "Maret";
            break;
        case 4:
            bulan = "April";
            break;
        case 5:
            bulan = "Mei";
            break;
        case 6:
            bulan = "Juni";
            break;
        case 7:
            bulan = "Juli";
            break;
        case 8:
            bulan = "Agustus";
            break;
        case 9:
            bulan = "September";
            break;
        case 10:
            bulan = "Oktober";
            break;
        case 11:
            bulan = "November";
            break;
        case 12:
            bulan = "Desember";
            break;
        default:
            break;
    }
    return `${t.getDate()} ${bulan} ${t.getFullYear()}${tanggal.split(' ')[1] ? tanggal.split(' ')[1] : ''}`;
}
// HITUNG UMUR
function hitungUmur(tgl_lahir) {
    sekarang = new Date();
    hari = new Date(sekarang.getFullYear(), sekarang.getMonth(), sekarang.getDate());

    var tahunSekarang = sekarang.getFullYear();
    var bulanSekarang = sekarang.getMonth();
    var tanggalSekarang = sekarang.getDate();

    splitTgl = tgl_lahir.split('-');
    lahir = new Date(splitTgl[0], splitTgl[1] - 1, splitTgl[2]);


    tahunLahir = lahir.getFullYear();
    bulanLahir = lahir.getMonth();
    tanggalLahir = lahir.getDate();

    umurTahun = tahunSekarang - tahunLahir;
    if (bulanSekarang >= bulanLahir) {
        umurBulan = bulanSekarang - bulanLahir;
    } else {
        umurTahun--;
        umurBulan = 12 + bulanSekarang - bulanLahir;
    }

    if (tanggalSekarang >= tanggalLahir) {
        umurTanggal = tanggalSekarang - tanggalLahir;
    } else {
        umurBulan--;
        if (bulanSekarang == '1') {
            if (bulanSekarang % 4 == 0) {
                jmlHari = 29;
            } else {
                jmlHari = 28;
            }
        } else if (bulanSekarang == '0' && bulanSekarang == '2' && bulanSekarang == '4' && bulanSekarang == '6' &&
            bulanSekarang == '8' && bulanSekarang == '9') {
            jmlHari = 31;
        } else {
            jmlHari = 30;
        }
        umurTanggal = jmlHari + tanggalSekarang - tanggalLahir;
    }

    return umurTahun + ';' + umurBulan + ';' + umurTanggal;
}

function getDataForm(form, element, except = []) {
    let data = {};

    // cek apakah element array atau text
    const isArray = Array.isArray(element);

    // form data
    if (isArray) {
        // ambil dari element
        for (let index = 0; index < element.length; index++) {
            const e = element[index];
            $(`#${form} ${e}`).each((index, el) => {
                keys = $(el).prop('name');
                data[keys] = $(el).val();
            })
        }

    } else {
        // ambil dari satu jenis element
        $(`#${form} ${element}`).each((index, el) => {
            keys = $(el).prop('name');
            data[keys] = $(el).val();
        })
    }


    // remove items on array data
    for (let i = 0; i < except.length; i++) {
        cek = data.hasOwnProperty(except[i])
        if (cek) {
            delete data[except[i]]
        }
    }

    return data;
}
function stringPemeriksaan(value) {
    if (value) {
        const arrValue = value.split('\n');
        let string = '';
        for (let index = 0; index < arrValue.length; index++) {
            string += `${arrValue[index]} <br/>`;
        }
        return string

    }
    return '';
}

function removeZero(input) {
    if (input.value == '-' || input.value == '0') {
        $(input).val('');
    }
}

function isEmpty(input) {
    if (input.value == '') {
        $(input).val('-');
    }
}

function isEmptyNumber(input) {
    if (input.value == '') {
        $(input).val('0');
    }
}

function hanyaAngka(evt) {
    console.log(charCode);
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function splitTanggal(tanggal) {
    let arrTgl = tanggal.split('-');
    let txtTanggal = arrTgl[2] + '-' + arrTgl[1] + '-' + arrTgl[0];
    return txtTanggal;
}

// ALERT
function alertSuccessAjax(message) {
    return Swal.fire({
        title: 'Berhasil',
        html: message,
        showConfirmButton: false,
        icon: 'success',
        timer: 1200,
    })

}

function alertErrorAjax(request) {
    const errorMsg = request.responseJSON ? request.responseJSON[2] : '';
    Swal.fire(
        'Gagal',
        'Terjadi kesalahan<br>  Error Code : ' + request.status + ', ' + request.statusText + '<br/> <p class="text-danger" p-0>' + errorMsg + '</span>',
        'error'
    );
}

function alertSuccessAjax(message) {
    return Swal.fire({
        title: 'Berhasil',
        text: message,
        showConfirmButton: false,
        icon: 'success',
        timer: 1200,
    })

}

function alertSessionExpired(requestStatus) {
    if (requestStatus == 401) {
        Swal.fire({
            title: 'Sesi login berakhir !',
            icon: 'info',
            text: 'Silahkan login kembali ',
            showConfirmButton: true,
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/erm';
            }
        })
    }
}

function loadingAjax() {
    const loading = Swal.fire({
        title: "Mohon tunggu!",
        html: "Sedang mengambil data",
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        },

    });

    return loading;
}
function toast(message = '', type = '') {
    const textMessage = message ? message : 'Berhasil'
    const typeIcon = type ? type : 'success'
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    });
    Toast.fire({
        icon: typeIcon,
        title: `${textMessage}`,
    });
}

function dateDiff(date1, date2) {
    const parseDate1 = new Date(date1)
    const parseDate2 = new Date(date2)
    const diff = parseDate1.getTime() - parseDate2.getTime();
    const dateDiffs = diff / (1000 * 60 * 60 * 24)
    return dateDiffs.toFixed(1);
}

function getSukuBangsa(suku) {
    return bangsa = $.get('../suku', {
        suku: suku,
    });
}

function selectSukuBangsa(element, parrent, initVal = '-') {
    const select2 = element.select2({
        dropdownParent: parrent,
        delay: 0,
        tags: true,
        scrollAfterSelect: true,
        ajax: {
            url: '../suku',
            dataType: 'JSON',

            data: (params) => {
                const query = {
                    suku: params.term
                }
                return query
            },
            processResults: (data) => {
                return {
                    results: data.map((item) => {
                        const items = {
                            id: item.id,
                            text: `${item.nama_suku_bangsa}`,
                            detail: item
                        }
                        return items;
                    })
                }
            }

        },
        cache: true

    });
    getSukuBangsa(initVal).done((response) => {
        response.map((sk) => {
            const option = new Option(sk.nama_suku_bangsa, sk.id, true, true);
            element.append(option).trigger('change');
        })
    })
    return select2;
}

function getBahasa(bahasa) {
    return bahasa = $.get('../bahasa', {
        bahasa: bahasa,
    });
}

function selectBahasaPasien(element, parrent, initVal = '-') {
    const select2 = element.select2({
        dropdownParent: parrent,
        delay: 0,
        tags: true,
        scrollAfterSelect: true,
        ajax: {
            url: '../bahasa',
            dataType: 'JSON',

            data: (params) => {
                const query = {
                    bahasa: params.term
                }
                return query
            },
            processResults: (data) => {
                return {
                    results: data.map((item) => {
                        const items = {
                            id: item.id,
                            text: `${item.nama_bahasa}`,
                            detail: item
                        }
                        return items;
                    })
                }
            },
        },
        cache: true,
    });

    getBahasa(initVal).done((response) => {
        response.map((bhs) => {
            const option = new Option(bhs.nama_bahasa, bhs.id, true, true);
            element.append(option).trigger('change');
        })
    })
    return select2;
}
function getCacatFisik(cacat) {
    return cacat = $.get('../cacat', {
        cacat: cacat,
    });
}

function selectCacatFisik(element, parrent, initVal = '-') {
    const select2 = element.select2({
        dropdownParent: parrent,
        delay: 0,
        tags: true,
        scrollAfterSelect: true,
        ajax: {
            url: '../cacat',
            dataType: 'JSON',

            data: (params) => {
                const query = {
                    cacat: params.term
                }
                return query
            },
            processResults: (data) => {
                return {
                    results: data.map((item) => {
                        const items = {
                            id: item.id,
                            text: item.nama_cacat,
                            detail: item
                        }
                        return items;
                    })
                }
            },
        },
        cache: true,
    });

    getCacatFisik(initVal).done((response) => {
        response.map((cct) => {
            const option = new Option(cct.nama_cacat, cct.id, true, true);
            element.append(option).trigger('change');
        })
    })
    return select2;
}
function selectPenjab(element, parrent) {
    const select2 = element.select2({
        dropdownParent: parrent,
        delay: 0,
        tags: true,
        scrollAfterSelect: true,
        ajax: {
            url: '../penjab',
            dataType: 'JSON',

            data: (params) => {
                const query = {
                    penjab: params.term
                }
                return query
            },
            processResults: (data) => {
                return {
                    results: data.map((item) => {
                        const items = {
                            id: item.kd_pj,
                            text: `${item.kd_pj} - ${item.png_jawab}`,
                            detail: item
                        }
                        return items;
                    })
                }
            },
        },
        cache: true,
    });

    // const option = new Option('-', '-', true, true);
    // element.append(option).trigger('change');
    return select2;
}