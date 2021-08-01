@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card card-body">
        <h3>Welcome to your Admin Panel</h3>
        <br>
        <br>
        <p>
          <a href="{!! route('index') !!}" class="btn btn-primary btn-lg" target="_blank">Visit Main Site</a>
        </p>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix text-center">
      &copy; Copyright <strong><span>RIZIZ Enterprise <?php echo date("Y"); ?></span></strong>. All Rights Reserved
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
@endsection
