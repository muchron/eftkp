@extends('main')

@section('navbars')
    @include('components.navbar')
@endsection

@section('contents')
    <div class="page">
        <div class="page-wrapper">
            {{-- page header : informasi header --}}
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                {{ Request::segment(1) ? '' : 'Selamat Datang' }}
                            </div>
                            <h2 class="page-title">
                                {{ Request::segment(1) ? ucfirst(Request::segment(1)) : 'Beranda' }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-body">
                <div class="container-xl">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
@endsection
