 <ul class="navbar-nav">
     <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
         <a class="nav-link" href="/">
             <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
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
         <a class="nav-link" href="/registrasi">
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
 </ul>
