@include('sys.history.stats')

<div class="col-md-12 shadow-lg p-2">
    <div class="table-responsive">

        <table
            class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
            <thead>
                <tr>
                    <th>Tenant Name</th>
                    <th>Phone</th>
                    <th>Assigned House</th>
                    <th>Price/Month</th>
                    <th>Room Type</th>
                    <th>Location</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Date Paid</th>


                </tr>
            </thead>
            <tbody>
                @isset($history)

                @foreach ($history as $data )
                <tr style="font-size:12px">
                    <td>{{ $data->tenant }}</td>
                    <td>{{ $data->Phone }}</td>
                    <td>{{ $data->House }}</td>
                    <td>{{ number_format($data->Price_Monthly, 2) }} UGX</td>
                    <td>{{ $data->SetupName }}</td>
                    <td>{{ $data->Locations }}</td>
                    <td>{{ $data->Year }}</td>
                    <td>{{ $data->Month }}</td>
                    <td>{{number_format($data->Amount, 2) }} UGX</td>
                    <td>{{  date('Y-M-d', strtotime($data->created_at)) }}</td>



                </tr>
                @endforeach

                @endisset
            </tbody>
        </table>

    </div>
</div>
