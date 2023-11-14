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