<div class="modal modal-blur fade" id="modalUploadPenunjang" tabindex="-1" aria-modal="false" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content rounded-3">
            <div class="modal-header">
                <h1 class="modal-title">Upload Berkas</h1>
            </div>
            <div class="modal-body">
                <form class="dropzone dz-clickable" id="formUploadPenunjang" action="./upload" autocomplete="off" novalidate="">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" />
                        <input name="no_rawat" type="hidden" />
                    </div>
                    <div class="dz-message">
                        <h3 class="dropzone-msg-title">Your text here</h3>
                        <span class="dropzone-msg-desc">Your custom description here</span>
                    </div>
                </form>
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

        function modalUploadPenunjang(no_rawat) {
            modalUpload.modal('show');
        }

        function submitFile() {
            testDropdown.processQueue();
        }
    </script>
@endpush
