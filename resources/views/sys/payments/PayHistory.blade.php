<div class="modal fade" id="Payhistory_a" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Payment history for the selected tenant and assigned
                    property

                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 shadow-lg p-2">
                    <div class="table-responsive">

                        <table
                            class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
                            <thead>
                                <tr>
                                    <th>Tenant Name</th>
                                    <th>Room NO</th>
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
                                @isset($Payments)

                                @foreach ($Payments as $pay )
                                <tr style="font-size:12px">
                                    <td>{{ $data->tenant }}</td>
                                    <td>{{ $data->RoomNo }}</td>
                                    <td>{{ $data->House }}</td>
                                    <td>{{ number_format($data->Price_Monthly, 2) }} UGX</td>
                                    <td>{{ $data->SetupName }}</td>
                                    <td>{{ $data->Locations }}</td>
                                    <td>{{ $pay->Year }}</td>
                                    <td>{{ $pay->Month }}</td>
                                    <td>{{number_format($pay->Amount, 2) }} UGX</td>
                                    <td>{{ $pay->created_at->format('Y-M-d') }}</td>



                                </tr>
                                @endforeach

                                @endisset
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
