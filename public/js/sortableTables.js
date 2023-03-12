function initializeTable(tableClass, sortingOption, currencyColumnIndex) {
    $.fn.dataTable.moment( 'DD.MM.YYYY HH:mm:SS' );

    $('.' + tableClass).DataTable({
        columnDefs: [
            { targets: 'noSort', orderable: false },
            { 'sType': 'currency', 'aTargets': [currencyColumnIndex] }
        ],
        order: sortingOption,
        scrollX: true,

        language: {
            search: "Vyhladat",
            lengthMenu: "Zobraz _MENU_ zaznamov na stranu",
            paginate: {
                "previous": "&#8249;",
                "next": "&#8250;"
            },
            info: "Zobrazene zaznamy _START_ az _END_ z celkovych _TOTAL_ zaznamov",
            infoFiltered: "(vyfiltrovane z _MAX_ zaznamov)",
            zeroRecords: "Ziadne zaznamy",
            infoEmpty: "Zaznamy nie su k dispozicii"
        },

        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]]
    });
}

$(document).on('ready', function () {
    initializeCurrency();

    initializeTable('warehouseProductsTable', [[1, 'asc']]);
    initializeTable('productsTable', [[4, 'desc']]);
    initializeTable('productPurchasesTable', [[5, 'desc']], 3);
    initializeTable('pricesTable', [[1, 'desc']], 3);

    initializeTable('purchasesTable', [[5, 'asc']], 3);
    initializeTable('purchaseProductsTable', [[1, 'asc']], 2);

    initializeTable('usersTable', [[2, 'asc']]);
});

function initializeCurrency()
{
    // This script is needed to make currency sorting working
    // Every table with currency column must be initialized using a following line
    // { 'sType': 'currency', 'aTargets': [x] }
    // where x refers to a column with currency
    jQuery.extend(jQuery.fn.dataTableExt.oSort,{
        "currency-pre": function (a) {
            a = (a === "-") ? 0 : a.replace(/[^\d\-\.]/g, "");
            return parseFloat(a);
        },
        "currency-asc": function (a, b) {
            return a - b;
        },
        "currency-desc": function (a, b) {
            return b - a;
        }
    });
}
