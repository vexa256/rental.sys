@isset($Houses)

 @foreach ($Houses as $data)
  <div class="modal fade" id="RoomDetails{{ $data->hid }}" tabindex="-1" aria-labelledby="staticBackdrop"
   aria-hidden="true">
   <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title" id="RoomDetails{{ $data->hid }}">
       Room Details for the property <span class="font-weight-bold text-danger">
        {{ $data->House }}
       </span>
      </h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
     </div>
     <div class="modal-body">


      @include('sys.houses.ViewMore')




     </div>
    </div>
   </div>
  </div>

 @endforeach

@endisset
