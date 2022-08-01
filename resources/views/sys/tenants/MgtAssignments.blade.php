<div class="col-md-12 shadow-lg p-2">
    <div class="table-responsive">

     <table class="filtered_t table table-dark table-bordered table-sm table-dark card-table table-vcenter  datatable">
      <thead>
       <tr>
        <th>Tenant</th>
        <th>House</th>
        <th>Room Type</th>
        <th>Room NO</th>
        <th>Property Location</th>


        <th>House Details</th>
        <th>Tenant   Details</th>
        <th>Delete Assignment</th>

       </tr>
      </thead>
      <tbody>
       @isset($data)

        <tr>
            <td>{{ $data->tenant }}</td>
            <td>{{ $data->House }}</td>
            <td>{{ $data->SetupName }}</td>
            <td>{{ $data->RoomNo }}</td>
            <td>{{ $data->Locations }}</td>

            <td>
                <a data-bs-toggle="modal" href="#ViewHouse" class="btn btn-primary btn-sm shadow-lg">
                    <i class="fas fa-binoculars me-2"></i> View
                </a>
            </td>




            <td>
                <a data-bs-toggle="modal" href="#ViewTenant" class="btn btn-danger btn-sm shadow-lg">
                    <i class="fas fa-binoculars me-2"></i> View
                </a>
            </td>

            <td>
                <a class="btn deleteConfirm btn-danger btn-sm shadow-lg " href="#" role="button"
                data-msg="You want to delete this tenant house assignment. This action is not reversible"
                data-route="{{ route('DeleteAssignment', ['id' => $data->PID]) }}">

                <i class="fas fa-trash me-2" aria-hidden="true"></i> Delete

               </a>
            </td>


        </tr>

      @endisset

     </tbody>
    </table>

   </div>
   </div>



   </div>
   @include('sys.tenants.CreateTenant')
   @include('sys.tenants.EditModal')
   @include('sys.tenants.modals.ViewTenant')
   @include('sys.tenants.modals.ViewHouseDetails')
