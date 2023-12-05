@extends('main')

@section('navbars')
    @include('components.navbar')
@endsection

@section('contents')
    {{-- page header : informasi header --}}
    <div class="page-header d-print-none my-3">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ ucfirst(Request::segment(1)) ? ucfirst(Request::segment(1)) : 'Beranda' }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body my-1">
        <div class="container-xl">
            @yield('body')
        </div>
    </div>
    {{-- </div> --}}
@endsection
