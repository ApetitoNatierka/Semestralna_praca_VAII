$(function() {
    $("#price-slider").slider({
        range: true,
        min: 0,
        max: 300000,
        values: [0, 300000],
        slide: function(event, ui) {
            $("#min-price").text(ui.values[0]);
            $("#max-price").text(ui.values[1]);
        },
        stop: function(event, ui) {
            var searchQuery = $('input[name="search"]').val();
            filterProducts(ui.values[0], ui.values[1], searchQuery);
        }
    });
});

function filterProducts(minPrice, maxPrice, searchQuery) {
    $.ajax({
        url: '/products_by_price',
        method: 'GET',
        data: {
            min_price: minPrice,
            max_price: maxPrice,
            search: searchQuery,
        },
        success: function(response) {
            $('#product-container').html(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}
