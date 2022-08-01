<div class="row ">
    <div class="col-md-4 mb-3">
        <div class="card bg-dark">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Registered Propertes</div>

            </div>
            <div class="h1 mb-3 text-light">

                <div>{{ $Houses }}</div>

            </div>
            <div class="d-flex mb-2">

              <i class="fa  fa fa-2x fa-home" aria-hidden="true"></i>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card bg-primary">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light" style="font-size:17px">Property Locations</div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$Locations}}

            </div>
            <div class="d-flex mb-2">
              <div> <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card bg-secondary">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light" style="font-size:17px">Fully Occupied Properties</div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$FullyOccupied}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-check-circle" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>


      <div class="col-md-4 mb-3">
        <div class="card bg-dark">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Partially Occupied  </div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$PartiallyOccupied}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-exclamation-circle" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>




      <div class="col-md-4 mb-3">
        <div class="card bg-success">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Total Tenants </div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$Tenants}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-users" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card bg-danger">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Total Defaulters </div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$Defaulters}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-exclamation-triangle" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card bg-secondary">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Room Types </div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$RoomArchitectures}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-users" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card bg-dark">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Registered Admins </div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$Adminss}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-users-cog" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card bg-primary">
          <div class="card-body text-light">
            <div class="d-flex align-items-center">
              <div class="subheader text-light text" style="font-size:17px">Property Assignments</div>

            </div>
            <div class="h1 mb-3 text-light">

               {{$AssignedTenants}}

            </div>
            <div class="d-flex mb-2">
              <div><i class="fa fa-2x fa-house-user" aria-hidden="true"></i></div>
              <div class="ms-auto">

              </div>
            </div>

          </div>
        </div>
      </div>




</div>
