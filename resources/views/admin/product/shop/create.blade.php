@extends('layout.layout')

@section('content')

    <script>
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
                <h3 class="title">Novy predavany produkt</h3>
                <p>Nasledujuci formular sluzi na spustenie predaja produktu. Produktu je nutne nastavit cenu, obrazok, kategoriu a popis.
                   Predaj produktu je aktivny od momentu odoslania formulara. Pocas predaja je mozne produktu menit cenu, kategoriu
                   a ukoncit jeho predaj.</p>

                <form method="POST" action="/admin/product/shop/create" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="warehouseProductId" id="warehouseProductId" value="{{$warehouseProduct->id_warehouse_product}}">

                    <div class="mb-5 container border formFrame">
                        <div class="row d-flex justify-content-center">
                            <div class="p-0 col-md-12 col-lg-6">
                                <div class="p-3 pt-md-5 p-lg-5 card-body text-black">
                                    <div class="mb-4 form-group form-floating">
                                        <input type="text" class="form-control" name="product" id="product" placeholder="product" value="{{$warehouseProduct->product}}" disabled>
                                        <label for="product">Nazov produktu</label>
                                    </div>

                                    <div class="mb-4 form-group form-floating">
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity" value="{{$warehouseProduct->quantity}}" disabled>
                                        <label for="quantity">Pocet kusov produktu</label>
                                    </div>
                                </div>
                            </div>

                            <div class="p-0 col-md-12 col-lg-6">
                                <div class="p-3 p-lg-5 card-body text-black">

                                        <div class="mb-4 form-group form-floating">
                                            <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{old('price')}}">
                                            <label for="price">Cena <span class="text-danger fw-bold">*</span></label>

                                            @error('price')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-4 form-group form-floating">
                                            <select type="text" class="form-select" name="idCategory" id="idCategory">
                                                <option value="">Vyberte kategoriu</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id_category}}" {{ old('idCategory') == $category->id_category ? 'selected' : '' }}>{{$category->getDisplayName()}}</option>
                                                @endforeach
                                            </select>
                                            <label for="idCategory" class="form-label">Kategoria <span class="text-danger fw-bold">*</span></label>

                                            @error('idCategory')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="image">Fotka <span class="text-danger fw-bold">*</span></label>
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
                                    <textarea class="form-control" placeholder="description" name="description" id="description" style="height: 200px">{{old('description')}}</textarea>

                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="p-3 pb-md-5 pt-md-0 pt-lg-0 p-lg-5 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-lg ms-2">Spustit predaj</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <x-footer.footer/>
@endsection
