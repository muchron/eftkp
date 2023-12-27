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
        <form class="card" id="formSettingPcare" name="formSettingPcare" method="post" action="{{ url('setting/pcare/post') }}">
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
@endsection

@push('script')
    <script>
        // function validatePassword(password) {
        //     const hasUppercase = /[A-Z]/.test(password);
        //     const hasSymbol = /[!@#$%^&*()_+[\]{}|;:,.<>?]/.test(password);
        //     const hasNumber = /\d/.test(password);

        //     // Check if all criteria are met
        //     const isValid = hasUppercase && hasSymbol && hasNumber;

        //     return isValid;
        // }
        // $('#formSettingPcare').submit((e) => {

        //     const data = getDataForm('formSettingPcare', 'input')
        //     const isValidate = validatePassword(data.passPcare);

        //     if (!isValidate) {
        //         $('#formSettingPcare input[name=passPcare]').addClass('is-invalid')
        //         $('#errorPassword').html('Password harus terdapat huruf kapital [A-a], angka [0-9], dan symbol')
        //         return false
        //     }
        //     alertSuccessAjax();
        //     $('#formSettingPcare input[name=passPcare]').removeClass('is-invalid')
        // })
    </script>
@endpush
