<script type="text/javascript">
    $(function() {


        $("#RecordPaymenta").click(function(e) {

             e.preventDefault();

             Swal.fire({
                title: 'Are you sure?',
                text: "You want to submit this tenant's payment. Ensure that you have cross checked the entered information for accurancy",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Submit Payment'
                }).then((result) => {
                if (result.isConfirmed) {

                    $('#RecordPaymentaForm').submit();
                }
         });


    });
    });



    $(function() {


$("#ReversaePay").click(function(e) {

     e.preventDefault();

     Swal.fire({
        title: 'Are you sure?',
        text: "You want to reverse this tenant's payment. Ensure that you have cross checked the entered information for accurancy",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Reverse Payment'
        }).then((result) => {
        if (result.isConfirmed) {

            $('#ReversePaymentForm').submit();
        }
 });


});
});




</script>
