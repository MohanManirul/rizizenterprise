<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">
      <span class="menu-title">Dashboard</span></a>
    </li>

          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.enlists') }}">Enlists</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.logos') }}">ManageLogo</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.bgimages') }}">Background Images</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.circleimages') }}">Manage Images</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.footer') }}">About Us</a></li>
         

            <li class="nav-item">
              <a class="nav-link"  href="#district-pages">
                <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
                  @csrf
                  <input type="submit" value="Logout Now" class="btn btn-danger">
                </form>
              </a>

            </li>

          </ul>
        </nav>
        <!-- partial -->