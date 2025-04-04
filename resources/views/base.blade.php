<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield("titre") | ZayShop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">

    <style>
        .navbar {
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
        }
        .navbar .nav-link {
            font-weight: 500;
            color: #333;
            transition: color 0.3s;
        }
        .navbar .nav-link:hover {
            color: #28a745;
        }
        .dropdown-menu {
            border-radius: 8px;
            overflow: hidden;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top">
        <div class="container">
            <a class="navbar-brand text-success fw-bold" href="{{ route('produit.index') }}">
                <i class="fa-solid fa-store"></i> ZayShop
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (Auth::check())

                <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('produit.index') }}"><i class="fa-solid fa-box"></i> Produits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categorie.index') }}"><i class="fa-solid fa-tags"></i> Catégories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('commande.index') }}"><i class="fa-solid fa-tags"></i> Commandes</a>
                                </li>
                        </ul>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user-circle"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{route('utilisateur.edit', ['id' => Auth::user()->id])}}"><i class="fa-solid fa-user"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('utilisateur.index') }}"><i class="fa-solid fa-users"></i> Liste des utilisateurs</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fa-solid fa-sign-out-alt"></i> Se déconnecter</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                </div>
            @else
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam ut repellendus nulla pariatur et suscipit obcaecati consectetur. Est pariatur provident error fuga quasi nulla cumque tenetur laboriosam, dolorem natus voluptatum.
            @endif
        </div>
    </nav>
    
    <!-- Contenu -->
    <main class="container py-5">
        @yield("contenue")
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
