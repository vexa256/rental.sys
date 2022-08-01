<div class="card shadow-lg">
    <div class="card-body">
     <h2 class="card-title">Select house to attach the payment reciept  to</h2>


     <form class="row" method="POST" action="{{ route('SelectTenantReciepts') }}">
      @csrf


      <div class="col-md-12  mt-3 mb-3">
       <label class="mt-2 mb-2" for="">Select House</label>
       <select id="GetHouseID" name="House" class="form-control" required>
        @isset($Houses)
         @foreach ($Houses as $data)
          <option >
            {{ $data->House }}

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
