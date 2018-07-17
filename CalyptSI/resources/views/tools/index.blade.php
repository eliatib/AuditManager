@extends('layouts.nav') <!-- Page de choix des outils-->

@section('title')
<title>CalyptSI - Outils</title>
@endsection

@section('content')

 <body>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Bienvenue, {{Auth::user()->name}}</h1>
      <p class="lead"></p>
    </div>
    
    <div class="container">
      <div class="card-deck mb-3 text-center h-50">
        <div class="card mb-4 box-shadow">
            <button type="button" class="btn btn-default btn-outline-secondary w-100 h-100" onclick="window.location.href='{{ route('tools.nmap')}}'"><h1>Nmap</h1></button>
        </div>
        <div class="card mb-4 box-shadow">
            <button type="button" class="btn btn-default btn-outline-secondary w-100 h-100"><h1>SQLmap</h1></button>
        </div>
      </div>
    </div>
    
@endsection


