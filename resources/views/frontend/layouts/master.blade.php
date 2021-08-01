

<!DOCTYPE html>
<html lang="en-us" style="font-size: 36px;">
<head>

    @include('frontend.partials.master_header')
    @include('frontend.partials.custom_css')
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVNRL8D"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<div class="cases">
   
@include('frontend.partials.header')
  </div>
<div class="toptop"></div>

@yield('content')

@include('frontend.partials.footer')
@include('frontend.partials.scripts')
</body>
</html>
