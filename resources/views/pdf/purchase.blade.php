<!DOCTYPE html>
<html lang="sk">
<head>
    <title>objednavka-cislo-{{$purchase->id_purchase}}</title>
    @php ($basketProducts = $purchase->getBasket()->getBasketProducts())

    <style>
        .column {
            float: left;
            width: 50%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .borderLeft {
            border-left: 1px black dashed;
        }

        .borderRight {
            border-right: 1px black dashed;
        }

        .borderTop {
            border-top: 1px black dashed;
        }

        .borderBottom {
            border-bottom: 1px black dashed;
        }

        .paddingLeft {
            padding-left: 15px;
        }

        .paddingRight {
            padding-right: 15px;
        }

        .paddingTop {
            padding-top: 15px;
        }

        .paddingBottom {
            padding-bottom: 15px;
        }

        .textCenter {
            text-align: center;
        }

        .textBold {
            font-weight: bold;
        }

        .noMargin {
            margin: 0;
        }

        .smallMargin {
            margin: 1px 0 0;
        }

        .emptySpace {
            margin-top: 20px;
        }

        table td {
            padding-left: 10px;
            overflow-wrap: anywhere;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <h1 class="textCenter">Objednavka cislo {{$purchase->id_purchase}}</h1>

    <div class="row">
        <div class="column borderLeft borderTop borderRight borderBottom">
            <div class="paddingLeft paddingTop paddingBottom">
                <p class="textBold smallMargin">Dodavatel:</p>
                <p class="smallMargin">{{\App\Helpers\Constants::COMPANY_NAME}}</p>
                <p class="smallMargin">{{\App\Helpers\Constants::COMPANY_STREET . ' ' . \App\Helpers\Constants::COMPANY_HOUSE_NUMBER}}</p>
                <p class="smallMargin">{{\App\Helpers\Constants::COMPANY_POSTAL_CODE . ' ' . \App\Helpers\Constants::COMPANY_CITY}}</p>

                <!-- Empty space -->
                <div class="emptySpace"></div>

                <p class="smallMargin">ICO: {{\App\Helpers\Constants::COMPANY_ICO}}</p>
                <p class="smallMargin">DIC: {{\App\Helpers\Constants::COMPANY_DIC}}</p>
                <p class="smallMargin">IC DPH: {{\App\Helpers\Constants::COMPANY_IC_DPH}}</p>

                <!-- Empty space -->
                <div class="emptySpace"></div>

                <p class="smallMargin">IBAN: {{\App\Helpers\Constants::COMPANY_IBAN}}</p>
                <p class="smallMargin">Suma: {{$purchase->getTotalPrice()}} &euro;</p>
                <p class="smallMargin">Variabilny symbol: {{\App\Helpers\Helper::addLeadingZeros(10, $purchase->id_purchase)}}</p>
                <p class="smallMargin">Specificky symbol: {{\App\Helpers\Helper::addLeadingZeros(10, $purchase->id_purchase)}}</p>
                <p class="smallMargin">Konstantny symbol: {{\App\Helpers\Constants::CONSTANT_SYMBOL_PURCHASE}}</p>
            </div>
        </div>

        <div class="column borderTop borderBottom borderRight">
            <div class="paddingTop paddingLeft paddingBottom">
                <p class="textBold smallMargin">Odberatel:</p>
                <!-- User might have deleted his account -->
                @if (is_null($user))
                    <p class="smallMargin">[pouzivatel zmazal svoj ucet]</p>
                @else
                    <p class="smallMargin">{{$user->first_name . ' ' . $user->last_name}}</p>
                @endif
                <p class="smallMargin">{{$purchase->getAddress()->street . ' ' . $purchase->getAddress()->house_number}}</p>
                <p class="smallMargin">{{substr_replace($purchase->getAddress()->getCity()->postal_code, " ", 3, 0) . ' ' . $purchase->getAddress()->getCity()->city}}</p>

                <!-- Empty space -->
                <div class="emptySpace"></div>
                <div class="emptySpace"></div>
                <div class="emptySpace"></div>

                <p class="smallMargin">Datum objednavky: {{\App\Helpers\Helper::getFormattedDate($purchase->purchase_date)}}</p>
                <p class="smallMargin">Datum platby: {{\App\Helpers\Helper::getFormattedDate($purchase->payment_date) ?? "neuhradene"}}</p>
            </div>
        </div>
    </div>

    <!-- Empty space -->
    <div class="emptySpace"></div>

    <div class="borderTop borderBottom borderLeft borderRight">
        <div class="paddingTop paddingBottom paddingLeft paddingRight">
            <p class="textBold smallMargin">Produkty:</p>

            <table style="margin-top: 5px; width: 100%">
                <tr>
                    <th style="width: 50%">Produkt</th>
                    <th style="width: 20%">Cena</th>
                    <th style="width: 15%">Kvantita</th>
                    <th style="width: 25%">Celkova cena</th>
                </tr>

                @foreach ($basketProducts as $basketProduct)
                    @php ($price = $basketProduct->getPriceOfDate($purchase->purchase_date)->price)
                    <tr>
                        <td>{{$basketProduct->getProduct()->getWarehouseProduct()->product}}</td>
                        <td>{{$price}} &euro;</td>
                        <td>{{$basketProduct->quantity}}</td>
                        <td>{{number_format($price * $basketProduct->quantity, 2, '.', ' ')}} &euro;</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="3"><strong>Spolu</strong></td>
                    <td colspan="1">{{$purchase->getTotalPrice()}} &euro;</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>
