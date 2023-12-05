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
    var charCode = (evt.which) ? evt.which : event.keyCode
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
        text: message,
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