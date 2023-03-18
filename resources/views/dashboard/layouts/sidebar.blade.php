<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/news*') ? 'active' : ''}}" href="/dashboard/news">
            <span data-feather="file-text" class="align-text-bottom"></span>
            News
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/divisi*') ? 'active' : ''}}" href="/dashboard/divisi">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Divisi
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/sejarah*') ? 'active' : ''}}" href="/dashboard/sejarah">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Sejarah
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/about*') ? 'active' : ''}}" href="/dashboard/about">
            <span data-feather="file-text" class="align-text-bottom"></span>
            About
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/visimisi*') ? 'active' : ''}}" href="/dashboard/visimisi">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Visi & Misi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/contact*') ? 'active' : ''}}" href="/dashboard/contact">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Contact
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategorievent*') ? 'active' : ''}}" href="/dashboard/kategorievent">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Kategori Event
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/event*') ? 'active' : ''}}" href="/dashboard/event">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Event
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/welcomemessage*') ? 'active' : ''}}" href="/dashboard/welcomemessage">
            <span data-feather="file-text" class="align-text-bottom"></span>
          Welcome Message
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/strkorganisasi*') ? 'active' : ''}}" href="/dashboard/strkorganisasi">
            <span data-feather="file-text" class="align-text-bottom"></span>
          Struktur Organisasi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/advisors*') ? 'active' : ''}}" href="/dashboard/advisors">
            <span data-feather="file-text" class="align-text-bottom"></span>
          Advisors
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/partnership*') ? 'active' : ''}}" href="/dashboard/partnership">
            <span data-feather="file-text" class="align-text-bottom"></span>
          Partnership
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/divisimember*') ? 'active' : ''}}" href="/dashboard/divisimember">
            <span data-feather="file-text" class="align-text-bottom"></span>
          Member Divisi
          </a>
        </li>
      </ul>  
      
      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategoris*') ? 'active' : ''}}" href="/dashboard/kategoris">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Kategori
          </a>
        </li>
      </ul>
      @endcan
      
    </div>
</nav>