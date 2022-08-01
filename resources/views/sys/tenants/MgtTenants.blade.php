<div class="col-md-12 shadow-lg p-2">
 <div class="table-responsive">

  <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
   <thead>
    <tr>
     <th>Tenant</th>
     <th>ID Type</th>
     <th>Email</th>
     <th>Occupation</th>
     <th>Phone</th>
     <th>Occupants</th>
     <th>Nationality</th>
     <th>Sex</th>
     <th>ID Scan</th>
     <th>Edit</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
    @isset($Tenants) @foreach ($Tenants as $data)

     <tr>

      <td>{{ $data->tenant }}</td>
      <td>{{ $data->id_type }}</td>
      <td>{{ $data->Email }}</td>
      <td>{{ $data->Occupation }}</td>
      <td>{{ $data->Phone }}</td>
      <td>{{ $data->Occupants }}</td>
      <td>{{ $data->Nationality }}</td>
      <td>{{ $data->Sex }}</td>
      <td>
       <a class="btn btn-dark btn-sm " href="{{ url($data->Idscan) }}" data-lightbox="image-1"
        data-title="ID Scan Image for  {{ $data->tenant }}">
        <i class="fas fa-binoculars pe-2" aria-hidden="true"></i>
        View
       </a>
      </td>
      <td>
       <a class="btn btn-dark btn-sm" href="#UpdateTenantModal{{ $data->id }}" role="button"
        data-bs-toggle="modal">
        <i class="fas fa-edit pe-2" aria-hidden="true"></i>
        Edit
       </a>
      </td>

      <td> <a class="btn deleteConfirm btn-danger btn-sm shadow-lg " href="#" role="button"
        data-msg="You want to delete this tenant. Action is not reversible"
        data-route="{{ route('DeleteTenant', ['id' => $data->id]) }}">

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
@include('sys.tenants.CreateTenant')
@include('sys.tenants.EditModal')

