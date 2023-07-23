<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @include('website.includes.style')
</head>
<body>


@include('website.includes.header')


@yield('body')

@include('website.includes.footer')


<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>


@include('website.includes.js')
</body>

</html>
