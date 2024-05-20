<div class="modal modal-blur fade" id="modalUploadPenunjang" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h1 class="modal-title">Upload Berkas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <label for="kategori">Kategori Berkas : </label>
                        <select class="form-select form-select-2" name="kategori" id="kategori" style="width: 100%" data-dropdown-parent="#modalUploadPenunjang"></select>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12">
                        <label for="no_rawat" class="form-label">No. Rawat</label>
                        <input name="no_rawat" type="text" class="form-control" />
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <label for="no_rawat" class="form-label">Pasien</label>
                        <input name="nm_pasien" type="text" class="form-control" />
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control" />
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12">
                        <label for="poliklinik" class="form-label">Poliklinik</label>
                        <input name="poliklinik" type="text" class="form-control" />
                    </div>
                </div>
                <form class="mt-3 dropzone dz-clickable" id="formUploadPenunjang" action="./upload" autocomplete="off" novalidate="">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" />
                    </div>
                    <div class="dz-message">
                        <h3 class="dropzone-msg-title">Letakkan/Tarik berkas disini</h3>
                        <span class="dropzone-msg-desc">Hanya menerima berkas dengan format *.pdf/*.jpg/*.png</span>
                    </div>
                </form>
                <div class="mt-2 row gy-2" id="containerBerkas">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="ti ti-x me-2"></i>Keluar</button>
                <button type="button" class="btn btn-success" onclick="submitFile()"> <i class="ti ti-device-floppy me-2"></i>Kirim</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

    <link rel="stylesheet" href="{{ asset('public/css/magnify/jquery.magnify.css') }}">
    <script src="{{ asset('public/js/magnify/jquery.magnify.min.js') }}"></script>

    <script>
        const modalUpload = $('#modalUploadPenunjang')
        const kategori = modalUpload.find('#kategori')
        const containerBerkas = $('#containerBerkas')
        // const formUploadPenunjang = modalUpload.find('#formUploadPenunjang')

        Dropzone.autoDiscover = false;
        let formUploadPenunjang = new Dropzone("#formUploadPenunjang", {
            url: `${url}/upload`,
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            acceptedFiles: '.jpeg, .jpg, .png, .gif, .pdf',
            thumbnailWidth: 900,
            thumbnailHeight: 600,
            parallelUploads: 10,
            init: function() {
                // if (kategori.val()) {const
                this.on(`sendingmultiple`, (data, xhr, formData) => {
                    formData.append('kategori', kategori.val());
                    formData.append('no_rawat', modalUpload.find('input[name=no_rawat]').val());
                }).on('complete', function(file) {
                    if (file.status === 'success') {
                        alertSuccessAjax('Berhasil Upload Berkas').then(() => {
                            this.removeFile(file);
                            rendercontainerBerkas(modalUpload.find('input[name=no_rawat]').val())
                        })
                    }
                    // console.log('RESPONSE', file.status);
                }).on('error', function(file, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Upload Berkas',
                        text: error
                    }).then(() => {
                        formUploadPenunjang.files.forEach((item) => {
                            console.log(item);
                            item.status = Dropzone.QUEUED
                        })
                        // console.log('FILE ===', formUploadPenunjang.files);
                        // console.log('FILE ===', file);
                        // console.log('ERROR ===', error);
                    })
                })
                // }
            }
        })

        modalUpload.on('shown.bs.modal', () => {
            $.get(`${url}/berkas/penunjang/kategori/first`).done((response) => {
                const option = new Option(response.kategori, response.id, true, true);
                kategori.append(option).trigger('change');
            })
        })
        modalUpload.on('hidden.bs.modal', () => {
            containerBerkas.empty();
        })

        function modalUploadPenunjang(no_rawat) {
            modalUpload.modal('show');
            modalUpload.find('input[name=no_rawat]').val(no_rawat);
            rendercontainerBerkas(no_rawat)
            getRegDetail(no_rawat).done((response) => {
                console.log(response)
                const {
                    poliklinik,
                    penjab,
                    pasien
                } = response;
                modalUpload.find('input[name=nm_pasien]').val(pasien.nm_pasien);
                modalUpload.find('input[name=alamat]').val(pasien.alamat);
                modalUpload.find('input[name=poliklinik]').val(poliklinik.nm_poli);
                modalUpload.find('input[name=no_rkm_medis]').val(response.no_rkm_medis);
            })
            kategori.select2({
                delay: 2,
                scrollAfterSelect: true,
                tags: true,
                cache: true,
                ajax: {
                    url: `${url}/berkas/penunjang/kategori`,
                    dataType: 'json',
                    data: (params) => {
                        const query = {
                            kategori: params.term
                        }
                        return query
                    },
                    processResults: (data) => {
                        return {
                            results: data.map((item) => {
                                const items = {
                                    id: item.id,
                                    text: `${item.kategori}`,
                                }
                                return items;
                            })
                        };
                    },
                    cache: true
                }
            })
        }

        function rendercontainerBerkas(no_rawat) {
            $.get(`${url}/upload`, {
                no_rawat: no_rawat
            }).done((response) => {
                containerBerkas.empty();
                const berkas = response.map((item, index) => {
                    const filetype = item.file.split('.').pop()
                    let content = '';
                    if (filetype !== 'pdf') {
                        content = ` <a class="d-block" data-magnify="gallery" data-src="" data-caption="${item.kategori.kategori} ${item.created_at}" data-group="a" href="{{ asset('public/storage/penunjang/images/') }}/${item.file}">
                                            <img style="width: 100%;height: 200px;object-fit:cover" src="{{ asset('public/storage/penunjang/images') }}/${item.file}" class="card-img-top">
                                         </a>`;
                    } else {
                        content = ` <a class="d-block" href="{{ asset('public/storage/penunjang/pdf') }}/${item.file}" target="_blank">
                                            <img style="width: 100%;height: 200px;object-fit:cover" src="{{ asset('public/img/logo-pdf.png') }}" class="card-img-top">
                                         </a>`;
                    }
                    return `<div class="col-sm-6 col-lg-2">
                        <div class="card card-sm" title="">
                            ${content}
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-success btn-sm w-100">${item.kategori.kategori}</button>
                            <button class="btn btn-danger btn-sm w-100" type="button" onclick="deleteBerkas(${item.id})"><i class="ti ti-trash me-2"></i>Hapus</button>
                        </div>
                    </div>`
                })
                containerBerkas.append(berkas);
            })
        }

        function deleteBerkas(id) {

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(`${url}/upload/delete/${id}`).done((response) => {
                        alertSuccessAjax().then(() => {
                            rendercontainerBerkas(modalUpload.find('input[name=no_rawat]').val())
                        })
                    }).fail((error) => {
                        alertErrorAjax()
                    })
                }
            })
        }

        function submitFile() {
            formUploadPenunjang.processQueue();
        }

        kategori.on('select2:select', (e) => {
            $.post(`${url}/berkas/penunjang/kategori`, {
                kategori: e.currentTarget.value
            }).done((response) => {
                if (response.message == 'SUKSES') {
                    const {
                        data
                    } = response;
                    toast();
                    const option = new Option(data.kategori, data.id, true, true);
                    kategori.append(option).trigger('change');
                }
            })

        });
    </script>
@endpush
