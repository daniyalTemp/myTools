<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my tools</title>

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.ico')}}" type="image/x-icon">

    <!--
      - custom css link
    -->
    {{--    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">--}}

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Include Editor style. -->
    <link href="{{asset('assets/css/froala_editor.pkgd.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/datepicker.min.css')}}">

    {{--    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">--}}

    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>


<!--
  - #MAIN
-->

<main>

    @include('tools.sidebar')

    <div class="main-content">
        {{--        @include('back.layout.navbar')--}}

        @yield('content')

    </div>


</main>


<!--
  - custom js link
-->
<script src="{{asset('/assets/js/script.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/froala_editor.pkgd.min.js')}}"></script>

<script src="{{asset('assets/js/datepicker.min.js')}}"></script>
{{--<script src="{{asset('/assets/js/jquery.slim.min.js')}}"></script>--}}
{{--<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>--}}

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    //initialize the editor
    var editor = new FroalaEditor('#text-editor') // => '1/1/2099');

    const picker = datepicker('#birthday')
</script>

</body>

</html>
