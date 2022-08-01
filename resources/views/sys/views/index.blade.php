@include('sys.header.header')
@include('sys.nav.sidebar')
@include('sys.nav.top')

<div class="page-wrapper">

 @include('sys.crumbs.bread')

 <div class="page-body">
  <div class="container-fluid">
   <div class="row">


    <div class="mb-3 row " >

        <div class="btn-group w-100 ">
        @isset($LocPage)
          {!! ProBtn($toggle = 'NewLoc', $labels = 'New Location', $icon = '<i class="fas fa-plus me-2"></i>') !!}
         @endisset

         @isset($NewRoom)
          {!! ProBtn($toggle = 'NewRooms_a', $labels = 'New Room Setup', $icon = '<i class="fas fa-plus me-2"></i>') !!}
         @endisset


         @isset($Properties)
          {!! ProBtn($toggle = 'NewProperty', $labels = 'New Property', $icon = '<i class="fas fa-plus me-2"></i>') !!}
         @endisset


         @isset($TenantsD)
          {!! ProBtn($toggle = 'CreateTenantModal', $labels = 'New Tenant', $icon = '<i class="fas fa-plus me-2"></i>') !!}
         @endisset


       @isset($AppPay)
         {!! ProBtn($toggle = 'DisableModal', $labels = 'Disable Month', $icon = '<i class="fas fa-times me-2"></i>') !!}
       @endisset


     @isset($PayNOw)
       {!! ProBtn($toggle = 'RecordPayment', $labels = 'Record Payment', $icon = '<i class="fas fa-comment-dollar fa-2x me-2"></i>') !!}
     @endisset

     @isset($PayNOw)
     {!! ProBtn2($toggle = 'ReversePayment', $labels = 'Reverse Payment', $icon = '<i class="fas fa-file-invoice-dollar fa-2x me-2"></i>') !!}
   @endisset

   @isset($PayNOw)
       {!! ProBtn($toggle = 'TenantInfo', $labels = 'Tenant Details', $icon = '<i class="fas fa-fingerprint fa-2x me-2"></i>') !!}
     @endisset


     @isset($PayNOw)
       {!! ProBtn2($toggle = 'Payhistory_a', $labels = 'Payment History', $icon = '<i class="fas fa-history fa-2x me-2"></i>') !!}
     @endisset



     @isset($DefShosw)
     {!! ProBtn2($toggle = 'Payments_a', $labels = 'Explain Payments Graph', $icon = '<i class="fas fa-user-check fa-2x me-2"></i>') !!}
   @endisset

 @isset($DefShosw)
     {!! ProBtn2($toggle = 'DefAmounts_a', $labels = 'Explain Defaulters Graph', $icon = '<i class="fas fa-user-times fa-2x me-2"></i>') !!}
   @endisset



   @isset($DefShosw)
     {!! ProBtn2($toggle = 'DefaultersListModal', $labels = 'Defaulters List', $icon = '<i class="fas fa-user-slash fa-2x me-2"></i>') !!}
   @endisset



   @isset($DefShosw)
     {!! ProBtn2($toggle = 'TenantPaymentModal', $labels = 'Tenant Payment List', $icon = '<i class="fas fa-funnel-dollar fa-2x me-2"></i>') !!}
   @endisset


   @isset($Admins)
   {!! ProBtn2($toggle = 'CreateAdmin', $labels = 'New Admin', $icon = '<i class="fas fa-user-plus fa-2x me-2"></i>') !!}
 @endisset










   </div>
   </div>

    @isset($Page)
     @include($Page)
    @endisset


   </div>
  </div>

 </div>


</div>
@include('sys.footer.footer')
