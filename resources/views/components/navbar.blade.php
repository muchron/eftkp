<header class="navbar navbar-expand-md d-print-none sticky-top" data-bs-theme="dark">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ url('/') }}" style="text-decoration: none" class="text-brand">
                <img src="{{ asset('public/static/logo-idi.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                {{ env('APP_NAME') }}
            </a>
        </h1>

        <div class="navbar-nav flex-row order-md-last">
            @include('components.navbar._profile')
        </div>
        <div class="navbar-collapse collapse" id="navbar-menu" style="">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                @include('components.navbar._menu')
            </div>
        </div>
    </div>
</header>
