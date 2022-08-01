<div class="row">
 <div class="col-md-4">
  <label class="form-label">Tenant name</label>
  <input type="text" required class="form-control" value="{{ $data->tenant }}" name="tenant">

 </div>

 <div class="col-md-4">
  <label class="form-label">Email</label>
  <input type="text" required class="form-control" value="{{ $data->Email }}" name="Email">

 </div>

 <div class="col-md-4">
  <label class="form-label">Occupation</label>
  <input type="text" required class="form-control" value="{{ $data->Occupation }}" name="Occupation">

 </div>


 <div class="col-md-4  mt-3">
  <label class="form-label">Phone</label>
  <input type="text" required class="form-control" value="{{ $data->Phone }}" name="Phone">

 </div>


 <div class="col-md-4  mt-3">
  <label class="form-label">Nationality</label>
  <input type="text" required class="form-control" value="{{ $data->Nationality }}" name="Nationality">

 </div>


 <div class="col-md-4  mt-3">
  <label class="form-label">Sex ({{ $data->Sex }})</label>
  <select class="form-control" value="" name="Sex">
   <option value="Male">Male</option>
   <option value="Female">Female</option>
  </select>

 </div>

 <div class="col-md-4  mt-3">
  <label class="form-label">Dependents (Integers Only)</label>
  <input value="{{ $data->Occupants }}" type="text" required class="form-control IntOnly" name="Occupants">

 </div>

 <div class="col-md-4  mt-3">
  <label class="form-label">ID Type</label>
  <input type="text" required class="form-control" value="{{ $data->id_type }}" name="id_type">

 </div>

 <div class="col-md-4  mt-3">
  <div class="form-label">Custom File Input</div>
  <input type="file" class="form-control" value="" name="Idscan">

 </div>





</div>
