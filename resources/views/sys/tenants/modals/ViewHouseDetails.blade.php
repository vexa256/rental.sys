<div class="modal fade" id="ViewHouse"  data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">View detailed information about the house
              <span class="text-danger font-weight-bold">
                  {{ $data->House }}
              </span>
          </h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">

              <table class=" table table-dark table-bordered table-sm table-dark card-table table-vcenter  datatable">
               <thead>
                <tr>

                    <th>House</th>
                    <th>Location</th>
                    <th>Room Type</th>
                    <th>Total Rooms</th>
                    <th>Bath Rooms</th>
                    <th>Kitchens </th>
                    <th> Dining Rooms</th>
                    <th>Domestic Stores</th>
                    <th>Extra Rooms</th>

                </tr>
               </thead>
               <tbody>
                @isset($data)

                 <tr>
                    <td>{{ $data->House }}</td>
                    <td>{{ $data->Locations }}</td>
                    <td>{{ $data->SetupName }}</td>
                    <td>{{ $data->Rooms }}</td>
                    <td>{{ $data->BathRooms }}</td>
                    <td>{{ $data->Kitchen }}</td>
                    <td>{{ $data->DiningRoom }}</td>
                    <td>{{ $data->Store }}</td>
                    <td>{{ $data->ExtraRooms }}</td>

                 </tr>

               @endisset

              </tbody>
             </table>

            </div>
        </div>

      </div>
    </div>
  </div>
