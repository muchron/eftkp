@extends('main')

@section('contents')
    <div class="container p-5 bg-dark">
        <div class="row gy-3">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="card border rounded-4" style="height: 100px">
                    <div class="card-body">
                        <div style="display: flex">
                            {{-- <div class="col-lg-1"> --}}
                            <div>
                                <img src="{{ $data->logo }}" alt="logo" width="70px">
                            </div>
                            {{-- </div> --}}
                            {{-- <div class="col"> --}}
                            <div class="ms-3">
                                <h1 class="m-0" style="font-size: 300%">{{ $data->nama_instansi }}</h1>
                                <p class="m-0" style="font-size: 120%">{{ $data->alamat_instansi }}, {{ $data->kabupaten }}, {{ $data->propinsi }}</p>
                                <p class="m-0" style="font-size: 120%">{{ $data->email }}, {{ $data->kontak }}, {{ $data->propinsi }}</p>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <div class="card border rounded-4 text-center" style="height: 100px">
                    <div class="card-body">
                        <h1 class="m-0" style="font-size: 405%" id="jam">00:00:00</h1>
                        <h1 class="p-2" style="" id="tanggal">{{ date('d F Y') }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card border rounded-4 text-center" style="height: 70vh;">
                    <div class="card-body">
                        <h3 class="mb-5" style="margin-top:15vh">Nomor Antrean</h3>
                        <h1 class="mb-5" style="font-size: 800%" id="nomor">000</h1>
                        <h1 class="" style="font-size: 350%" id="nama">-</h1>
                        <h1 class="m-0" id="poliklinik">-</h1>
                        <h1 class="m-0" id="dokter">-</h1>
                        <h1 class="m-0" id="penjab">-</h1>
                        <input type="hidden" class="speech" id="speech">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12" id="videoAntrean">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card border rounded-4 text-center" style="height: 10vh">
                    <div class="card-body">
                        <marquee behavior="" direction="">
                            <h1 class="mt-2">
                                Selamat datang di {{ $data->nama_instansi }}, <i class="ti ti-home" style="font-size:25px"></i> Alamat : {{ $data->alamat_instansi }}, {{ $data->kabupaten }}, {{ $data->propinsi }}, <i class="ti ti-mail" style="font-size:25px"></i> Kritik, Saran & Informasi : {{ $data->email }}, {{ $data->kontak }},
                            </h1>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=Alg0GPi9"></script>
    <script>
        $(document).ready(() => {
            $.get(`${url}/setting/antrean/video`).done((response) => {
                if (response) {
                    $('#videoAntrean').html(response.content);
                } else {
                    $('#videoAntrean').html(`<iframe width="100%" height="100%" src="https://www.youtube.com/embed/videoseries?si=CkH2Y3zTCfsIJ9je&amp;controls=1&amp;list=PL8-ZDsV7brM341rMXOPb1b-Qvi0he4kak&amp;autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`);

                }
                $('iframe').attr('width', '100%').attr('height', '100%')
            })
            // let getVideoAntrean = '';

            // if (localStorage.getItem('videoAntrean')) {
            //     getVideoAntrean = localStorage.getItem('videoAntrean');
            // } else {
            //     getVideoAntrean = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/videoseries?si=CkH2Y3zTCfsIJ9je&amp;controls=1&amp;list=PL8-ZDsV7brM341rMXOPb1b-Qvi0he4kak&amp;autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`

            // }
            // $('#videoAntrean').html(getVideoAntrean);
            // $('iframe').attr('width', '100%').attr('height', '100%')

            jam();
            const date = new Date();

            const hari = setHari(date.getDay());
            $('#tanggal').html(`${hari}, ${formatTanggal(date.toISOString().split('T')[0])}`);

            setInterval(() => {
                const currentSpeech = $('#speech').val()
                $.get(`${url}/registrasi/get/panggil`).done((response) => {
                    if (Object.keys(response).length) {
                        if (response.pcare_pendaftaran) {
                            $('#nomor').html(response.pcare_pendaftaran.noUrut)
                        } else {
                            $('#nomor').html(response.no_reg)
                        }
                        $('#nama').html(response.pasien.nm_pasien)
                        $('#poliklinik').html(response.poliklinik.nm_poli)
                        $('#dokter').html(response.dokter.nm_dokter)
                        $('#penjab').html(response.penjab.png_jawab)

                        const speech = response.pasien.nm_pasien.split(', ');
                        responsiveVoice.speak(`${speech[0].toLowerCase()}. ${response.poliklinik.nm_poli}`, 'Indonesian Female', {
                            rate: 0.9,
                            volume: 50,
                        });
                        setStatusLayan(response.no_rawat, 'Dirawat')
                        setInterval(blinkText($('#nama')), 2000);
                        setInterval(blinkText($('#nomor')), 2000);
                    }
                })
            }, 1000);
        })

        function jam() {
            setTime = setInterval(() => {
                var dateString = new Date().toLocaleString("id-ID", {
                    timeZone: "Asia/Jakarta"
                });
                var formattedString = dateString.replace(",", "-");
                var splitarray = new Array();
                splitarray = formattedString.split(" ");
                var splitarraytime = new Array();
                splitarraytime = splitarray[1].split(".");
                const jamHitung = splitarraytime[0] + ':' + splitarraytime[1] + ':' + splitarraytime[2]; // time
                $('#jam').html(jamHitung)
            }, 1000);

            return setTime;
        }

        function blinkText(element) {
            element.fadeOut(500)
            element.fadeIn(500)
        }
    </script>
@endpush
