 @extends('main')
 @section('contents')
     <div class="page page-center">
         <div class="container-tight py-4">
             <div class="empty">
                 <div class="empty-header">404</div>
                 <p class="empty-title">Halaman Tidak Ditemukan</p>
                 <p class="empty-subtitle text-secondary">
                     Maaf, Halaman yang anda tuju belum tersedia, atau pastikan URL yang anda masukkan sudah benar
                 </p>
                 <div class="empty-action">
                     <a href="{{ url('/') }}" class="btn btn-primary">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                             <path d="M5 12l14 0" />
                             <path d="M5 12l6 6" />
                             <path d="M5 12l6 -6" />
                         </svg>
                         Kembali ke Halaman Utama
                     </a>
                 </div>
             </div>
         </div>
     </div>
 @endsection
