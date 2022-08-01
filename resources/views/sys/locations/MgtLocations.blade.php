<div class="col-md-12 shadow-lg p-2">
 <div class="table-responsive">

  <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable" style="">
   <thead>
    <tr>
     <th>Location</th>
     <th>Description</th>
     <th class="">Delete</th>



    </tr>
   </thead>
   <tbody>
    @isset($Locations) @foreach ($Locations as $data)

     <tr>
      <td>{{ $data->Locations }}</td>

      <td class="">

       <a data-bs-toggle="modal" class="btn btn-primary btn-sm shadow-lg " href="#ViewDesc{{ $data->id }}"
        role="button">
        <i class="fa fa-search me-2" aria-hidden="true"></i> View
       </a>

      </td>
      <td>

       <a class="btn deleteConfirm btn-danger btn-sm shadow-lg " href="#" role="button"
        data-msg="You want to delete this location. Action is not reversible"
        data-route="{{ route('DeleteLocation', ['id' => $data->id]) }}">

        <i class="fas fa-trash me-2" aria-hidden="true"></i> Trash

       </a>

      </td>
     </tr>
    @endforeach
   @endisset

  </tbody>
 </table>

</div>
</div>



</div>
@include('sys.locations.Modals')
