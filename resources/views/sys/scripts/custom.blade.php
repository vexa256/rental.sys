<script type="text/javascript">
 $(function() {


  $('.remove_required').removeAttr('required');

  $('#regForm').addClass('shadow-lg p-3');

  $("input[type='text']").addClass('form-control')
  $("#nextBtn").addClass('btn btn-sm btn-dark shadow-lg')
  $("#prevBtn").addClass('btn btn-sm btn-dark shadow-lg mr-3')

  const nextbutton = $("#nextBtn");
  const prevBtn = $("#prevBtn");


  window.setInterval(function() {

   $('#regForm').addClass('shadow-lg p-3');

   $("input[type='text']").addClass('form-control')
   $("#nextBtn").addClass('btn btn-sm btn-dark shadow-lg')
   $("#prevBtn").addClass('btn btn-sm btn-dark shadow-lg mr-3')

   const nextbutton = $("#nextBtn");
   const prevBtn = $("#prevBtn");





  }, 500);



 });

</script>
