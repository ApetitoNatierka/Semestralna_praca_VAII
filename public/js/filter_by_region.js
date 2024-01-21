$(document).ready(function () {
    $('.apply-filter-btn').click(function () {
        filterProducts();
    });
    function filterProducts() {
        var selectedRegions = $('.dropdown-item input[type="checkbox"]:checked').map(function () {
            return $(this).closest('.dropdown-item').data('region');
        }).get();

        $.ajax({
            url: '/load_more_products',
            method: 'GET',
            data: {
                min_price: $('#min-price').text(),
                max_price: $('#max-price').text(),
                search: $('input[name="search"]').val(),
                regions: selectedRegions
            },
            success: function (response) {
                console.log(response);
                if (response && response.trim() !== '') {
                    $('#products-container').replaceWith(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
