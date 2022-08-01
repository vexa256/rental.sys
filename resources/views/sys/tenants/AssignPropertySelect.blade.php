<div class="card shadow-lg">
 <div class="card-body">
  <h2 class="card-title">Tenant Property Assignment</h2>


  <form class="row" method="POST" action="{{ route('AssignmentRoom') }}">
   @csrf


   <div class="col-md-6 mt-3 mb-3">
    <label class="mt-2 mb-2" for="">Select House</label>
    <select name="House" class="form-control">
     @isset($Houses)
      @foreach ($Houses as $data)
       <option class="form-control" id="{{ $data->House }}">{{ $data->House }}</option>
      @endforeach
     @endisset
    </select>
   </div>




   <div class="col-md-6 mt-3 mb-3">
    <label class="mt-2 mb-2" for="">Select Tenant</label>
    <select name="Tenant" class="form-control">
     @isset($Tenants)
      @foreach ($Tenants as $data)
       <option class="form-control" id="{{ $data->tenant }}">{{ $data->tenant }}</option>
      @endforeach
     @endisset
    </select>
   </div>




   <div class="col-md-6 mt-3 mb-3 d-none">
    <label class="mt-2 mb-2" class="label">Initial Payment</label>
    {!! Form::text($name = 'Amount', $value = '', [
    'class' => 'form-control',

]) !!}
   </div>

   <div class="col-md-6 mt-3 mb-3 d-none">
    <label class="mt-2 mb-2" for="">Payment valid up to</label>
    <div class="input-icon mb-2">
     <input  name="end_date" class="form-control " id="datepicker-icon" value="{{ date('Y-M-d') }}">
     <span class="input-icon-addon"> </span>
    </div>
   </div>


   <div class=" float-end ">

    <button class="btn btn-dark shadow-lg mt-3 float-end" type="submit">

     <i class="fas fa-check-arrow-right ms-2 me-2" aria-hidden="true"></i> Next Step
    </button>
   </div>
  </form>


 </div>
</div>
