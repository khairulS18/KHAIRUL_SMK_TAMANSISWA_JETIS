
<nav class="navbar navbar-expand-lg sticky-top bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('pages.dashboard') }}">Administrator Portal</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        
       <li><a href="{{ route('pages.admin') }}" class="nav-link px-2 text-white">List Admins</a></li>
       <li><a href="{{ route('pages.user') }}" class="nav-link px-2 text-white">List Users</a></li>
       <li class="nav-item">
         <a class="nav-link active bg-dark">Welcome, Administrator</a>
       </li> 
       <li class="nav-item">
        <a href="../signin.html" class="btn bg-white text-primary ms-4">Sign Out</a>
       </li>
     </ul> 
    </div>
  </nav>