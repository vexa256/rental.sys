<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
 <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
   <span class="navbar-toggler-icon"></span>
  </button>
  <h1 class="navbar-brand navbar-brand-autodark">
   <a href=".">
    <i class="fas fa-project-diagram fa-2x navbar-brand-image"></i>
    Rental MGT Pro
   </a>
  </h1>
  <div class="navbar-nav flex-row d-lg-none">
   <div class="nav-item d-none d-md-flex me-3">

   </div>

   <div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
     <i class="fas fa-user-cog fa-2x mr-1"></i>
     <div class="d-none d-xl-block ps-2">
      <div>{{ Auth::user()->name }}</div>
      <div class="mt-1 text-light">Account Settings</div>
     </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

     <a  href="{{ route('MgtAdmins') }}" class="dropdown-item">Manage Admins</a>
     <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">Logout</a>

    </div>
   </div>
  </div>
  <div class="collapse navbar-collapse" id="navbar-menu">
   <ul class="navbar-nav pt-lg-3" style="font-size: 16px !important">
    <li class="nav-item">
     <a class="nav-link" href="{{ route('VirtualOffice') }}">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
       <i class="fas fa-chart-area  fs-1"></i> </span>
      <span class="nav-link-title">
       Dashboard
      </span>
     </a>
    </li>

    @include('sys.nav.tenants')
    @include('sys.nav.payments')


    <li class="nav-item">
     <a class="nav-link" href="{{ route('ManageLocations') }}">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
       <i class="fas fa-map-marker-alt  fs-1"></i> </span>
      <span class="nav-link-title">
       Manage Locations
      </span>
     </a>
    </li>





    @include('sys.nav.rooms')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ReportSelectHouse') }}">
         <span class="nav-link-icon d-md-none d-lg-inline-block">
          <i class="fas fa-comment-dollar  fs-1"></i> </span>
         <span class="nav-link-title">
            Advanced Report
         </span>
        </a>
       </li>

       <li class="nav-item">
        <a class="nav-link" href="{{ route('RecieptSelectHouses') }}">
         <span class="nav-link-icon d-md-none d-lg-inline-block">
          <i class="fas fa-print  fs-1"></i> </span>
         <span class="nav-link-title">
           Reciepts
         </span>
        </a>
       </li>



    <li class="nav-item">
     <a class="nav-link" href="{{ route('MgtAdmins') }}">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
       <i class="fas fa-map-marker-alt  fs-1"></i> </span>
      <span class="nav-link-title">
        Admin Settings
      </span>
     </a>
    </li>

    <li class="nav-item">
     <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
      <span class="nav-link-icon d-md-none d-lg-inline-block">
       <i class="fas fa-sign-out-alt  fs-1"></i> </span>
      <span class="nav-link-title">
       Log-out
      </span>
     </a>
    </li>


   </ul>
  </div>
 </div>
</aside>

<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
   @csrf
</form>
