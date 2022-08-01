 <div class="modal modal-blur fade" id="NewLoc" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title">Create a new property Location
      <span class="ml-1 text-danger font-weight-bold">


      </span>
     </h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     @include('sys.locations.NewLocation')
    </div>


   </div>
  </div>
 </div>


 @isset($Locations) @foreach ($Locations as $data)


  <div class="modal modal-blur fade" id="ViewDesc{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
     <div class="modal-header">
      <h5 class="modal-title">View description for the location <span class="text-danger font-weight-bold">
        {{ $data->Locations }}
       </span>
       <span class="ml-1 text-danger font-weight-bold">


       </span>
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <textarea id="ViewLocDesc{{ $data->id }}">

        {{ $data->desc }}
        </textarea>
     </div>


    </div>
   </div>
  </div>
 @endforeach
@endisset
