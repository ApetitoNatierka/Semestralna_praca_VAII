$(function() {
    $("#price-slider").slider({
        range: true,
        min: 0,
        max: 10000,
        values: [0, 10000],
        slide: function(event, ui) {
            $("#min-price").text(ui.values[0]);
            $("#max-price").text(ui.values[1]);
        },
        stop: function(event, ui) {
            // Po zastavení slideru spusťte AJAX požadavek pro filtrování produktů
            filterProducts(ui.values[0], ui.values[1]);
        }
    });
});

function filterProducts(minPrice, maxPrice) {
    // Vytvořte AJAX požadavek na filtrování produktů podle ceny
    $.ajax({
        url: '/products_by_price',
        method: 'GET',
        data: {
            min_price: minPrice,
            max_price: maxPrice
        },
        success: function(response) {
            // Výsledky zpracujte zde (např. aktualizujte obsah stránky)
            //console.log(response);
            $('#product-container').html(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}
