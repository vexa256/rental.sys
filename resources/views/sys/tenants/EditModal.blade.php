 @isset($Tenants)


  @foreach ($Tenants as $data)

   <div class="modal fade" id="UpdateTenantModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">Update info for the tenant
        <span class="text-danger font-weight-bold me-2">
         {{ $data->tenant }}
        </span>
        (Only update desired fields)
       </h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" class="row g-3" method="POST" action="{{ route('UpdateTenant') }}">
       @csrf
       <div class="modal-body">
        <input type="hidden" name="id" value="{{ $data->id }}">
        @include('sys.tenants.EditForm')
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger shadow-lg">Update Tenant</button>
       </div>
      </form>
     </div>
    </div>
   </div>


  @endforeach
 @endisset
