@extends('layout')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <span>Selamat Datang : {{ session()->get('pegawai')->nama }}</span>
                <h1>{{ $data->nama_instansi }}</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni debitis earum accusamus reiciendis error voluptatem dolore qui quia doloremque. Quam nisi vel ex recusandae minima saepe, officiis voluptatem nostrum repellendus?</p>
            </div>
        </div>

    </div>
@endsection
