<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('sections.admin.head')

<body class="font-sans antialiased">
    @section('header')

        @include('sections.admin.header')
    @show

  

    @section('message')

        @if (session('message'))
            <div class=" container alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif
    @show

    @section('content-category')


        {{ $slot }}
    @show

    @include('sections.admin.footer')
</body>

</html>
