<!doctype html>
<html lang="en" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Flowtrail UI Navbar</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            daisyui: {
                themes: ["light"],
                darkTheme: "light"
            },
            theme: {
                extend: {},
            },
        }
    </script>
    @stack('css')
</head>

<body class="bg-gray-300">
    @include('Template.Nav')
    <script src="https://kit.fontawesome.com/87bb52e196.js" crossorigin="anonymous"></script>
    @stack('js')
</body>

</html>
