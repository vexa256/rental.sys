<script src="{{ url('dist/js/tabler.min.js') }}"></script>
<script src="{{ url('dist/libs/choices.js/public/assets/scripts/choices.js') }}"></script>
@include('sys.scripts.jquery')
@include('sys.scripts.chartjs')

@isset($LoadChart)
{!! $chart->script() !!}
{!! $DefChart->script() !!}
@endisset

@include('sys.scripts.IntOnly')

@isset($Properties)
 @include('sys.scripts.select2')
@endisset












<script>
 $(function() {
  $('.remove_required').removeAttr('required');
 });

</script>

@isset($stepyjs)

 @include('sys.scripts.stepy')
 @include('sys.scripts.custom')
 @include('sys.scripts.datepicker')

@endisset
<script src="{{ url('dt/data/datatables.min.js') }}"></script>

@include('sys.scripts.datatables')
@include('sys.scripts.swal2')
@include('sys.nots.notifications')
@include('sys.scripts.app')






@isset($Ben)

 @if ($Ben == 'true')


  @include('sys.scripts.bs5')
  @include('sys.scripts.IntOnly')
  <script type="text/javascript">
   Swal.fire('Information', 'Attach beneficiaries to this investment profile to continue', 'warning');

   var myModal = new bootstrap.Modal(document.getElementById("CreateBen"), {
    backdrop: 'static',
    keyboard: false
   });
   document.onreadystatechange = function() {
    myModal.show();
   };

  </script>

 @endif
@endisset



@isset($Kins)

 @if ($Kins == 'true')


  @include('sys.scripts.bs5')
  @include('sys.scripts.IntOnly')
  <script type="text/javascript">
   var myModal = new bootstrap.Modal(document.getElementById("CreateKins"), {
    backdrop: 'static',
    keyboard: false
   });
   document.onreadystatechange = function() {
    myModal.show();
   };

  </script>

 @endif
@endisset


@isset($Wallets->status)


 @if ($Wallets->status == 'KYC Rejected')

  @include('sys.scripts.bs5')

  <script type="text/javascript">
   var myModal = new bootstrap.Modal(document.getElementById("UpdateKYC_a"), {
    backdrop: 'static',
    keyboard: false
   });
   document.onreadystatechange = function() {
    myModal.show();
   };

  </script>


 @endif
@endisset
<script type="text/javascript" src="{{ url('dist/js/lightbox.min.js') }}"></script>


<script type="text/javascript" src="{{ url('build/ckeditor.js') }}"></script>

<!-- Chartisan -->
@isset($label)
 @include('sys.terminations.TerminateModal')
 @include('sys.scripts.ck')
@endisset

@isset($LocPage)

 @include('sys.scripts.ck')

@endisset


@isset($Properties)

@include('sys.scripts.ck')

@endisset



@isset($Occup)

@include('sys.scripts.ck')

@endisset


@isset($LoadPicker)
 @include('sys.scripts.datepicker')
@endisset



@if(isset($DoNotShow))

@else

@include('sys.scripts.autocomplete')

@endif

@isset($LoadCk)
@include('sys.scripts.ck')
@endisset


@include('sys.scripts.Pay')
@include('sys.scripts.printer')
