@extends('layouts.nav')

@section('title')
<title>CalyptSI - Accueil</title>
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
            <button type="button" class="btn btn-default btn-outline-secondary w-100 h-100" onclick="window.location.href='{{ route('tools.index')}}'"><h1>Outils</h1></button>
        </div>
        <div class="card mb-4 box-shadow">
            <button type="button" class="btn btn-default btn-outline-secondary w-100 h-100" onclick="window.location.href='{{ route('audits.index')}}'"><h1>Audits</h1></button>
        </div>
      </div>
    </div>
    
@endsection

