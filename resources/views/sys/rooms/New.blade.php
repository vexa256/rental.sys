<form method="POST" action="{{ route('CreateRooms') }}" class="row g-3 needs-validation">
 @csrf
 <div class="col-md-3">
  <label class="form-label">Room Type Name</label>
  <input placeholder="E.g Double Room Unit" name="SetupName" type="text" class="form-control" required>

 </div>


 <div class="col-md-3">
  <label class="form-label">N.O of Total Rooms</label>
  <input required name="Rooms" type="text" class="form-control IntOnly" required>

 </div>

 <div class="col-md-3">
  <label class="form-label">N.O of Bath Rooms</label>
  <input required name="BathRooms" type="text" class="form-control IntOnly" required>

 </div>


 <div class="col-md-3">
  <label class="form-label">N.O of Kitchen(s)</label>
  <input required name="Kitchen" type="text" class="form-control IntOnly" required>

 </div>


 <div class="col-md-4">
  <label class="form-label">N.O of Dining Rooms</label>
  <input required name="DiningRoom" type="text" class="form-control IntOnly" required>

 </div>


 <div class="col-md-4">
  <label class="form-label">N.O of Domestic Stores</label>
  <input required name="Store" type="text" class="form-control IntOnly" required>

 </div>

 <div class="col-md-4">
  <label class="form-label">Extra Rooms</label>
  <input required name="ExtraRooms" type="text" class="form-control IntOnly" required>

 </div>






 <div class="col-12">
  <button class="float-start btn btn-dark" type="submit">Save changes</button>
  <button data-bs-dismiss="modal" class="float-end btn btn-danger" type="button">Cancel</button>
 </div>
</form>
