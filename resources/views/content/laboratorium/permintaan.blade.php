@extends('layout')

@section('body')
    <div class="containet-xl h-100">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Rawat Jalan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Rawat Inap</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tabs-home-8" role="tabpanel">
                        <h4>Rawat Jalan</h4>
                        <div class="row">
                            <div class="col">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto illum iure molestiae nesciunt temporibus, vero? Dicta distinctio dolorum est eum exercitationem hic laborum minima officiis rerum, sapiente sed vero!</div>
                            <div class="col">lorem</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-profile-8" role="tabpanel">
                        <h4>Rawat Inap</h4>
                        <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

