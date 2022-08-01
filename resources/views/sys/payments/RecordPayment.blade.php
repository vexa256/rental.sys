<div class="row  ">
    <div class="alert alert-danger shadow-lg">

        The selected tenant is <span class="text-danger font-weight-bold">
            {{ $data->tenant }} and the selected calendar year {{ $schedule->Payment_Year }}
        </span>

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




</div>

@include('sys.payments.Pay')
@include('sys.payments.Reverse')
@include('sys.payments.TenantDetails')
@include('sys.payments.PayHistory')
