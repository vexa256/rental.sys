<form class="row g-3 needs-validation" method="POST" action="{{ route('CreateHouses') }}">
 @csrf
 <div class="col-md-4">
  <label class="form-label">Property Name</label>
  <input name="House" type="text" class="form-control" required>

 </div>
 <div class="col-md-4">
  <div class="">
   <label class="form-label">Property Location</label>
   <select id="select-locations" name="LocID" class="getdesc form-control select2bs4" style="width: 100%;">

    @isset($Locations)
     @foreach ($Locations as $data)
      <option value="{{ $data->locID }}"> {{ $data->Locations }}</option>
     @endforeach
    @endisset
   </select>
  </div>
 </div>


 <div class="col-md-4">
  <div class="">
   <label class="form-label">Room Setup/Architecure</label>
   <select id="select-rooms" name="RoomID" class="getdesc form-control select2bs4" style="width: 100%;">
    <option selected="selected"></option>
    @isset($HouseRooms)
     @foreach ($HouseRooms as $data)
      <option value="{{ $data->RoomID }}"> {{ $data->SetupName }}</option>
     @endforeach
    @endisset
   </select>
  </div>
 </div>


 <div class="col-md-6">
  <label class="form-label">Monthly Rent (UGX)</label>
  <input type="text" name="Price_Monthly" class="form-control IntOnly" required>

 </div>


 <div class="col-md-6">
  <label class="form-label">Tenant Capacity</label>
  <input type="text" name="TenantCapacity" class="form-control IntOnly" required>

 </div>


 <div class="col-md-12">
  <label class="form-label">Property Description</label>
  <textarea name="desc" id="HouseDesc"></textarea>
 </div>



 <div class="col-12">
  <button class="btn btn-dark float-start" type="submit">Submit form</button>
  <button data-bs-toggle="modal" class="btn btn-primary float-end" type="button">Cancel</button>
 </div>
</form>
