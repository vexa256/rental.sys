<div class="card shadow-lg">
 <div class="card-body">
  <h2 class="card-title">Tenant Property Assignment</h2>

  <div class="col-md-12 shadow-lg p-2">
   <div class="table-responsive">
    <h5 class="card-title text-danger font-weight-bold">Currently Selected Variables</h5>
    <table class=" table table-dark table-sm table-dark card-table table-vcenter  datatable">
     <thead>
      <tr>
       <th>Selected Tenant</th>
       <th>Assigned House</th>

      </tr>
     </thead>
     <tbody>


      <tr>
       <td>{{ $Tenant }}</td>
       <td>{{ $House }}</td>


      </tr>

     </tbody>
    </table>

   </div>
  </div>



 </div>



 <form class="row container" method="POST" action="{{ route('Assignment') }}">

  @csrf

  <div class="col-md-8 mt-3 mb-3">
   <label class="mt-2 mb-2" for="">Select Room Architecture</label>
   <select name="Room" class="form-control">
    @isset($Rooms)
     @foreach ($Rooms as $data)
      <option class="form-control" value="{{ $data->SetupName }}">{{ $data->SetupName }}</option>
     @endforeach
    @endisset
   </select>
  </div>

  <div class="col-md-4 mt-3 mb-3">
    <label class="mt-2 mb-2" for="">Enter Room Number</label>

    {!! Form::text($name="RoomNo", $value=null, [

        "class" => "form-control",

        "required" => "required",


    ]) !!}
  </div>


  {!! Form::hidden($name = 'Tenant', $value = $Tenant, []) !!}
  {!! Form::hidden($name = 'House', $value = $House, []) !!}
  {!! Form::hidden($name = 'TenantID', $value = $TenantID, []) !!}




  <div class=" float-end mb-3">

   <button class="btn btn-dark shadow-lg mt-3 float-end" type="submit">

    <i class="fas fa-check ms-2 me-2" aria-hidden="true"></i> Save Changes
   </button>
  </div>
 </form>


</div>
</div>
