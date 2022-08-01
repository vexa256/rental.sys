<div class="container" id="PrinterScreen">
<div class="card">
<button class="btn btn-primary my-2 float-end shadow-lg col-4"  id="PrinterButton">

    <i class="fas fa-2x fa-print px-2" aria-hidden="true"></i>

    Print</button>
<div class="card-header"  style="font-size: 14px !important">
Rent Payment Reciept For the Tenant  <strong class="mx-2"> {{$slectedTenant}}  </strong> Showing all Months Paid For
<strong class="mx-1">Invoice NO : {{rand(0, 99999)}}</strong>

<span class="float-right mx-1"> <strong class="mx-1">Date of issue: {{date('d-M-Y')}} </strong> </span>

</div>
<div class="card-body " style="font-size: 12px !important">
<div class="row mb-4"  style="font-size: 12px !important">
    <div class="col-2">

        <img src="{{ asset('logo.jpeg') }}" class="img-fluid" >

    </div>
    <div class="col-sm-5">
        <h6 class="mb-3">From: </h6>

        <div>
        <strong>Real Firm Enterprises</strong>
        </div>
        <div>Mbabazi Bernard  : +256 772403898  </div>
        <div>Ayebare Esther   : +256 771850569 | Email: estercollinskaka@gmail.com</div>
        <div>Ruta Mbabazi     : +256 772302137 | Email: rwamungwe@gmail.com</div>


    </div>

    <div class="col-sm-5">
        <h6 class="mb-3">To:</h6>
        <div>
            <strong>Name : {{$Tenants->tenant}}</strong>
        </div>
        <div>Phone: {{$Tenants->Phone}}</div>
        <div>Email: {{$Tenants->Email}}</div>

    </div>



</div>

<div class="table-responsive-sm"  style="font-size: 12px !important">
    <table class="table table-bordered table-striped"  style="font-size: 12px !important">
        <thead  style="font-size: 12px !important">
            <tr  style="font-size: 12px !important">
                <th class="center">Property Name</th>
                <th class="center"> Location</th>
                <th>Property Type</th>
                <th>Month Paid </th>
                <th>Year Paid </th>
                <th>Room No.</th>

                <th class="right">Monthly Rent (UGX)</th>
                <th class="center">Amount Paid (UGX)</th>

            </tr>
        </thead>
        <tbody  style="font-size: 12px !important">
           @isset($Payments)
               @foreach ($Payments as $data)
               <tr  style="font-size: 12px !important">
                <td class="center">{{$data->House}}</td>
                <td class="center">{{$data->Locations}}</td>
                <td class="center">{{$data->SetupName}}</td>
                <td class="center">{{$data->Month}}</td>
                <td class="center">{{$data->Year}}</td>
                <td class="center">{{$data->RoomNo}}</td>
                <td class="center">{{number_format($data->Price_Monthly,2)}}</td>
                <td class="center">{{number_format($data->Amount,2)}}</td>

            </tr>
               @endforeach
           @endisset

        </tbody>
    </table>
</div>


</div>
</div>
</div>
