<script type="text/javascript">
 var editors = [];

 function createEditor(elementId) {
  return ClassicEditor
   .create(document.querySelector('#' + elementId), {

    toolbar: {
     items: [
      'heading',
      '|',
      'bold',
      'italic',
      'link',
      'bulletedList',
      'numberedList',
      '|',
      'outdent',
      'indent',
      '|',
      'imageUpload',
      'blockQuote',
      'insertTable',
      'mediaEmbed',
      'undo',
      'redo'
     ]
    },
    language: 'en',
    image: {
     toolbar: [
      'imageTextAlternative',
      'imageStyle:full',
      'imageStyle:side'
     ]
    },
    table: {
     contentToolbar: [
      'tableColumn',
      'tableRow',
      'mergeTableCells'
     ]
    },
    licenseKey: '',


   })
   .then(editor => {
    editors[elementId] = editor;
    //editor.setData( data ); // You should set editor data here
   })
   .catch(err => console.error(err));
 }

 $(document).ready(function() {

  @isset($Houses)
   @foreach ($Houses as $data)

    createEditor('ViewDescTextBox{{ $data->hid }}');

   @endforeach
  @endisset

  @isset($LoadCk)
  createEditor('desc_pay');
  @endisset

  @isset($Properties)
   createEditor('HouseDesc');
  @endisset
  @isset($LocPage)
   createEditor('NewLocDesc');
   @isset($Locations)
    @foreach ($Locations as $data)
     createEditor('ViewLocDesc{{ $data->id }}');
    @endforeach
   @endisset

  @endisset
 });

</script>
