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
              <form action="http://157.230.6.170/admin/logout" method="POST">
                <input type="hidden" name="_token" value="vbsDKFY3gKdOeJGTC4QuszmcxQZL2bX4yyF5cxbP">
                <button type="submit" class="btn btn-danger btn-block">
                                                    <i class="voyager-power"></i>
                                                    Logout
    d
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
	</nav>
</header>
