<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="user-id" content="{{ auth()->user()->id ?? '' }}">

  <title>Social App</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ url('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ url('front/css/blog-post.css') }}" rel="stylesheet">

  <link href="{{ url('css/toastr.min.css') }}" rel="stylesheet">



</head>
<body>