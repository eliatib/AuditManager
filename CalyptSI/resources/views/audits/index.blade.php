@extends('layouts.nav')

@section('title')

<title>CalyptSI - Audits</title>

@endsection


@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/sc-1.5.0/sl-1.2.6/datatables.min.css"/>

<link rel="stylesheet" href="/css/table.css">

@endsection


@section('content')
 
<div style="padding:2px;">
    <button type="button" id="button1" class="btn btn-default btn-secondary" onclick="window.location.href='{{ route('audits.create')}}'">Nouvel Audit</button>     
    <table id="table" class="table" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Dossier</th>
          <th scope="col">Nom</th>
          <th scope="col">Entreprise</th>
          <th scope="col">Date de création</th>
          <th scope="col">mise a jour</th>
          <th scope="col">éditer</th>
        </tr>
      </thead>
      <tbody>
       @foreach($audits as $audit)
        <tr>
          <th scope="row"><a class="navbar-brand" href="{{ route('audits.show', $audit->id) }}"><img src="/images/open_folder.jpg" alt="Folder"/></a></th>
          <td>{{$audit->name}}</td>
          <td>{{$audit->target->name}}</td>
          <td>{{$audit->created_at->toDayDateTimeString()}}</td>
          <td>{{$audit->updated_at->toDayDateTimeString()}}</td>
          <th scope="row"><a class="navbar-brand" href="{{ route('audits.edit', $audit->id) }}"><img src="/images/audit_edit.png" alt="Edit"/></a></th>
        </tr>
        @endforeach
    </table>
</div>  


@endsection


@section('script')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

<script> /* voir https://datatables.net/ */
$(document).ready( function () {
$('#table').DataTable(
    {
        dom: 
            "<'row'<'col-sm-12 col-md-12'lf>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", 
    });
});
</script>

@endsection