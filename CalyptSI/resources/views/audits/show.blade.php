@extends('layouts.nav')

@section('title')
<title>CalyptSI - Audits</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/auditShow.css">
@endsection

@section('content')

  
      <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
            <h1 class="pb-3 mb-4 font-italic border-bottom">
            {{$audit->info}}
            </h1>
            </div>
            <div class="blog-post">
            <h2 class="blog-post-title">Scan</h2>
            </div>
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <form class="p-4 input-group" method="POST" action='/audits/{{ $audit->id }}/notes'>
               {{ csrf_field() }}
                <textarea type="text" id="body" name="body" class="form-control" placeholder="Note"></textarea>
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Ajouter</button>
              </div>
          </form>
        <div id="notes">
        @foreach($audit->notes as $note)
          <div class="p-3 mb-3 note rounded box-shadow">
            <h5 class="font-italic">{{ $note->user->name }} :</h5>
            <p class="mb-0">{{$note->body}}</p>
            <p class="font-italic" style="text-align:right">{{ $note->created_at->diffForHumans() }}</p>
          </div>
        @endforeach
        </div>

        </aside>

      </div>


@endsection


@section('script')
<!-- test chargement en temps réel des notes-->
<script language="javascript" type="text/javascript">

var timeout = setInterval(reloadChat, 5000);    
function reloadChat () {

     $('#notes').load('show.blade.php #notes');
}
</script>
@endsection