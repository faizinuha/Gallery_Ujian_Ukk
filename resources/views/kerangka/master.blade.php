<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SnapX Photography</title>
    <!-- Additional CSS Files -->

</head>
<body>

    <body>
        @include('layout.style')
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('layout.app')
                <div class="layout-page">
                    {{-- @include('layout.navbar') --}}
                    <div class="content-wrapper">
                        @yield('content')
                        @include('layout.footer')
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        @include('layout.script')
</body>
</html>
