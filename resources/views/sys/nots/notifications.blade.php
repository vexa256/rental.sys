@if ($errors->any())

    <script type="text/javascript">
        Swal.fire({
            title: 'An error occured, try again',
            icon: 'error',
            html: `
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    `,

            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<i class="fas fa-times"></i> Close!',
            confirmButtonAriaLabel: 'Close',

        });

    </script>
@endif

@isset($Status)
         <script type="text/javascript">
        $(function() {

            Swal.fire('Information', '{{ $Status }}', 'success');

        });
     </script>
@endisset
@if (session('status'))

    <script type="text/javascript">
        $(function() {

            Swal.fire('Information', '{{ session('status') }}', 'success');

        });

    </script>

@endif

@if (session('error_a'))

    <script type="text/javascript">
        $(function() {

            Swal.fire('Information', '{{ session('error_a') }}', 'error');

        });

    </script>

@endif


@isset($SelectKyc)
    <script>
        Swal.fire('Select Investment', 'Select the investment whose KYC is to be reviewed', 'success');

    </script>
@endisset


<script type="text/javascript">
    $(function() {
        $(document).on("click", ".deleteConfirm", function() {


            var route = $(this).data('route');
            var msg = $(this).data('msg');


            Swal.fire({
                title: 'Are you sure?',
                text: msg,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location = route;
                }
            });
        });
    });

</script>
