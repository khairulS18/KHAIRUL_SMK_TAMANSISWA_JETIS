<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In - Gaming Portal</title>
    <link rel="stylesheet" href="{{ asset("template-gui/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("template-gui/css/style.css") }}">
  </head>
  <body>
   
   <main>
      <section class="login">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-5 col-md-6">
                  <h1 class="text-center mb-4">Gaming Portal</h1>
                  <div class="card card-default">
                     <div class="card-body">
                        <h3 class="mb-3">Sign In</h3>
                        
                        <form action="{{ route('singin.store') }}" method="post">
                           @csrf 
                           <!-- s: input -->
                           <div class="form-group my-3">
                              <label for="username" class="mb-1 text-muted">Username</label>
                              <input type="text" id="username" name="username" value="" class="form-control" autofocus />
                           </div> 

                           <!-- s: input -->
                           <div class="form-group my-3">
                              <label for="password" class="mb-1 text-muted">Password</label>
                              <input type="password" id="password" name="password" value="" class="form-control" />
                           </div>
                           
                           <div class="mt-4 row">
                              <div class="col">
                                 <button type="submit" class="btn btn-primary w-100">Sign In</button>
                              </div>
                              <div class="col">
                                 <a href="{{ route('signup.index') }}" class="btn btn-danger w-100">Sign up</a>
                              </div>
                              
                           </div>
                        </form>

                     </div>
                  </div> 
               </div>
            </div>
         </div>
      </section>
   </main>

    <script src="{{ asset("template-gui/js/bootstrap.js") }}"></script>
    <script src="{{ asset("template-gui/js/popper.js") }}"></script>
  </body>
</html>