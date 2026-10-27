<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#2563EB">
        <meta name="description" content="{{ config('summit.edition.tagline') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('summit.edition.name') }} {{ config('summit.edition.year') }}">
        <meta property="og:description" content="{{ config('summit.edition.tagline') }}">
        <meta property="og:image" content="{{ asset('og-image.svg') }}">
        <meta name="twitter:card" content="summary_large_image">
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Bebas+Neue&family=Mr+Dafoe&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>
