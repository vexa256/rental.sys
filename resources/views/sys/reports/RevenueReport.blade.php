<div class="row ">
    <div class="col-md-6 ">
        <div class="card shadow-lg">

            <div class="alert alert-danger">
                <h4 class="h4">
                   Payment statistics for the selected house and year (Figures in UGX)
                </h4>
            </div>

            <div class="card-body  pt-2">
                <h5 class="card-title">

                    The selected house is <span class="text-danger font-weight-bold">
                        {{ $House }}</span>

                </h5>
                <h5 class="card-subtitle mb-2 text-muted ">
                    The selected report year is <span class="text-danger font-weight-bold">
                        {{ $Year }}</span>
                </h5>
                <div class="container">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-6 ">
        <div class="card shadow-lg">

            <div class="alert alert-danger">
                <h4 class="h4">
            Defaulting statistics for the selected house and year (Figures in UGX)
                </h4>
            </div>

            <div class="card-body  pt-2">
                <h5 class="card-title">

                    The selected house is <span class="text-danger font-weight-bold">
                        {{ $House }}</span>

                </h5>
                <h5 class="card-subtitle mb-2 text-muted ">
                    The selected report year is <span class="text-danger font-weight-bold">
                        {{ $Year }}</span>
                </h5>
                <div class="container">
                    {!! $DefChart->container() !!}
                </div>
            </div>
            </div>
        </div>

    </div>
</div>

@include('sys.reports.PaymentsModal')
@include('sys.reports.DefsModal')
@include('sys.reports.TenantPaymentModal')
@include('sys.reports.DefaultersListModal')
