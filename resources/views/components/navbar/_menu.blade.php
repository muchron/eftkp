 <ul class="navbar-nav">
     <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
         <a class="nav-link" href="{{ url('/') }}">
             <span class="nav-link-icon d-md-none d-lg-inline-block">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                     <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                     <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                 </svg>
             </span>
             <span class="nav-link-title">
                 Beranda
             </span>
         </a>
     </li>
     <li class="nav-item {{ Request::is('registrasi') ? 'active' : '' }}">
         <a class="nav-link" href="{{ url('/registrasi') }}">
             <span class="nav-link-icon d-md-none d-lg-inline-block">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                     <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                     <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z"></path>
                 </svg>
             </span>
             <span class="nav-link-title">
                 Registrasi
             </span>
         </a>
     </li>
     <li class="nav-item {{ Request::is('pcare') ? 'active' : '' }} dropdown">
         <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="true">
             <span class="nav-link-icon d-md-none d-lg-inline-block">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plug-connected" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <path d="M7 12l5 5l-1.5 1.5a3.536 3.536 0 1 1 -5 -5l1.5 -1.5z" />
                     <path d="M17 12l-5 -5l1.5 -1.5a3.536 3.536 0 1 1 5 5l-1.5 1.5z" />
                     <path d="M3 21l2.5 -2.5" />
                     <path d="M18.5 5.5l2.5 -2.5" />
                     <path d="M10 11l-2 2" />
                     <path d="M13 14l-2 2" />
                 </svg>
             </span>
             <span class="nav-link-title">
                 Bridging Pcare
             </span>
         </a>
         <div class="dropdown-menu" data-bs-popper="static">
             <div class="dropdown-menu-columns">
                 <div class="dropdown-menu-column">
                     <a href="{{ 'pcare/pendaftaran' }}" class="dropdown-item">
                         Pendaftaran
                     </a>
                     <a href="{{ 'pcare/kunjungan' }}" class="dropdown-item">
                         Kunjungan Pelayanan
                     </a>
                 </div>
             </div>
         </div>
     </li>
     <li class="nav-item {{ Request::is('kyc') ? 'active' : '' }}">
         <a class="nav-link" href="{{ url('kyc') }}?nama={{ session()->get('pegawai')->nama }}&nik={{ session()->get('pegawai')->nik }}" target="_blank">
             <span class="nav-link-icon d-md-none d-lg-inline-block">
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <path d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                     <path d="M15 9h.01" />
                 </svg>
             </span>
             <span class="nav-link-title">
                 KYC
             </span>
         </a>
     </li>
 </ul>
