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

        .text {
            color: red;
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
    </style>
</head>

<body>

<h1 class="textCenter">Objednavka cislo {{$purchase->id_purchase}}</h1>
<div class="row">
    <div class="border column">
        <p class="textBold">Dodavatel:</p>
        <p>ahoj</p>
    </div>
    <div class="border column">cba</div>
</div>

</body>

</html>
