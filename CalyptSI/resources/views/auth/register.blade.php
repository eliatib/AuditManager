   @extends('layouts.auth')
   
   @section('content')
   <div class="sign">
     <form class="form-sign" method="POST" action="{{ route('register') }}">

            {{ csrf_field() }}

                 <div class="mb-4" style="opacity: 0.731664; color:f5f5f5;">
                    <img src="/images/logo_menu.png" alt="Logo_Calypt" />
                    <p>Nous protégeons vos actifs</p>
                    <h1 class="h3 mb-3 font-weight-normal">Enregistrement</h1>
                </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name='name' class="form-control" placeholder="Name" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                  <input type="email" name='email' class="form-control" placeholder="Email" required>
              </div>
              
              <div class="form-group">
                <label for="password">Password</label>
                  <input type="password" name='password' class="form-control" placeholder="Password" required>
              </div>
              
                <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                  <input type="password" name='password_confirmation' class="form-control" placeholder="Password Confirmation" required>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary">S'enregistrer</button>
              </div>

              @include('layouts.errors')
              
              <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>

        </form>
    </div>
    @endsection