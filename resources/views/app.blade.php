<html>
<head>
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        div.next{
            display:none;
        }
    </style>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="container">
    @yield('content')
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('footer')
</body>
</html>