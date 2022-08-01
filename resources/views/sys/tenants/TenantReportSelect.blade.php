<div class="card shadow-lg">
    <div class="card-body">
     <h2 class="card-title">Select Tenant whose assignment report is required</h2>


     <form class="row" method="POST" action="{{ route('AssignmentReport') }}">
      @csrf





      <div class="col-md-12 mt-3 mb-3">
       <label class="mt-2 mb-2" for="">Select Tenant</label>
       <select name="Tenant" class="form-control" required>
        @isset($Tenants)
         @foreach ($Tenants as $data)
          <option class="form-control" id="{{ $data->tenant }}">{{ $data->tenant }}</option>
         @endforeach
        @endisset
       </select>
      </div>





      <div class=" float-end ">

       <button class="btn btn-dark shadow-lg mt-3 float-end" type="submit">

        <i class="fas fa-check-arrow-right ms-2 me-2" aria-hidden="true"></i> Next Step
       </button>
      </div>
     </form>


    </div>
   </div>
