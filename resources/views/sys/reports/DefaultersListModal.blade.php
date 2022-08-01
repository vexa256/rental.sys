<div class="modal fade" id="DefaultersListModal" aria-hidden="true" aria-labelledby="" tabindex="-1">
    <div class="modal-dialog modal-fullscreen	">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Detailed defaulter's list for the selected house and year.

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
                                <th>Defaulted Month</th>
                                <th>Calendar Year</th>
                                <th>Defaulted Amount</th>
                                <th>Payment Status</th>

                            </tr>
                        </thead>
                        <tbody>



                                @isset($Defaulted)

                                @foreach ($Defaulted as $data)
                                <tr>

                                    <td>{{ $data->tenant }}</td>
                                    <td>{{ $data->RoomNo }}</td>
                                    <td>{{ $data->Month }}</td>
                                    <td>{{ $data->DefaultedYear }}</td>
                                    <td>{{ number_format($data->defaulted_amount, 2) }}</td>
                                    <td>Defaulted</td>
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
