<div class="modal fade" id="DisableModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DisableModalLabel">

          Select months to disable
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger shadow-lg">
            Months marked as unused will be billed in the near future while months marked as disabled will not be billed in this calendar year.
        </div>
        <form class="row g-3 needs-validation" method="POST" action="{{ route('ManageMonthsPay') }}">
            @csrf
            <?php for ($m = 1; $m <= 12; ++$m) {
                $Month = date('M', mktime(0, 0, 0, $m, 1));

                echo'
          <div class="col-md-4">

            <label  class="form-label">'. $Month.'</label>
            <select class="form-control" name="'. $Month.'">
                <option value="unused">unused</option>
                <option value="disabled">disabled</option>
            </select>

          </div>';


            } ?>

            {!! Form::hidden($name="TenantID", $value=$data->TenantID, []) !!}
            {!! Form::hidden($name="HouseID", $value=$data->HouseID, []) !!}
            {!! Form::hidden($name="RoomID", $value=$data->RoomID, []) !!}
            {!! Form::hidden($name="Payment_Year", $value=date('Y'), []) !!}

          <div class="col-12">
            <button class="btn btn-primary" type="submit">Save Changes</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
