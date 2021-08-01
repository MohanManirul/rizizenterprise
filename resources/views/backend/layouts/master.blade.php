<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Welcome To Admin Panel</title>
  @include('backend.partials.styles')
  
</head>

<body>
  <div class="container-scroller">
    @include('backend.partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('backend.partials.left_sidebar')
      @yield('content')

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('backend.partials.scripts')

</body>

</html>
