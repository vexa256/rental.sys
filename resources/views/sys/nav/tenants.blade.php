  <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button"
    aria-expanded="false">
    <span class="nav-link-icon d-md-none d-lg-inline-block">

     <i class="fas fa-users"></i>

    </span>
    <span class="nav-link-title">
     Tenants
    </span>
   </a>
   <div class="dropdown-menu">
    <div class="dropdown-menu-columns">
     <div class="dropdown-menu-column">
      <a class="dropdown-item" href="{{ route('MgtTenants') }}">
       <i class="fas fa-circle-notch" style="margin-right: 10px "></i>
       Manage Tenants
      </a>

      <a class="dropdown-item" href="{{ route('SelectTenant') }}">
       <i class="fas fa-circle-notch" style="margin-right: 10px "></i>
       Assign Property
      </a>

      <a class="dropdown-item" href="{{ route('AssignPropertySelect') }}">
        <i class="fas fa-circle-notch" style="margin-right: 10px "></i>
         Property Assignement
       </a>









     </div>

    </div>
   </div>
  </li>
