<div class="modal fade" id="RecordPayment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="DisableModalLabel" style="font-size:14px">

           Select months to mark as paid in relation to the selected tenant's payment schedule. <br>


          </h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="alert alert-danger shadow-lg">
            The selected tenant is <span class="text-danger font-weight-bold">
                {{ $data->tenant }} and the selected calendar year {{ $schedule->Payment_Year }} Leave months you don't want affected as blank
            </span>
          </div>
          <form id="RecordPaymentaForm" class="row g-3 needs-validation" method="POST" action="{{ route('SubmitPay') }}">
              @csrf
            {!! Form::hidden($name='id', $value=$id, [$options=null]) !!}
            {!! Form::hidden($name='Payment_Year', $value=$Payment_Year, [$options=null]) !!}
              <div class="col-md-12">

                <label  class="form-label">Select Month </label>
                <select class="form-control" name="Month" required>
                    <option value=""></option>

              <?php for ($m = 1; $m <= 12; ++$m) {
                $Month = date('M', mktime(0, 0, 0, $m, 1));

                if ($data->$Month == 'disabled') {

                } elseif ($data->$Month == 'defaulted') {

                    echo '<option value="'.$Month.'">'.$Month.' (defaulted)</option>';

                } elseif ($data->$Month == 'unused') {

                    echo '<option value="'.$Month.'">'.$Month.' (unused)</option>';

                }

            }?>





</select>

</div>



            <div class="col-12">
              <button id="RecordPaymenta" class="btn btn-primary" type="button">Record Payment</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>
