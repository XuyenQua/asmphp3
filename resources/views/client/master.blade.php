<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('client.layout.head')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    @include('client.layout.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('client.layout.header')
    <!-- Header Section End -->
    
    @yield('content')

    <!-- Footer Section Begin -->
    @include('client.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.layout.jsPluins')


</body>

</html>
