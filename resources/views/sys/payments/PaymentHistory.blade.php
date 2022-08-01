
<div class="row">

    <div class="col-md-12 shadow-lg p-2">
        <div class="table-responsive">

         <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
          <thead>
           <tr>
            <th>Tenant</th>
            <th>House</th>
            <th>Location</th>
            <th>Room Type</th>
            <th>Price/month (UGX)</th>
            <th>Recorded Payment</th>
            <th>Expected Payment Date</th>
            <th>Payment Validty</th>
            <th>Payment Status</th>

           </tr>
          </thead>
          <tbody>
         @isset($History)

         @foreach ($History as $data )
         <tr style="font-size:12px">
            <td>{{ $data->tenant }}</td>
            <td>{{ $data->House }}</td>
            <td>{{ $data->Locations }}</td>
            <td>{{ $data->SetupName }}</td>
            <td>{{ number_format($data->Price_Monthly, 2) }} UGX</td>
            <td>{{ number_format($data->Pay, 2) }} UGX </td>
            <td>{{ date('d-M-Y', strtotime($data->start_date)) }}</td>
            <td>{{ date('d-M-Y', strtotime($data->end_date)) }}</td>
           <td>{{ $data->Payment_validity }}</td>
        </tr>
         @endforeach

         @endisset
         </tbody>
        </table>

       </div>
       </div>


</div>
