@extends('layout.layout')

@section('content')

    <script type="module">
        $(window).on('load', function() {
            let product = {!! json_encode($product) !!};
            if (product.date_sale_end != null)
            {
                $('#onLoadModal').modal('show');

                // Disable input fields
                $('#price').attr("disabled", true);
                $('#idCategory').attr("disabled", true);
                $('#image').attr("disabled", true);
                $('#description').attr("disabled", true);
            }
        });

        $(function () {
            $('[data-bs-toggle="popover"]').popover()
        })
    </script>

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin homePath="/admin/product"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct/>
            </div>

            <div class="col-md-12 col-lg-9">

            <div class="d-xl-flex justify-content-between">
                <h3 class="title">Informacie o predavanom produkte</h3>

                <div class="mb-lg-3 mb-xl-0">
                    <div class="inner">
                        @if (!$product->isSaleOver())
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmEndSaleModal">
                                Ukoncit predaj
                            </button>
                        @endif
                    </div>

                    <div class="inner pb-1">
                        <a href="/admin/product/warehouse/edit/{{$warehouseProduct->id_warehouse_product}}" type="button" class="btn btn-dark ms-2">Skladove informacie</a>
                    </div>
                </div>
            </div>

            <form method="POST" action="/admin/product/shop/update" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="shopProductId" id="shopProductId" value="{{$product->id_product}}">

                <div class="mt-2 mb-5 container border formFrame">
                    <div class="row d-flex justify-content-center">
                        <div class="p-0 col-md-12 col-lg-6">
                            <div class="p-3 pt-md-5 p-lg-5 card-body text-black">
                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="shopProductId" id="shopProductId" placeholder="shopProductId" value="{{$product->id_product}}" disabled>
                                    <label for="shopProductId">ID Produktu</label>
                                </div>

                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="product" id="product" placeholder="product" value="{{$warehouseProduct->product}}" disabled>
                                    <label for="product">Nazov produktu</label>
                                </div>

                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity" value="{{$warehouseProduct->quantity}}" disabled>
                                    <label for="quantity">Pocet kusov produktu</label>
                                </div>

                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="dateSaleStart" id="dateSaleStart" placeholder="dateSaleStart" value="{{$product->date_sale_start}}" disabled>
                                    <label for="dateSaleStart">Predaj od</label>
                                </div>

                                <div class="mb-4 form-group form-floating">
                                    @if (is_null($product->date_sale_end))
                                        <input type="text" class="form-control" name="dateSaleEnd" id="dateSaleEnd" placeholder="dateSaleEnd" value="Produkt je stale predavany" disabled>
                                    @else
                                        <input type="text" class="form-control" name="dateSaleEnd" id="dateSaleEnd" placeholder="dateSaleEnd" value="{{$product->date_sale_end}}" disabled>
                                    @endif
                                    <label for="dateSaleEnd">Predaj do</label>
                                </div>
                            </div>
                        </div>

                        <div class="p-0 col-md-12 col-lg-6">
                            <div class="p-3 p-lg-5 card-body text-black">

                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{old('price') ?? $product->getNewestPrice()->price}}">
                                    <label for="price">Cena <span class="text-danger fw-bold">*</span></label>

                                    @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-4 form-group form-floating">
                                    <select type="text" class="form-select" name="idCategory" id="idCategory">
                                        <option value="">Vyberte kategoriu</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id_category}}" {{ $product->getCategory()->id_category == $category->id_category ? 'selected' : '' }}>{{$category->getDisplayName()}}</option>
                                        @endforeach
                                    </select>
                                    <label for="idCategory" class="form-label">Kategoria <span class="text-danger fw-bold">*</span></label>

                                    @error('idCategory')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="image">Fotka</label>

                                    <a class="svgShowPhoto" href="/admin/product/shop/image/{{$product->id_image}}" target="_blank">
                                        <svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </a>

                                    <svg data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Maximalna velkost: 2 MB</br>Maximalne rozmery: 2048 pixelov</br>Minimalne rozmery: 256 pixelov</br>Povolene formaty: jpg, bmp, png</br>Optimalny pomer stran fotky je 1:1</br>" data-bs-html="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svgPopover bi bi-question-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                </div>

                                <input type="file" class="form-control" name="image" id="image">

                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="p-0 col-12">
                            <div class="p-3 pb-md-5 pt-md-5 pt-lg-0 p-lg-5 card-body text-black">
                                <label class="form-label" for="description">Popis <span class="text-danger fw-bold">*</span></label>
                                <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 200px">{{old('description') ?? $product->description}}</textarea>

                                @error('description')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        @if (!$product->isSaleOver())
                        <div class="p-3 pb-md-5 pt-md-0 pt-lg-0 p-lg-5 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-lg ms-2">Ulozit zmeny</button>
                        </div>
                        @endif
                    </div>
                </div>
            </form>

            <h4 class="mt-5 title">Historia cien</h4>
            <x-table.pricesTable :prices="$prices"/>

            <h4 class="mt-5 title">Objednavky</h4>
            <x-table.productPurchasesTable :purchases="$purchases" :product="$product"/>
        </div>
    </div>

    <!-- Image upload information modal -->
    <div id="onLoadModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upozornenie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Predaj daneho produktu bol uz ukonceny, tym padom nie je mozne vykonavat ziadne zmeny. Nasledujuca stranka sluzi len na informativne ucely.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Rozumiem</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop product end sale confirmation modal -->
    <div class="modal fade" id="confirmEndSaleModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Potvrdenie ukoncenia predaja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ste si isty, ze chcete ukoncit predaj daneho produktu?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Nie</button>
                    <form method="POST" action="/admin/product/shop/endSale/">
                        @csrf
                        <input type="hidden" name="productId" id="productId" value="{{$product->id_product}}">
                        <button type="submit" class="btn btn-danger">Ukoncit predaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
