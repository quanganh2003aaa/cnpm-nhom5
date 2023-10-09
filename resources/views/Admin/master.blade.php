<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Closet Collection - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('Admin.layouts.css')

</head>

<body>

  @include('Admin.layouts.header')

  @include('Admin.layouts.sidebar')

  <main id="main" class="main">

    @yield('contents')

  </main><!-- End #main -->

  @include('Admin.layouts.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('Admin.layouts.js')
</body>

</html>
