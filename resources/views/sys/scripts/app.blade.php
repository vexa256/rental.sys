<script>
    $(function() {

        $(document).on('click', '.ConfirmPayment', function() {

            var message = $(this).data('message');
            var route = $(this).data('route');

            Swal.fire({
                title: 'Are You Sure',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location = route;
                }
            })



        });

















        $(document).on('click', '.terminate_inv', function() {


            var route = $(this).data('route');


            Swal.fire({
                title: 'Terminate Contract?',
                text: "Only contracts that have not been confirmed can be terminated immidiately. Confirmed contracts can take up to 3 months to be terminated. Contact the GWC help desk for more information",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, terminate!'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location = route;
                }
            })

            /**closure****/

        });


    });

</script>
