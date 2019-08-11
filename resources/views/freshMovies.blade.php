<html>
<head>
<title></title>
</head>
<body>
  @foreach ($freshMovies->results as $key => $value)
    <li>{{ $value->title }}</li>
  @endforeach
<body>
</html>
