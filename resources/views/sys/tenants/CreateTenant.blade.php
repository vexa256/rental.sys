<div class="modal fade" id="CreateTenantModal" tabindex="-1" aria-labelledby="CreateTenantModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-xl">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="CreateTenantModalLabel">Create New Tenant</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <form enctype="multipart/form-data" class="row g-3" method="POST" action="{{ route('NewTenant') }}">
    @csrf
    <div class="modal-body">

     @include('sys.tenants.NewTenantForm')
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
     <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
   </form>
  </div>
 </div>
</div>
