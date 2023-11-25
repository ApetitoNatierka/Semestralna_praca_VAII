<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sun-1789653_1280.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles_product.css') }}">
</head>
<body>

<nav class="navbar navbar-dark" aria-label="First navbar example">
    <div class="container-fluid">
        <img src="{{ asset('images/sun-1789653_1280-1.png') }}" alt="BazarSlnko Logo"/>
        <a class="navbar-brand" href="#">BazarSlnko</a>
        <form role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
        <button class="navbar-toggler ms-auto user-icon-button" style="margin-left: 10px;">
            <i class="fas fa-user"></i>
        </button>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample01" style="">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <div id="price-slider"></div>
                    <p>
                        Min cena: <span id="min-price"></span>
                    </p>
                    <p>
                        Max cena: <span id="max-price"></span>
                    </p>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Town</a>
                    <ul class="dropdown-menu">
                        <li><h6 class="dropdown-header">ZÁPAD</h6></li>
                        <li>
                            <a class="dropdown-item">
                                Bratislava
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                Trnava
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                Nitra
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                Trenčín
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li><h6 class="dropdown-header">STRED</h6></li>
                        <li>
                            <a class="dropdown-item">
                                Žilina
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                Banská Bystrica
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li><h6 class="dropdown-header">VÝCHOD</h6></li>
                        <li>
                            <a class="dropdown-item">
                                Prešov
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item">
                                Košice
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="p-5 text-center bg-body-tertiary">
    <div class="container py-5">
        <div class="d-flex flex-column align-items-center">
            <h1 class="text-body-emphasis">Product name</h1>
            <p class="col-lg-8 mx-auto lead">
                Here will be some product description.
            </p>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Ľavý stĺpec s textovými informáciami -->
            <h2>Ďalšie informácie</h2>
            <p>Ďalší text alebo obsah by mohol byť tu.</p>
        </div>
        <div class="col-md-6">
            <div class="gallery">
                <div class="slider">
                    <div class="slide"><img src="{{ asset('images/moto.png') }}" alt="Image 1"/></div>
                    <div class="slide"><img src="{{ asset('images/animal.png') }}" alt="Image 2"></div>
                    <div class="slide"><img src="{{ asset('images/sport.png') }}" alt="Image 3"></div>
                </div>
                <button id="prev">Previous</button>
                <button id="next">Next</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>

