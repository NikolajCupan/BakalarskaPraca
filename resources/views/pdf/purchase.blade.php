<!DOCTYPE html>
<html lang="sk">
<head>
    <title>objednavka-cislo-{{$purchase->id_purchase}}</title>

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
            border-left: 1px black solid;
        }

        .borderRight {
            border-right: 1px black solid;
        }

        .borderTop {
            border-top: 1px black solid;
        }

        .borderBottom {
            border-bottom: 1px black solid;
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

        <div class="column borderTop borderBottom">
            <div class="paddingTop paddingLeft paddingBottom">
                <p class="textBold smallMargin">Odberatel:</p>
                <p class="smallMargin">{{$user->first_name . ' ' . $user->last_name}}</p>
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
        <div class="borderTop borderLeft borderRight">
            <div class="paddingLeft paddingRight paddingTop">
                <p class="textBold smallMargin">Produkty:</p>

                <table style="margin-top: 5px; width: 100%">
                    <tr>
                        <th>Produkt</th>
                        <th>Cena</th>
                        <th>Kvantita</th>
                        <th>Celkova cena</th>
                    </tr>

                    <tr></tr>
                    @php ($basketProducts = $purchase->getBasket()->getBasketProducts())
                    @foreach ($basketProducts as $basketProduct)

                    @endforeach
                </table>
            </div>
        </div>
    <div class="row">

    </div>

</body>

</html>
