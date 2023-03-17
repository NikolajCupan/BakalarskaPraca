@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <script type="text/javascript" src="{{asset('js/numberSelector.js')}}"></script>

    <x-other.flashMessage/>
    <x-navbar.navbarAdmin homePath="/admin/purchase"/>

    <script>
        // Sending necessary data to reclaim product modal
        $(document).on("click", ".productReclaimModalOpen", function() {
            // Product name
            let product = $(this).data('product');
            $(".modal-body #modalProduct").attr('placeholder', product);

            // Product quantity
            let quantity = $(this).data('product-quantity');
            $(".modal-body #modalProductQuantity").attr('placeholder', quantity);

            // Product ID (necessary in back-end)
            let productId = $(this).data('product-id');
            $('#reclaimedProductId').val(productId);
        });
    </script>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminPurchase/>
            </div>
            <div class="col-md-12 col-lg-9">
                <h3 class="title">Objednavka cislo {{$purchase->id_purchase}}</h3>

                <div class="d-inline-block">
                    @if (!$purchase->hasStatus('cancelled'))
                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#cancelPurchaseModal">Zrusit objednavku</button>
                        <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#setPurchaseStatusModal">Nastavit status</button>
                        <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#setPaymentDateModal">Nastavit datum platby</button>
                    @elseif ($purchase->getBasket()->getVariousProductsCount() == 0)
                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#destroyPurchaseModal">Zmazat</button>
                    @endif

                    <form class="d-inline-block" action="/pdf/purchase" method="POST" target="_blank">
                        @csrf
                        <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-dark mb-2">Otvorit PDF</button>
                    </form>
                </div>

                <x-shop.purchaseInformation :purchase="$purchase"/>

                <h3 class="mt-5 title">Informacie o pouzivatelovi</h3>
                <!-- User might have deleted his account -->
                @if (is_null($user))
                    <p class="text-danger">Pouzivatel zmazal svoj ucet</p>
                @else
                    <x-table.usersTable :users="$user"/>
                @endif

                <h3 class="mt-5 title">Objednane produkty</h3>
                <x-table.purchaseProductsTable :purchaseDate="$purchase->purchase_date"
                                               :basketProducts="$purchase->getBasket()->getBasketProducts()"
                                               path="/admin/product/shop/show/"
                                               withReclaimButton="true"
                                               :purchaseStatus="$purchase->getStatus()->status"/>
            </div>
        </div>
    </div>

    <!-- Cancel purchase -->
    <div class="modal fade" id="cancelPurchaseModal" tabindex="-1" aria-labelledby="cancelPurchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelPurchaseModalLabel">Zrusit objednavku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ste si isty, ze chcete zrusit objednavku? Vsetky objednane produkty budu vratene na sklad.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Nie</button>
                    <form method="POST" action="/admin/purchase/cancelPurchase/">
                        @csrf
                        <input type="hidden" name="cancelledPurchaseId" id="cancelledPurchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-danger">Zrusit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Set purchase status modal -->
    <div class="modal fade" id="setPurchaseStatusModal" tabindex="-1" aria-labelledby="setPurchaseStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="setPurchaseStatusModalLabel">Nastavit status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="/admin/purchase/modifyPurchaseStatus">
                    @csrf

                    <input type="hidden" name="currentPurchaseStatus" id="currentPurchaseStatus" value="{{$purchase->getStatus()->status}}"/>
                    <input type="hidden" name="purchaseId" id="purchaseId" value="{{$purchase->id_purchase}}"/>

                    <div class="modal-body">
                        @foreach ($purchaseStatuses as $purchaseStatus)
                            <!-- Do not show radio for cancelled status -->
                            @if ($purchaseStatus->status != 'cancelled')
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{$purchaseStatus->status}}" name="flexRadioStatus" id="{{$purchaseStatus->status}}"
                                        {{$purchase->hasStatus($purchaseStatus->status) ? "checked" : ""}}>
                                    <label class="form-check-label" for="{{$purchaseStatus->status}}">
                                        {{$purchaseStatus->getSlovakStatusName()}}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrusit</button>
                        <button type="submit" class="btn btn-dark">Potvrdit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Set purchase payment date modal -->
    <div class="modal fade" id="setPaymentDateModal" tabindex="-1" aria-labelledby="setPaymentDateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="setPaymentDateModalLabel">Nastavit datum platby</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="/admin/purchase/modifyPurchasePaymentDate">
                    @csrf

                    <input type="hidden" name="modifiedPurchaseId" id="modifiedPurchaseId" value="{{$purchase->id_purchase}}"/>

                    <div class="modal-body">
                        <p class="mb-1">Aktualny datum platby</p>
                        <input type="text" class="form-control" name="currentPaymentDate" id="currentPaymentDate" placeholder="currentPaymentDate" value="{{\App\Helpers\Helper::getFormattedDate($purchase->payment_date) ?? "nezadany"}}" disabled>

                        <div class="form-group">
                            <p class="mb-0 mt-4">Novy datum platby</p>
                            <p class="mb-1 text-muted" style="font-size: 13px">(ak chcete zmazat aktualny datum platby, nechajte pole prazdne)</p>
                            <input type="text" class="form-control dateInputFlatpickr" name="newPaymentDate" id="newPaymentDate" placeholder="DD.MM.RRRR HH:MM:SS">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrusit</button>
                        <button type="submit" class="btn btn-dark">Potvrdit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script must be placed underneath the date input field -->
    <script type="text/javascript" src="{{asset('js/flatpickr.js')}}"></script>

    <!-- Product reclaim modal -->
    <div class="modal fade" id="productReclaimModal" tabindex="-1" aria-labelledby="productReclaimModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="productReclaimModalLabel">Reklamovat produkt</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="/admin/purchase/productReclaim">
                    @csrf

                    <input type="hidden" id="reclaimedProductId" name="reclaimedProductId" value=""/>
                    <input type="hidden" id="reclaimedPurchaseId" name="reclaimedPurchaseId" value={{$purchase->id_purchase}}/>

                    <div class="modal-body">
                        <p class="mb-1">Produkt</p>
                        <input id="modalProduct" class="form-control" type="text" placeholder="" aria-label="disabled input" disabled>

                        <p class="mt-4 mb-1">Kvantita</p>
                        <input id="modalProductQuantity" class="form-control" type="text" placeholder="" aria-label="disabled input" disabled>

                        <p class="mt-4 mb-1">Pocet reklamovanych kusov</p>
                        <x-shop.elements.numberSelector/>

                        <div class="mt-4 mb-1 form-check">
                            <input class="form-check-input" type="checkbox" value="checkboxReturnToWarehouse" id="checkboxReturnToWarehouse" name="checkboxReturnToWarehouse" checked>
                            <label class="form-check-label" for="checkboxReturnToWarehouse">
                                Vratit reklamovany tovar naspat do skladu
                            </label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrusit</button>
                        <button type="submit" class="btn btn-dark">Potvrdit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Must be placed after modal -->
    <script>
        $('#setPurchaseStatusModal').on('hidden.bs.modal', function() {
            // Get current (one stored in database) radio
            let currentPurchaseStatusName = $('#currentPurchaseStatus').val();
            let currentPurchaseStatus = $('#' + currentPurchaseStatusName);

            // Uncheck newly selected radio
            let selectedPurchaseStatus = $('input[name="flexRadioStatus"]:checked');
            selectedPurchaseStatus.removeAttr("checked");

            // Check current (one stored in database) radio
            currentPurchaseStatus.prop("checked", true);
        });

        $('#productReclaimModal').on('hidden.bs.modal', function() {
            // Make checkbox checked
            $('#checkboxReturnToWarehouse').prop('checked', true);

            // Set number selector value to 1
            $('#quantityValue').val(1);
        });
    </script>

    <!-- Destroy purchase modal -->
    <div class="modal fade" id="destroyPurchaseModal" tabindex="-1" aria-labelledby="destroyPurchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="destroyPurchaseModalLabel">Zmazat objednavku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ste si isty, ze chcete zmazat objednavku? Akciu nie je mozne vratit.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Nie</button>
                    <form action="/admin/purchase/destroyPurchase" method="POST">
                        @csrf
                        <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-danger mb-2">Zmazat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <x-footer.footer/>
@endsection
