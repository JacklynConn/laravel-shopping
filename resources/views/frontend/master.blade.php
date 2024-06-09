<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <!-- @Theme CSS -->
    <link rel="stylesheet" href="{{url('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/news.css')}}">

    <!-- @Bootstrap5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <a href="">
                    <img src="../uploads/{{$Logo[0]->thumbnail}}" width="200px">
                    {{-- <h1>
                        KH FASHION
                    </h1> --}}
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="/">HOME</a>
                </li>
                <li>
                    <a href="/shop">SHOP</a>
                </li>
                <li>
                    <a href="/news">NEWS</a>
                </li>

            </ul>
            <div class="search">
                <form action="/search" method="get">
                    <input type="text"  name="search" class="box" placeholder="SEARCH HERE">
                    <button>
                        <div style="background-image: url({{url('assets/images/search.png')}});
                                    width: 28px;
                                    height: 28px;
                                    background-position: center;
                                    background-size: contain;
                                    background-repeat: no-repeat;
                        "></div>
                    </button>
                </form>
            </div>
        </div>
    </header>

    @yield('main-content')

    <footer>
        <span>
            AllRight Recieved @ 2023
        </span>
    </footer>

</body>

<!-- @Bootstrap5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
