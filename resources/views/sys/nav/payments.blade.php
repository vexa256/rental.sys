  <li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button"
    aria-expanded="false">
    <span class="nav-link-icon d-md-none d-lg-inline-block">

     <i class="fas fa-map-marked"></i>

    </span>
    <span class="nav-link-title">
     Payments
    </span>
   </a>
   <div class="dropdown-menu">
    <div class="dropdown-menu-columns">
     <div class="dropdown-menu-column">
      <a class="dropdown-item" href="{{ route('SelectTenantPay') }}">
       <i class="fas fa-circle-notch" style="margin-right: 10px "></i>
       Record Payments
      </a>


     <a class="dropdown-item" href="{{ route('PayHistSelectHouse') }}">
        <i class="fas fa-circle-notch" style="margin-right: 10px "></i>
       Payment History
    </a>


       <a class="dropdown-item" href="{{ route('DefSelectHouse') }}">
       <i class="fas fa-circle-notch" style="margin-right: 10px "></i>
       Defaulters List
       </a>





     </div>

    </div>
   </div>
  </li>
