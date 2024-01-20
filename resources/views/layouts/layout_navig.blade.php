<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sun-1789653_1280.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles_navig.css') }}">
</head>
<body>
<nav class="navbar navbar-dark" aria-label="First navbar example">
    <div class="container-fluid">
        <img src="{{ asset('images/sun-1789653_1280-1.png') }}" alt="BazarSlnko Logo"/>
        <a class="navbar-brand" href="/">BazarSlnko</a>
        <form role="search" action="/products_search" method="POST" class="search-form">
            @csrf
            <input class="form-control" type="search" name="search" value="{{ $searchTerm ?? '' }}" placeholder="Search" aria-label="Search">
        </form>
        <!--prevzate z internetu -->
        <button id="notification-button" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894m-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"></path>
            </svg>
        </button>
        <!--prevzate z internetu-->
        <div id="notification-overlay" class="notification-overlay">
            <div class="notification-dialog">
            </div>
        </div>
        @auth
            <a href="/products_user">
                @csrf
                <label class="moje-inzeraty" >Moje inzeráty</label>
            </a>
        @else
            <a href="/sign_in">
                @csrf
                <label class="moje-inzeraty" >Moje inzeráty</label>
            </a>
        @endauth
        @auth
            <a href="/new_product">
                @csrf
                <label class="pridat_inzerat" >Pridať inzerát</label>
            </a>
        @else
            <a href="/sign_in">
                @csrf
                <label class="pridat_inzerat" >Pridať inzerát</label>
            </a>
        @endauth
        @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="navbar-toggler ms-auto user-icon-button" style="margin-left: 10px;">
                    <i class="fas fa-user"></i>
                </button>
            </form>

        @else
            <a class="user" href="/sign_in">
                @csrf
                <button class="navbar-toggler ms-auto user-icon-button" style="margin-left: 10px;">
                    <i class="fas fa-user"></i>
                </button>
            </a>
        @endauth
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
                <li class="nav-item">
                    <a class="nav-link" href="/received_offers">Received Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sent_offers">Sent Offers</a>
                </li>
                <li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Town</a>
                    <ul class="dropdown-menu">
                        <li><h6 class="dropdown-header">ZÁPAD</h6></li>
                        <li>
                            <a id="bratislavaDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Bratislava">
                                Bratislava
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a id="trnavaDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Trnava">
                                Trnava
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a id="nitraDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Nitra">
                                Nitra
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a id="trencinDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Trenčín">
                                Trenčín
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li><h6 class="dropdown-header">STRED</h6></li>
                        <li>
                            <a id="zilinaDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Žilina">
                                Žilina
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a id="banskaBystricaDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Banská Bystrica">
                                Banská Bystrica
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li><h6 class="dropdown-header">VÝCHOD</h6></li>
                        <li>
                            <a id="presovDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Prešov">
                                Prešov
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li>
                            <a id="kosiceDropdownItem" class="dropdown-item" data-toggle="no-dropdown" data-region="Košice">
                                Košice
                                <label class="form-check-label float-end">
                                    <input class="form-check-input slider" type="checkbox">
                                </label>
                            </a>
                        </li>
                        <li class="d-flex justify-content-center">
                            <button class="btn btn-primary apply-filter-btn">Apply</button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('js/notifications.js') }}"></script>
<script src="{{ asset('js/slider.js') }}"></script>
<script src="{{asset('js/gallery.js')}}"></script>
<script src="{{asset('js/filter_by_region.js')}}"></script>

</html>


