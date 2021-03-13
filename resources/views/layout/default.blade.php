<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clients Side ♒</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

	{{-- début du div qui instancie vue js avec app--}}

	<div id="app">



 <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Connected</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">

          <router-link to="/home" class="nav-link">Home</router-link>

        </li>
        <li class="nav-item">

          <router-link to="/clients" class="nav-link">Clients</router-link>

        </li>
        <li class="nav-item">
          
          <router-link to="/users" class="nav-link" tabindex="-1" aria-disabled="true">Users</router-link>

        </li>
      </ul>
     
    </div>
  </div>
</nav>

    
    <main>
    	<div class="container">

    		<router-view></router-view>
    		
    	</div>
    </main>


    <footer class="text-muted text-info fixed-bottom">JEHDAI developper &copy; {{ date('Y') }} &hearts;</footer>


  	     

		
	</div>

	{{-- fin du div qui instancie vue js avec app --}}






	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>