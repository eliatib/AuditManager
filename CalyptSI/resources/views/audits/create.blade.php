@extends('layouts.nav')

@section('title')
<title>CalyptSI - Création d'audit</title>
@endsection



@section('content')
    @if (Session::has('msg'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('msg')}}
    </div>
    @endif
    <div class="container">
      <div class="py-4">
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Contributeur</span> <!-- Test: définitions des contributeurs ayant accès à l'audit en question-->
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
            </li>
            <li class="list-group-item d-flex justify-content-between">
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Ajout contributeur">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Ajouter</button> <!-- Test: Ajout contributeur-->
              </div>
            </div>
          </form>
        </div>
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Configuration</h4>
          
          <form class="form-sign"  method="POST" action="{{ route('audits.create') }}">
           {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" required>
              </div>
              <div class="col-md-6 mb-3">
               <label for="entreprise">Entreprise</label>
                <input type="text" class="form-control" id="target_id" list="entreprises" name="target_name" autocomplete="off" required>
                 <datalist id="entreprises">
                  @foreach($targets as $target)
                     <option data-value="{{$target->id}}">{{ $target->name }}</option>
                  @endforeach
                  </datalist>
                  <input type="hidden" name="target_id" id="target_id-hidden">
              </div>
            </div>

            <div class="mb-3">
              <label for="proxy">Proxy<span class="text-muted"> (Optionel)</span></label>
              <input type="text" class="form-control" name="proxy" id="proxy">
            </div>

            <div class="mb-3">
              <label for="Information">Information</label>
                  <textarea name='info' class="form-control" id="info"></textarea>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Sauvegarder</button>
        </form>
       </div>
      </div>
    </div>

@endsection


@section('script') <!-- Fonction Js : définis l'identité et l'éxistence d'une entreprise-->
<script>
 $('input[list]').on('input', function(e) {
    var $input = $(e.target),
        $options = $('#' + $input.attr('list') + ' option'),
        $hiddenInput = $('#' + $input.attr('id') + '-hidden'),
        label = $input.val();

    $hiddenInput.val("0");

    for(var i = 0; i < $options.length; i++) {
        var $option = $options.eq(i);

        if($option.text() === label) {
            $hiddenInput.val( $option.attr('data-value') );
            break;
        }
    }
});   
</script>

@endsection