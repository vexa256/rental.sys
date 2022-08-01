<div class="card shadow-lg">
    <div class="card-body">
     <h2 class="card-title">Select Tenant and Year to attach the  payment reciept to. The selected house is <span class="text-danger font-weight-bold">
        {{$HouseName}}
    </span> </h2>


     <form class="row" method="POST" action="{{ route('GenerateTenantReciept') }}">
      @csrf


      <div class="col-md-6  mt-3 mb-3">
       <label class="mt-2 mb-2" for="">Select Tenant</label>
       <select id="GetHouseID" name="Tenant" class="form-control" required>
        @isset($Tenants)
         @foreach ($Tenants as $data)
          <option >
            {{ $data->tenant }}

        </option>
         @endforeach
        @endisset
       </select>
      </div>

      <div class="col-md-6  mt-3 mb-3">
        <label class="mt-2 mb-2" for="">Select Year</label>
        <select id="GetHouseID" name="Year" class="form-control" required>
         @isset($Tenants)
          @foreach ($Tenants->unique('Year') as $data)
           <option >
             {{ $data->Year }}

         </option>
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
