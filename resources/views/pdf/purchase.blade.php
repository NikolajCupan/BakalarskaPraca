<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Title of the document</title>

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

        .border {
            border: 1px black solid;
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
    </style>
</head>

<body>

    <h1 class="textCenter">Objednavka cislo {{$purchase->id_purchase}}</h1>
    <div class="row">
        <div class="border column">
            <p class="textBold smallMargin">Dodavatel:</p>
            <p class="smallMargin">Nikolaj Cupan</p>
            <p class="smallMargin">Brezova 9</p>
            <p class="smallMargin">010 01 Zilina</p>
            <p class="smallMargin">Slovensko</p>

            <!-- Empty space -->
            <div style="margin-top: 30px"></div>

            <p class="smallMargin">ICO: 12345678</p>
            <p class="smallMargin">DIC: 9876543210</p>
            <p class="smallMargin">IC DPH: SK0123456789</p>
        </div>

        <div class="border column">
            <p class="textBold smallMargin">Odberatel:</p>
            <p class="smallMargin">{{$user->first_name . ' ' . $user->last_name}}</p>
            <p class="smallMargin">{{$purchase->getAddress()->street . ' ' . $purchase->getAddress()->house_number}}</p>
            <p class="smallMargin">{{$purchase->getAddress()->getCity()->postal_code . ' ' . $purchase->getAddress()->getCity()->city}}</p>
            <p class="smallMargin">Slovensko</p>
        </div>
    </div>

</body>

</html>
