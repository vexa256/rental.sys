<div class="col-md-12 shadow-lg p-2">
 <div class="table-responsive">

  <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
   <thead>
    <tr>
     <th>Room Setup Name</th>
     <th>Room Capicity</th>
     <th>Bath Rooms</th>
     <th>Kitchen</th>
     <th>Dining Room</th>
     <th>Store</th>
     <th>Extra Rooms</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
    @isset($Rooms) @foreach ($Rooms as $data)

     <tr>
      <td>{{ $data->SetupName }}</td>
      <td>{{ $data->Rooms }}</td>
      <td>{{ $data->BathRooms }}</td>
      <td>{{ $data->Kitchen }}</td>
      <td>{{ $data->DiningRoom }}</td>
      <td>{{ $data->Store }}</td>
      <td>{{ $data->ExtraRooms }}</td>
      <td> <a class="btn deleteConfirm btn-danger btn-sm shadow-lg " href="#" role="button"
        data-msg="You want to delete this room type. Action is not reversible"
        data-route="{{ route('DeleteRooms', ['id' => $data->id]) }}">

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
@include('sys.rooms.Modal')
