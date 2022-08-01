<div class="modal fade" id="Payments_a" aria-hidden="true" aria-labelledby="Defaulter_aLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen	">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Defaulter_aLabel">Tabular view of total payments  per month

                    The selected house is <span class="text-danger font-weight-bold">
                        {{ $House }}</span> and the selected report year is <span class="text-danger font-weight-bold">
                        {{ $Year }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">

                    <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
                        <thead>
                            <tr>
                                @isset($arr_Months)
                                @foreach ($arr_Months as $Month)
                                <th>{{ $Month }}</th>
                                @endforeach
                                @endisset

                            </tr>
                        </thead>
                        <tbody>



                            <tr>
                                @isset($arr_Amounts)
                                @foreach ($arr_Amounts as $Amount)


                                <td>{{number_format( $Amount, 2) }} UGX</td>


                                @endforeach
                                @endisset

                            </tr>



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
