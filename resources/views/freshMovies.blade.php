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
https://api.themoviedb.org/3/movie/popular?api_key=
&language=en-US
&page=1
