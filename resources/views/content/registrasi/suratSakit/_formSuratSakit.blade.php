<form action="" id="formSuratSakit">
    <fieldset class="form-fieldset p-3">
        <div class="row gy-2">
            <div class="col-xl-2 col-md-6 col-sm-12">
                <label for="no_surat">Nomor Surat</label>
                <input type="text" class="form-control" name="no_surat" id="no_surat" readonly />
            </div>
            <div class="col-xl-2 col-md-6 col-sm-12">
                <label for="no_rawat">No Rawat</label>
                <input type="text" class="form-control" name="no_rawat" id="no_rawat" readonly />
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <label for="pasien">Pasien</label>
                <input type="text" class="form-control" name="pasien" id="pasien" readonly />
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <label for="pasien">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" readonly />
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <label for="diagnosa">Diagnosa</label>
                <input type="text" class="form-control" name="diagnosa" id="diagnosa" readonly />
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <label for="tanggalawal">Tanggal</label>
                <div class="input-group">
                    <input class="form-control filterTangal" name="tanggalawal" id="tanggalawal" value="{{ date('d-m-Y') }}" />
                    <span class="input-group-text">
                        <label for="">s/d</label>
                    </span>
                    <input class="form-control filterTangal" name="tanggalakhir" id="tanggalakhir" value="{{ date('d-m-Y') }}" />
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-sm-12">
                <label for="lama">Lama Sakit</label>
                <div class="input-group">
                    <input type="text" class="form-control text-end" name="lama" id="lama" readonly />
                    <span class="input-group-text">
                        <label for="">Hari</label>
                    </span>
                </div>
            </div>
        </div>
    </fieldset>
</form>
@push('script')
    <script>
        function setLamaSakit(start, end) {
            const date = dateDiff(splitTanggal(end), splitTanggal(start));
            const lama = parseInt(date) + 1
            return lama;
        }

        function setNoSuratSakit(tgl_surat = '') {
            const noSakit = $.get(`${url}/surat/sakit/setnomor`, {
                tgl_surat: tgl_surat,
            })
            return noSakit
        }

        $('#btnSimpanSuratSakit').on('click', (e) => {
            e.preventDefault
            const data = getDataForm('formSuratSakit', 'input');
            $.post(`${url}/surat/sakit`, data).done((response) => {
                alertSuccessAjax().then(() => {
                    const pertama = formFilterSakit.find('input[name=tgl_pertama]').val()
                    const kedua = formFilterSakit.find('input[name=tgl_kedua]').val()
                    loadSuratSakit(pertama, kedua)
                })
            }).fail((error) => {
                alertErrorAjax(error)
            })
        })
    </script>
@endpush
