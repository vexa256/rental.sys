<div class="card shadow-lg">
    <div class="card-body">
     <h2 class="card-title">Select house location to attach the payment history report to</h2>

        <div class="alert alert-danger shadow-lg">

            The selected house is <span class="text-danger font-weight-bold">
                {{ $House }}
            </span>
        </div>

     <form class="row" method="POST" action="{{ route('PayHistoryReport') }}">
      @csrf

      {!! Form::hidden($name="House", $value=$House, [$options=null]) !!}

      <div class="col-md-12  mt-3 mb-3">
       <label class="mt-2 mb-2" for="">Select Location</label>
       <select name="Locations" class="form-control" required>
        @isset($Locations)
         @foreach ($Locations as $data)
          <option>
            {{ $data->Locations }}

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
