@aware(['user'])
@aware(['imagePath'])

<link rel="stylesheet" href="{{asset('css/navbarStyles.css')}}">

<nav class="border-bottom navbar navbar-expand-lg bg-light navbar-light">
    <div class="container">

        <!-- Logo on the left side (always visible) -->
        <a class="navbar-brand" href="/admin/product">
            <img id="eshopLogo" src="{{asset('/images/logo.png')}}" alt="eshopLogo" draggable="false" height="30"/>
        </a>



        <!-- Small screen -->
        <div class="d-lg-none">
            <a type="button" class="btn btn-light btn-lg" href="/" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                </svg>
            </a>
        </div>


        <!-- Big screen -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="navbarButton nav-link mx-2" href="/">Domov</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
