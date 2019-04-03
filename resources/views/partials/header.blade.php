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
                <a class="nav-link" href="/client/{{ \Auth::user()->id }}/my">My Caseload</a>
              @endif
            </li>
            <li class="nav-item">
                @if(\Auth::user())
                  <a class="nav-link" href="#"  data-toggle="modal" data-target="#date_modal">Report</a>
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
<div class="modal fade" id="date_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select Range</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/generate-report" method="POST">
          {{ csrf_field }}
          <label for="note_date">Select Month and Year</label>
          <select name="month" id="month" class="form-control">
            <option value="">Select Month</option>
            {{--  @for($i=1;$i<=12;$i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor  --}}
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08s">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
          <select name="year" id="year" class="form-control">
            <option value="">Select Year</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="save">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
