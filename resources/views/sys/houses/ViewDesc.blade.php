 @isset($Houses)
  @foreach ($Houses as $data)

   <div class="modal fade" id="ViewDescWindow{{ $data->hid }}" tabindex="-1" aria-labelledby="ViewDescWindow"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title">View description for the property labeled
        <span class="font-weight-bold text-danger">
         {{ $data->House }}
        </span>
       </h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">
       <textarea id="ViewDescTextBox{{ $data->hid }}">
                 {{ $data->HouseDesc }}
         </textarea>
      </div>

     </div>
    </div>
   </div>


  @endforeach

 @endisset
