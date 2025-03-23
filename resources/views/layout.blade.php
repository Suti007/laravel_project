<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Laravel Ecommerce | @yield('title', '')</title>

<link href="/img/favicon.ico" rel="SHORTCUT ICON" />

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

@yield('extra-css')
</head>


<body class="@yield('body-class', '')">
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    @yield('extra-js')

</body>

</html>