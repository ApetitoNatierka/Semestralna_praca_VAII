$(function() {
    $("#price-slider").slider({
        range: true,
        min: 0,
        max: 50000,
        values: [0, 50000],
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

    var selectedCategories = $('.dropdown-item input[type="checkbox"]:checked').map(function () {
        return $(this).closest('.dropdown-item').data('category');
    }).get();

    $.ajax({
        url: '/load_more_products',
        method: 'GET',
        data: {
            min_price: minPrice,
            max_price: maxPrice,
            search: searchQuery,
            regions: selectedRegions,
            categories: selectedCategories,
        },
        success: function(response) {
            console.log(response);
            if (response && response.trim() !== '') {
                $('#products-container').replaceWith(response);
            }
        },
        error: function(error) {
            console.error(error);
        }
    });
}
