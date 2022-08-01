@isset($Properties)

 <script>
  document.addEventListener("DOMContentLoaded", function() {
   var el;
   window.Choices && (new Choices(el = document.getElementById('select-locations'), {
    classNames: {
     containerInner: el.className,
     input: 'form-control',
     inputCloned: 'form-control-sm',
     listDropdown: 'dropdown-menu',
     itemChoice: 'dropdown-item',
     activeState: 'show',
     selectedState: 'active',
    },
    shouldSort: false,
    searchEnabled: false,
   }));
  });

  document.addEventListener("DOMContentLoaded", function() {
   var el;
   window.Choices && (new Choices(el = document.getElementById('select-rooms'), {
    classNames: {
     containerInner: el.className,
     input: 'form-control',
     inputCloned: 'form-control-sm',
     listDropdown: 'dropdown-menu',
     itemChoice: 'dropdown-item',
     activeState: 'show',
     selectedState: 'active',
    },
    shouldSort: false,
    searchEnabled: false,
   }));
  });

 </script>
@endisset
