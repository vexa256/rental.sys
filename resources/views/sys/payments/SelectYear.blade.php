<div class="card shadow-lg">
    <div class="card-body">
     <h2 class="card-title">Select calendar year to attach payments to in relation to the tenant <span class="text-danger font-weight-bold">
        {{ $tenant->tenant }}
     </span>

        <span class="text-danger font-weight-bold">

        </span>

     </h2>


     <form class="row" method="POST" action="{{ route('ReturnRecordPay') }}">
      @csrf


        {!! Form::hidden($name="id", $value=$tenant->PID, [$options=NULL]) !!}



      <div class="col-md-12 mt-3 mb-3">
       <label class="mt-2 mb-2" for="">Select Calendar Year</label>
       <select name="Payment_Year" class="form-control" required>
        @isset($Years)
         @foreach ($Years as $data)
          <option class="form-control" id="{{ $data->Payment_Year }}">{{ $data->Payment_Year }}</option>
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
