
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="../assets/img//favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @stack('title')
    </title>
    @include('admin.includes.head')
    @yield('style')

</head>

<body class="">
<div class="wrapper ">
    @include('admin.includes.sidebar')
    <div class="main-panel">
        @include('admin.includes.navbar')
        {{-- Content Start --}}
        @yield('content')
        {{-- Content End --}}
    </div>
</div>
    @include('admin.includes.foot')
    @yield('scripts')


</body>

</html>
