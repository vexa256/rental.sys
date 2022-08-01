<div class="modal fade" id="TenantInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="DisableModalLabel" style="font-size:14px">

            Tenants registered information. (Currently selected tenant)


          </h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="table-responsive">

                <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
                <thead>
                    <tr style="font-size:12px">

                        <th>Tenant</th>
                        <th>Room NO</th>
                        <th>ID</th>
                        <th>Idscan</th>
                        <th>Email</th>
                        <th>Occupation</th>
                        <th>Phone</th>
                        <th>Dependants</th>
                        <th>Nationality</th>
                        <th>Sex</th>
                        <th>House</th>
                        <th>Room Type</th>
                        <th>Location</th>
                        <th>Price/Month</th>
                    </tr>

                </thead>

                <tbody>
                    <tr style="font-size:12px">

                        <td>{{ $data->tenant }}</td>
                        <td>{{ $data->RoomNo }}</td>
                        <td>{{ $data->id_type }}</td>
                        <td> <a class="btn btn-danger btn-sm " href="{{ url($data->Idscan) }}" data-lightbox="image-1"
                            data-title="ID Scan Image for  {{ $data->tenant }}">
                            <i class="fas fa-binoculars pe-2" aria-hidden="true"></i>
                            View
                           </a></td>
                        <td>{{ $data->Email }}</td>
                        <td>{{ $data->Occupation }}</td>
                        <td>{{ $data->Phone }}</td>
                        <td>{{ $data->Occupants }}</td>
                        <td>{{ $data->Nationality }}</td>
                        <td>{{ $data->Sex }}</td>
                        <td>{{ $data->House }}</td>
                        <td>{{ $data->SetupName }}</td>
                        <td>{{ $data->Locations }}</td>
                        <td>{{ number_format($data->Price_Monthly, 2) }} UGX</td>



                    </tr>

                </tbody>


            </table>

            <div class="col-12">
                <button data-bs-dismiss="modal" class="btn btn-primary" type="button"> Close
              </button>
              </div>

          </div>

          </div>





        </div>

      </div>
    </div>
  </div>
