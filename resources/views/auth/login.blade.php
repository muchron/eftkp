@extends('main')

@section('contents')
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-4">
                    <img src="{{ $data->logo }}" alt="" width="100px">
                    {{-- <a href="." class="navbar-brand navbar-brand-autodark"><img src="./public/static/logo.svg" height="36" alt=""></a> --}}
                </div>

                <h2 class="h2 text-center mb-0">
                    Selamat Datang <br />
                    {{ strtoupper($data->nama_instansi) }}
                </h2>
                <p class="text-center">
                    {{ strtoupper($data->alamat_instansi) }}, KAB. {{ strtoupper($data->kabupaten) }}, {{ strtoupper($data->propinsi) }}
                </p>
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                            </div>
                            <div>
                                {{ session()->get('error') }}
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                <form action="login" method="post" autocomplete="off" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Uername</label>
                        <input type="text" name="username" class="form-control" placeholder="" autocomplete="off" value="{{ old('username') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                            {{-- <span class="form-label-description">
                                <a href="./forgot-password.html">I forgot password</a>
                            </span> --}}
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" class="form-control" placeholder="" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="mb-2">
                        {{-- <label class="form-check">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Remember me on this device</span>
                        </label> --}}
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100" style="background-image: url(./public/static/photos/doctor-typing-on-them-laptop.jpg)"></div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(() => {
            localStorage.removeItem('tglAwal');
            localStorage.removeItem('tglAkhir');
        })
    </script>
@endpush
