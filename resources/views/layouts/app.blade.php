<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>

<body class="bg-light mx-0 px-0">
    <!-- navigation for the app -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4">
        <div class="container-fluid">
            <a class="navbar-brand text-decoration-none" href="/"><img src="../../images/navbar_brand.png"
                    class="img-fluid" width="30" height="24" alt="letter">Post-app</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- utility navigation -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts') }}">Posts</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <!-- navigation for when a user is logged in -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link logout-btn">Logout</button>
                            </form>
                        </li>
                    @endauth
                    <!-- navigation for when a user is NOT logged in -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <x-footer />
</body>

</html>
<style>
    #uname-style{
        text-decoration: none;
    }
    #uname-style:hover{
        text-decoration: underline;
    }
    /* === sets the width of the rows === */
    .row {
        max-width: 100%;
        margin: 0;
    }

    /* === footer styles for sticky footer ===*/

    /* sets height and position for the whole page */
    html {
        position: relative;
        min-height: 100%;
    }

    /* Margin bottom by footer height */
    body {
        margin-bottom: 80px;
    }

    /* Sets the fixed height of the footer */
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        background-color: #f5f5f5;
    }

    /* =/= */

    /* === links style ===*/

    a {
        text-decoration: none;
        color: #212529;
    }

    a:hover {
        text-decoration: underline;
    }

    /* =/= */

    /* === post-container style ===*/

    .post-container {
        background-color: white;
        border: 2px solid #f8f9fa;
        border-radius: 5px;
    }

    .post-container:hover {
        background-color: #f8f9fa;
    }

    /* =/= */

    /* === pagination style ===*/

    /* class that sets height for the textarea */
    .ta-height {
        height: 200px;
    }

    /* centers the pagination buttons */
    ul.pagination {
        justify-content: center;
    }

    /* =/= */

    /* === style of the logout === */

    .logout-btn {
        border: none;
        background-color: white;
    }

    /* =/= */

    /* === login styles === */

    /* color for the error text set to red */
    .error {
        color: red;
    }

    /* =/= */

</style>
