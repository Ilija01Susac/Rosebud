<html>
<head>
<title></title>
</head>
<body>
  @foreach ($movie->results as $key => $value)
    <li>{{ $value->title }}</li>
  @endforeach
<body>
</html>

https://api.themoviedb.org/3/discover/movie?api_key=
&language=en-US
&sort_by=popularity.desc
&include_adult=false
&include_video=false
&page=1
&primary_release_date.gte=1990-01-01&primary_release_date.lte=1999-12-31
&vote_average.gte=6
&with_genres=28
