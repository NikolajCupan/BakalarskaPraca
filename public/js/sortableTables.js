function initializeLanguage(tableClass, sortingOption) {
    $.fn.dataTable.moment( 'DD.MM.YYYY HH:mm:SS' );
    $('.' + tableClass).DataTable({
        columnDefs: [
            { targets: 'noSort', orderable: false }
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

$(document).ready(function () {
    initializeLanguage('warehouseProductsTable', [[1, 'asc']]);
    initializeLanguage('pricesTable', [[1, 'desc']]);
    initializeLanguage('productsTable', [[4, 'desc']]);
    initializeLanguage('productPurchasesTable', [[5, 'desc']]);
    initializeLanguage('userPurchasesTable', [[4, 'desc']]);
    initializeLanguage('purchaseProductsTable', [[0, 'asc']]);
});
