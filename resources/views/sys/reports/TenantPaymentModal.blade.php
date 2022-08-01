<div class="modal fade" id="TenantPaymentModal" aria-hidden="true" aria-labelledby="" tabindex="-1">
    <div class="modal-dialog modal-fullscreen	">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Tabular view of  the tenant payment history for selected house and calendar year.

                    The selected house is <span class="text-danger font-weight-bold">
                        {{ $House }}</span>  the selected report year is <span class="text-danger font-weight-bold">
                        {{ $Year }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">

                    <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Room Number</th>
                                <th>Month Paid For</th>
                                <th>Calendar Year</th>
                                <th>Amount Paid</th>
                                <th>Payment Status</th>

                            </tr>
                        </thead>
                        <tbody>



                                @isset($Payments)

                                @foreach ($Payments as $data)
                                <tr>

                                    <td>{{ $data->tenant }}</td>
                                    <td>{{ $data->RoomNo }}</td>
                                    <td>{{ $data->Month }}</td>
                                    <td>{{ $data->Year }}</td>
                                    <td>{{ number_format($data->Amount, 2) }}</td>
                                    <td>Fully Paid</td>
                                 </tr>
                                @endforeach
                                @endisset





                        </tbody>
                    </table>
                </div>












                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
