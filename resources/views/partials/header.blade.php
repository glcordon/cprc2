<header class="col-md-12 sticky navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="display:flex;color:white;background-color:black; height:auto;">
	<div class="col-md-4 display-4">Recidiworx</div>
	<nav class="col-md-8" style="color:white">
		<div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/client">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/client-add">Add New Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/client">View Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/client/{{ \Auth::user()->id }}">My Caseload</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/admin/logout">Log Out</a>
            </li>
        </ul>
        <form action="http://157.230.6.170/admin/logout" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-danger btn-block">
                                              <i class="voyager-power"></i>
                                              Logout
          </button>
      </form>
      </div>
	</nav>
</header>
