<nav class="navbar navbar-expand-lg sticky-top bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('pages.game.index') }}">Gaming Portal</a>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
     <li><a href="{{ route('pages.manage-game.index') }}" class="nav-link px-2 text-white">Manage Games</a></li>
     <li><a href="profile.html" class="nav-link px-2 text-white">User Profile</a></li>
     <li class="nav-item">
       <a class="nav-link active bg-dark" href="#">Welcome, </a>
     </li> 
     <li class="nav-item">
      <a href="{{ route('singin.index') }}" class="btn bg-white text-primary ms-4">Sign In</a>
     </li>
     {{-- <li class="nav-item">
      <a href="../signin.html" class="btn bg-white text-primary ms-4">Sign Out</a>
     </li> --}}
   </ul> 
  </div>
</nav>