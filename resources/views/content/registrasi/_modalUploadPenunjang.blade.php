<div class="modal modal-blur fade" id="modalUploadPenunjang" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h1 class="modal-title">Upload Berkas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="kategori">Kategori Berkas : </label>
                <select class="form-select form-select-2" name="kategori" id="kategori" style="width: 25%" data-dropdown-parent="#modalUploadPenunjang"></select>
                <form class="mt-3 dropzone dz-clickable" id="formUploadPenunjang" action="./upload" autocomplete="off" novalidate="">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" />
                        <input name="no_rawat" type="hidden" />
                    </div>
                    <div class="dz-message">
                        <h3 class="dropzone-msg-title">Letakkan/Tarik berkas disini</h3>
                        <span class="dropzone-msg-desc">Hanya menerima berkas dengan format *.pdf/*.jpg/*.png</span>
                    </div>
                </form>
                <div class="mt-2 row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="card card-sm" title="">
                            <a href="#" class="d-block"><img src="{{ asset('public/static/tracks/ff2381a011d29cefb3804436ed29f60b4faa63d6.jpg') }}" class="card-img-top"></a>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-danger btn-sm w-100"><i class="ti ti-trash me-2"></i>Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="submitFile()"> Kirim</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/dropzone/dist/dropzone-min.js"></script>
    <script>
        const modalUpload = $('#modalUploadPenunjang')
        const kategori = modalUpload.find('#kategori')
        Dropzone.autoDiscover = false;
        let formUploadPenunjang = new Dropzone("#formUploadPenunjang", {
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            acceptedFiles: '.jpeg, .jpg, .png, .gif',
            thumbnailWidth: 900,
            thumbnailHeight: 600,
            parallelUploads: 10,
        })
        modalUpload.on('shown.bs.modal', () => {
            kategori.select2({
                delay: 2,
                scrollAfterSelect: true,
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
        })

        function modalUploadPenunjang(no_rawat) {
            modalUpload.modal('show');
        }

        function submitFile() {
            testDropdown.processQueue();
        }
    </script>
@endpush
