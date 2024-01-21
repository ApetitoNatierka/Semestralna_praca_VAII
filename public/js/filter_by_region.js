$(document).ready(function () {
    $('.apply-filter-btn').click(function () {
        filterProducts();
    });
    function filterProducts() {
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
                min_price: $('#min-price').text(),
                max_price: $('#max-price').text(),
                search: $('input[name="search"]').val(),
                regions: selectedRegions,
                categories: selectedCategories,
            },
            success: function (response) {
                console.log(selectedCategories);
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

$(document).ready(function () {
    $('.category-link').click(function () {
        var category = $(this).text().trim().toLowerCase();
        console.log(category);

        $('.dropdown-item input[type="checkbox"]').prop('checked', false);

        $('#' + category + 'DropdownItem input[type="checkbox"]').prop('checked', true);

        filterProducts();
    });
});
