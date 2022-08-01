<div class="modal fade" id="ViewTenant"  data-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View detailed information about the tenant
            <span class="text-danger font-weight-bold">
                {{ $data->tenant }}
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
                <th>Tenant</th>
                <th>ID type</th>
                <th>Id scan</th>
                <th>Email</th>
                <th>Occupation</th>
                <th>Phone</th>
                <th>Dependants</th>
                <th>Nationality</th>
                <th>Sex</th>
              </tr>
             </thead>
             <tbody>
              @isset($data)

               <tr>
                   <td>{{ $data->tenant }}</td>
                   <td>{{ $data->id_type }}</td>
                   <td>
                    <a class="btn btn-danger shadow-lg btn-sm " href="{{ url($data->Idscan) }}" data-lightbox="image-1"
                        data-title="ID Scan Image for  {{ $data->tenant }}">
                        <i class="fas fa-binoculars pe-2" aria-hidden="true"></i>
                        View
                       </a>
                   </td>
                   <td>{{ $data->Email }}</td>
                   <td>{{ $data->Occupation }}</td>
                   <td>{{ $data->Phone }}</td>
                   <td>{{ $data->Occupants }}</td>
                   <td>{{ $data->Nationality }}</td>
                   <td>{{ $data->Sex }}</td>


               </tr>

             @endisset

            </tbody>
           </table>

          </div>
      </div>

    </div>
  </div>
</div>
