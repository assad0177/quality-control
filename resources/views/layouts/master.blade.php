<!DOCTYPE html>
<html  lang="en" class="no-js">
    @include('partials.head')
<body>
    @include('partials.header')

        @yield('content')
    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>
