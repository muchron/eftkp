@extends('layout')

@section('body')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <i class="ti ti-checklist"></i>
                    </div>
                    <div>
                        <h4 class="alert-title">{{ session('status.title') }}</h4>
                        <div class="text-secondary">{{ session('status.message') }}</div>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <div class="row gy-2">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <form class="card" id="formSettingPcare" name="formSettingPcare" method="post" action="{{ url('setting/pcare') }}">
                    <div class="card-header">
                        <h3 class="card-title">Setting PCARE </h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Cons ID</label>
                            <div class="col">
                                <input type="text" class="form-control" name="consId" placeholder="Cons ID" value="{{ $data ? $data->consId : '' }}">
                                <input type="hidden" name="consIdExisting" value="{{ $data ? $data->consId : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Secret Key</label>
                            <div class="col">
                                <input type="text" class="form-control" name="secretKey" placeholder="Secret Key" value="{{ $data ? $data->secretKey : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">User Key</label>
                            <div class="col">
                                <input type="text" class="form-control" name="userKey" placeholder="User Key" value="{{ $data ? $data->userKey : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Pcare Url</label>
                            <div class="col">
                                <input type="text" class="form-control" name="baseUrl" placeholder="Pcare Url" value="{{ $data ? $data->baseUrl : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Icare Url</label>
                            <div class="col">
                                <input type="text" class="form-control" name="urlIcare" placeholder="Icare Url" value="{{ $data ? $data->urlIcare : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Username Pcare</label>
                            <div class="col">
                                <input type="text" class="form-control" name="user" placeholder="Username Pcare" value="{{ $data ? $data->user : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Password Pcare</label>
                            <div class="col">
                                <input type="text" class="form-control" name="password" placeholder="Password Pcare" value="{{ $data ? $data->password : '' }}" formnovalidate>
                                <span class="invalid-feedback" id="errorPassword"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Username I-Care</label>
                            <div class="col">
                                <input type="text" class="form-control" name="userIcare" placeholder="Username Icare" value="{{ $data ? $data->userIcare : '' }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">Password I-Care</label>
                            <div class="col">
                                <input type="text" class="form-control" name="passwordIcare" placeholder="Password Icare" value="{{ $data ? $data->passwordIcare : '' }}" formnovalidate>
                                <span class="invalid-feedback" id="errorPassword"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-3 col-form-label required">App Code</label>
                            <div class="col">
                                <input type="text" class="form-control" name="appCode" placeholder="App Code" value="{{ $data ? $data->appCode : '' }}">
                                <span class="badge bg-primary mt-2"> Terakhir diubah : {{ $data ? date('d-m-Y H:i:s', strtotime($data->updated_at)) : '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success" id="btnSettingPcare"><i class="ti ti-device-floppy"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <form class="card" id="formSetting" name="formSetting">
                    <div class="card-body">
                        <div class="row gy-2">
                            <div class="col-12">
                                <label class="col-3 col-form-label">Video Antrean</label>
                                <textarea class="form-control" rows="6" name="txtVideoAntrean" id="txtVideoAntrean"> </textarea>
                            </div>
                            <div class="col-12">
                                <div id="videoAntrean" style="height:50vh"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-success" id="btnVideoAntrean"><i class="ti ti-device-floppy"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
        $('#btnVideoAntrean').on('click', (e) => {
            const videoAntrean = $("#txtVideoAntrean").val()
            $.post(`${url}/setting/antrian/video`, {
                content: videoAntrean
            }).done((response) => {
                alertSuccessAjax().then(() => {
                    location.reload();
                })

            })
        })
        $(document).ready(() => {

            $.get(`${url}/setting/antrian/video`).done((response) => {
                if (response) {
                    content = response.content
                } else {
                    content = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/videoseries?si=CkH2Y3zTCfsIJ9je&amp;controls=1&amp;list=PL8-ZDsV7brM341rMXOPb1b-Qvi0he4kak&amp;autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`;
                }
                $('#videoAntrean').html(content);
                $("#txtVideoAntrean").val(content)
                $('iframe').attr('width', '100%').attr('height', '100%')
            })


        });
    </script>
@endpush
