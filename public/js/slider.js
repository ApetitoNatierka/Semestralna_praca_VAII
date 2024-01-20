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
    var selectedRegions = $('.dropdown-item input[type="checkbox"]:checked').map(function () {
        return $(this).closest('.dropdown-item').data('region');
    }).get();

    $.ajax({
        url: '/load_more_products',
        method: 'GET',
        data: {
            min_price: minPrice,
            max_price: maxPrice,
            search: searchQuery,
            selectedRegions: selectedRegions
        },
        success: function(response) {
            console.log(selectedRegions);
            $('#product-container').html(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
}
