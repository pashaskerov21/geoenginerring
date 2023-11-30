<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
    <link rel="icon" href="{{ asset('storage/uploads/settings/' . $settings->favicon) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/3cf65b98ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/index.css') }}">
</head>

<body>

    <button class="scrolltop-btn"><i class="fa-solid fa-chevron-up"></i></button>
