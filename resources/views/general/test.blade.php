{{-- This file should only be used for testing purposes. If that's not what you came here for, you can shrug it off.  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <x-bs />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<style>

</style>
<body class="d-flex">

    @php
    abort(503);
    @endphp

    <h1 id="area" style="top: 4vh; left: 2vw; z-index: 100; position: fixed "></h1>

    <x-area />
    <x-bs_js />

    <script>
    </script>
</body>

</html>
