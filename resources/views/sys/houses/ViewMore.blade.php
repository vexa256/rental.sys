<div class="col-md-12 shadow-lg p-2">
 <div class="table-responsive">

  <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
   <thead>
    <tr>
     <th>Room Type</th>
     <th>Rooms</th>
     <th>Bath Rooms</th>
     <th>Kitchen</th>
     <th>Dining Room</th>
     <th>Store</th>
     <th>Extra Rooms</th>


    </tr>
   </thead>
   <tbody>


    <tr>
     <td>{{ $data->SetupName }}</td>
     <td>{{ $data->Rooms }}</td>
     <td>{{ $data->BathRooms }}</td>
     <td>{{ $data->Kitchen }}</td>
     <td>{{ $data->DiningRoom }}</td>
     <td>{{ $data->Store }}</td>
     <td>{{ $data->ExtraRooms }}</td>

    </tr>

   </tbody>
  </table>

 </div>
</div>



</div>
