<style>
    .site-header .navbar-brand {
        font-weight: bold;
        font-size: 35px;
        font-style: italic;
        color: #fff;
        transition: 1s ease-in-out;
    }

    .site-header .navbar-brand:hover {
        color: #e61c5d;
    }

    .site-header ul {
        font-size: 19px;
        font-weight: 300;
    }

    .site-header ul .nav-link {
        color: #fff !important;
        transition: 1s ease-in-out;
    }

    .site-header ul .nav-link:hover {
        color: #ffafaf  !important;
    }
</style>

<header class="site-header" style="padding: 0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{url('/')}}">ZoneTravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('hotels')}}">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/hotels')}}">Hotels</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>