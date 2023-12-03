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
            filterProducts(ui.values[0], ui.values[1]);
        }
    });
});

function filterProducts(minPrice, maxPrice) {
    $.ajax({
        url: '/products_by_price',
        method: 'GET',
        data: {
            min_price: minPrice,
            max_price: maxPrice
        },
        success: function(response) {
            $('#product-container').html(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}
