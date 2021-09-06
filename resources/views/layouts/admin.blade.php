<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AbstraNaut - Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="/css/app.css" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="/assets/img/logo.png" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if (Auth::user())
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/admin/panel">Dashboard</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/admin/faq">Faq</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/post/create">Add post</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" href="/logout">Logout</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>