<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        @php
            $socialTitle = 'Foremost Consulting Associates';
            $socialDescription = 'Professional audit, accounting, tax and advisory support for stronger organisations.';
            $socialUrl = url()->current();
            $socialImage = url('/brand/foremost-social-card.png?v=20260815');
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#0b4d3b">
        <meta name="description" content="{{ $socialDescription }}">

        <link rel="canonical" href="{{ $socialUrl }}">

        <meta property="og:locale" content="en_NG">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ $socialTitle }}">
        <meta property="og:title" content="{{ $socialTitle }}">
        <meta property="og:description" content="{{ $socialDescription }}">
        <meta property="og:url" content="{{ $socialUrl }}">
        <meta property="og:image" content="{{ $socialImage }}">
        <meta property="og:image:secure_url" content="{{ $socialImage }}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="Foremost Consulting Associates - professional insight for better business decisions">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $socialTitle }}">
        <meta name="twitter:description" content="{{ $socialDescription }}">
        <meta name="twitter:image" content="{{ $socialImage }}">
        <meta name="twitter:image:alt" content="Foremost Consulting Associates - professional insight for better business decisions">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: oklch(1 0 0);
            }

            html.dark {
                background-color: oklch(0.145 0 0);
            }
        </style>

        <link rel="icon" href="/brand/favicon.ico" sizes="any">
        <link rel="icon" href="/brand/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="icon" href="/brand/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="apple-touch-icon" href="/brand/apple-touch-icon.png">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head>
            <title>{{ config('app.name', 'Foremost Consulting Associates') }}</title>
        </x-inertia::head>
    </head>
    <body class="font-sans antialiased">
        <x-inertia::app />
    </body>
</html>
