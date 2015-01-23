<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">MUIFHMCCS</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse navbar-right">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('profile') }}">Profile</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Tools <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Manage Users</a></li>
            <li><a href="#">System Settings</a></li>
          </ul>
        </li>
        <li><a href="#logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>