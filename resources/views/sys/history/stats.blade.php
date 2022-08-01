<div class="col-md-6 mb-3">
    <div class="card bg-dark">
      <div class="card-body text-light">
        <div class="d-flex align-items-center">
          <div class="subheader text-light">Selected House</div>

        </div>
        <div class="h1 mb-3 text-light">

            <i class="fa  fa-home" aria-hidden="true"></i>

        </div>
        <div class="d-flex mb-2">
          <div>{{ $House }} (Location : {{ $loc }})</div>
          <div class="ms-auto">

          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <div class="card bg-primary">
      <div class="card-body text-light">
        <div class="d-flex align-items-center">
          <div class="subheader text-light">Total Assigned Tenants</div>

        </div>
        <div class="h4 mb-3 text-light">

           {{$TotalTenants}}  Tenant(s)

        </div>
        <div class="d-flex mb-2">
          <div><i class="fa fa-2x fa-calculator" aria-hidden="true"></i></div>
          <div class="ms-auto">

          </div>
        </div>

      </div>
    </div>
  </div>
