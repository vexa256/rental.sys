<script type="text/javascript">
 $(function() {

  $('.data').DataTable({
   "paging": true,
   "lengthChange": true,
   "searching": true,
   "ordering": true,
   "info": true,
   "autoWidth": false,
   "responsive": true,
   dom: 'Bfrtip',
   buttons: [

    'excel', 'pdf', 'print'
   ]
  });

  $('.filtered_t').DataTable({
   "paging": true,
   "lengthChange": true,
   "searching": true,
   "pageLength": 10,
   "ordering": true,
   "info": true,
   "autoWidth": false,
   "responsive": true,
   dom: 'Bfrtip',
   buttons: [

    'excel', 'pdf', 'print'
   ]
  });


  $('.gwealth').DataTable({
   "paging": true,
   "pageLength": 5,
   "lengthChange": true,
   "searching": true,
   "ordering": true,
   "info": true,
   "autoWidth": false,
   "responsive": true,
  });
 });

</script>
