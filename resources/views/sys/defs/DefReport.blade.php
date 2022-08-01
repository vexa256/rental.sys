@include('sys.defs.stats')

<div class="col-md-12 shadow-lg p-2">
    <div class="table-responsive">

        <table
            class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
            <thead>
                <tr>
                    <th>Tenant Name</th>
                    <th>Room NO</th>
                    <th>Phone</th>
                    <th>Assigned House</th>
                    <th>House Price</th>
                    <th>Room Type</th>
                    <th>Location</th>
                    <th class="bg-primary text-light">Year</th>
                    <th class="bg-primary text-light">Month</th>
                    <th class="bg-primary text-light">Defaulted Amount</th>
                    <th>Record Date</th>


                </tr>
            </thead>
            <tbody>
                @isset($history)

                @foreach ($history as $data )
                <tr style="font-size:12px">
                    <td>{{ $data->tenant }}</td>
                    <td>{{ $data->RoomNo }}</td>
                    <td>{{ $data->Phone }}</td>
                    <td>{{ $data->House }}</td>
                    <td>{{ number_format($data->Price_Monthly, 2) }} UGX</td>
                    <td>{{ $data->SetupName }}</td>
                    <td>{{ $data->Locations }}</td>
                    <td class="bg-primary text-light">{{ $data->DefaultedYear }}</td>
                    <td class="bg-primary text-light">{{ $data->Month }}</td>
                    <td class="bg-primary text-light">{{number_format($data->defaulted_amount, 2) }} UGX</td>
                    <td>{{  date('Y-M-d', strtotime($data->CT)) }}</td>



                </tr>
                @endforeach

                @endisset
            </tbody>
        </table>

    </div>
</div>
