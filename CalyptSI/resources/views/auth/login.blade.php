   @extends('layouts.auth')
   
   @section('title')
   <title>CalyptSI - Connexion</title>
   @endsection
   
   @section('content')
   <div class="sign">
    <form class="form-sign" method="POST" action="{{ route('login') }}">
       {{ csrf_field() }}
       
        <div class="mb-4" style="opacity: 0.731664; color:f5f5f5;">
				<img src="/images/logo_menu.png" alt="Logo_Calypt" />
				<p>Nous protégeons vos actifs</p>
             <h1 class="h3 mb-3 font-weight-normal">Connexion</h1> 
        </div>
        
          <label for="email" class="sr-only">Email address</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Adresse Email" value="{{ old('email') }}" required autofocus>

          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        <br>
        @include('layouts.errors')
    </form>
       
        <h4 class="mb-4" style="opacity: 0.731664; color:f5f5f5;">ou</h4>
        <a href="{{ route('register') }}"><button class="btn btn-lg btn-secondary btn-block" >S'inscrire</button></a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </div>
    @endsection