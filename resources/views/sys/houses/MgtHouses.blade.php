<div class="col-md-12 shadow-lg p-2">
 <div class="table-responsive">

  <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
   <thead>
    <tr>
     <th>House/Property Name</th>
     <th>Tenant Capacity</th>
     <th>Monthly Price (UGX)</th>
     <th>Room Setup</th>
     <th>Location</th>
     <th>House Description</th>
     <th>Room Details</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
    @isset($Houses) @foreach ($Houses as $data)

     <tr>

      <td>{{ $data->House }}</td>
      <td>{{ $data->TenantCapacity }} Tenants</td>
      <td>{{ number_format($data->Price_Monthly, 2) }} UGX</td>
      <td>{{ $data->SetupName }}</td>
      <td>{{ $data->Locations }}</td>
      <td>
       <a class="btn btn-dark " href="#" data-bs-toggle="modal" data-bs-target="#ViewDescWindow{{ $data->hid }}"
        role="button">
        <i class="fas fa-binoculars pe-2" aria-hidden="true"></i>
        Description
       </a>
      </td>
      <td>
       <a class="btn btn-dark " href="#RoomDetails{{ $data->hid }}" role="button" data-bs-toggle="modal">
        <i class="fas fa-binoculars pe-2" aria-hidden="true"></i>
        View
       </a>
      </td>

      <td> <a class="btn deleteConfirm btn-danger btn-sm shadow-lg " href="#" role="button"
        data-msg="You want to delete this house/property. Action is not reversible"
        data-route="{{ route('DeleteProperty', ['hid' => $data->hid]) }}">

        <i class="fas fa-trash me-2" aria-hidden="true"></i> Delete

       </a></td>

     </tr>
    @endforeach
   @endisset

  </tbody>
 </table>

</div>
</div>



</div>
@include('sys.houses.Modal')
@include('sys.houses.ViewModal')
@include('sys.houses.ViewDesc')
