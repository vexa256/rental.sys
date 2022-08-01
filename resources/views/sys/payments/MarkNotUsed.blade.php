<div class="row  ">
    <div class="alert alert-danger shadow-lg ">
        The selcted tenant is <span class="text-danger">
            {{ $data->tenant }} and the calendar year is {{ date('Y') }}
        </span>

        <a href="#"
            class="btn btn-danger float-end deleteConfirm"

            data-route =" {{ route('ConfirmNotUsed', ['id'=>$data->PID]) }}"
            data-msg="All applicable disabled months have been marked. Confirm  the changes and finish the edit"

            >Confirm Changes</a>
    </div>
    <div class="col-md-12 shadow-lg p-2">
        <div class="table-responsive">

         <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
          <thead>
           <tr>

           <?php for ($m = 1; $m <= 12; ++$m) {
                $a = date('M', mktime(0, 0, 0, $m, 1));

                echo "<th>".$a."</th>";

            } ?>

           </tr>
          </thead>
          <tbody>
         <tr style="font-size:12px">
            <?php for ($m = 1; $m <= 12; ++$m) {
                $Month = date('M', mktime(0, 0, 0, $m, 1));

                echo "<td>".$data->$Month."</td>";

            } ?>

         </tr>
         </tbody>
        </table>

       </div>
       </div>

       @include('sys.payments.DisableMonthModal')



</div>
