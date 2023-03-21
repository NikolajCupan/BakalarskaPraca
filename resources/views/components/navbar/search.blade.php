<style>
    .hiddenElement {
        display: none;
    }

    .wideInput {
        width: 500px;
    }

    @media (max-width: 800px) {
        .wideInput {
            width: 350px;
        }
    }

    @media (max-width: 500px) {
        .wideInput {
            width: 100%;
        }
    }
</style>

<nav id="searchNavbar" class="hiddenElement border-bottom navbar-light navbar bg-body-tertiary">
    <div class="container-fluid">
        <div class="mx-auto">
            <form method="GET" action="/shop/product/search" class="d-flex">
                <input id="searchInput" name="term" class="wideInput form-control me-2" type="text" placeholder="Hladat" aria-label="Hladat">
                <button class="btn btn-dark" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
