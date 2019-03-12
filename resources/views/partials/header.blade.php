<header class="col-md-12 sticky navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="display:flex;color:white;background-color:black; height:auto;">
	<div class="col-md-4 display-4">Recidiworx</div>
	<nav class="col-md-8" style="color:white">
		<div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/client">Home</a>
          </li>
          <li class="nav-item">
            @if(\Auth::user())
              <a class="nav-link" href="/client-add">Add New Client</a>
            @endif
          </li>
          <li class="nav-item">
            @if(\Auth::user())
              <a class="nav-link" href="/client">View Clients</a>
            @endif
          </li>
          <li class="nav-item">
            @if(\Auth::user())
              <a class="nav-link" href="/client/{{ \Auth::user()->id }}">My Caseload</a>
            @endif
          </li>
        </ul>
         @if(\Auth::user())
        <form action="/admin/logout" method="POST">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger btn-block">
                                              <i class="voyager-power"></i>
                                              Logout
          </button>
      </form>
      @else
      <button type="submit" class="btn btn-success">
        Login
      </button>
      @endif
      </div>
	</nav>
</header>
