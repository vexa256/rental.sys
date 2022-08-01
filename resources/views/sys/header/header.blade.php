<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
 <meta http-equiv="X-UA-Compatible" content="ie=edge" />
 <title>Rent MGT Pro |
  @isset($Title)
   {{ $Title }}
  @endisset</title>
 <!-- CSS files -->
 <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />

 <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
 <link href="{{ asset('fonts/css/all.min.css') }}" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{ url('dt/data/datatables.min.css') }}" />
 <link rel="stylesheet" href="{{ url('js/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ url('dist/css/lightbox.min.css') }}">
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
 <style>
  body,
  html,
  tr,
  a,
  table,
  span,
  div,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  tr,
  td,
  th,
  button,
  form,
  input,
  label {
   font-family: Ubuntu, "times new roman", times, roman, serif !important;
  }

  .ck-editor__editable {
   min-height: 200px;
  }

  a {

   text-decoration: none !important;

  }

  html {
   padding-bottom: >=footer height;
  }

  input.es-input {
   padding-right: 20px !important;
   background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAICAYAAADJEc7MAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAG2YAABzjgAA4DIAAIM2AAB5CAAAxgwAADT6AAAgbL5TJ5gAAABGSURBVHjaYvz//z8DOYCJgUzA0tnZidPK8vJyRpw24pLEpwnuVHRFhDQxMDAwMPz//x+OOzo6/iPz8WFGuocqAAAA//8DAD/sORHYg7kaAAAAAElFTkSuQmCC) right center no-repeat
  }

  input.es-input.open {
   -webkit-border-bottom-left-radius: 0;
   -moz-border-radius-bottomleft: 0;
   border-bottom-left-radius: 0;
   -webkit-border-bottom-right-radius: 0;
   -moz-border-radius-bottomright: 0;
   border-bottom-right-radius: 0
  }

  .es-list {
   position: absolute;
   padding: 0;
   margin: 0;
   border: 1px solid #d1d1d1;
   display: none;
   z-index: 1000;
   background: #fff;
   max-height: 160px;
   overflow-y: auto;
   -moz-box-shadow: 0 2px 3px #ccc;
   -webkit-box-shadow: 0 2px 3px #ccc;
   box-shadow: 0 2px 3px #ccc
  }

  .es-list li {
   display: block;
   padding: 5px 10px;
   margin: 0
  }

  .es-list li.selected {
   background: #f3f3f3
  }

  .es-list li[disabled] {
   opacity: .5
  }

td{
    padding : 5px !important;

}
 </style>
</head>

<body class="antialiased">
 <div class="wrapper">
