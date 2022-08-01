<header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
 <div class="container-xl">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav flex-row order-md-last">

   <div class="nav-item dropdown bg-dark text-light rounded ">
    <a href="#" class="nav-link d-flex lh-1 text-reset pl-3 pr-3 " data-bs-toggle="dropdown"
     aria-label="Open user menu">
     <i class="fas fa-user-cog fa-2x mr-1"></i>
     <div class="d-none d-xl-block ps-2">
      <div>{{ Auth::user()->name }}</div>
      <div class="mt-1 small text-light">Account Settings</div>
     </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <a  href="{{ route('MgtAdmins') }}" class="dropdown-item">Manage Admins</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">Logout</a>
    </div>
   </div>
  </div>
  <div class="collapse navbar-collapse" id="navbar-menu">

  </div>
 </div>
</header>
