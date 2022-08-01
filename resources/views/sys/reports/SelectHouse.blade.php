<div class="card shadow-lg">
    <div class="card-body">
     <h2 class="card-title">Select house and year to bind the revenue report to</h2>


     <form class="row" method="POST" action="{{ route('RevenueReport') }}">
      @csrf


      <div class="col-md-6  mt-3 mb-3">
       <label class="mt-2 mb-2" for="">Select House</label>
       <select name="House" class="form-control" required>
        @isset($Houses)
         @foreach ($Houses as $data)
          <option>
            {{ $data->House }}

        </option>
         @endforeach
        @endisset
       </select>
      </div>

      <div class="col-md-6  mt-3 mb-3">
        <label class="mt-2 mb-2" for="">Select Year</label>
        <select name="Year" class="form-control" required>
         @isset($Payments)
          @foreach ($Payments as $data2)
           <option>
             {{ $data2->Year }}

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
