$(document).ready(function () {
    let page = 1;

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            page++;
            loadMoreProducts(page);
        }
    });

    function loadMoreProducts(page) {
        var selectedCategories = $('.dropdown-item input[type="checkbox"]:checked').map(function () {
            return $(this).closest('.dropdown-item').data('category');
        }).get();

        $.ajax({
            url: '/load_more_products',
            method: 'GET',
            data: {
                page: page,
                search: $('input[name="search"]').val(),
                min_price: $('#min-price').text(),
                max_price: $('#max-price').text(),
                regions: $('.dropdown-item input[type="checkbox"]:checked').map(function () {
                    return $(this).closest('.dropdown-item').data('region');
                }).get(),
                categories: selectedCategories,
            },
            success: function (response) {
                console.log(selectedCategories);
                if (response && response.trim() !== '') {
                    $('#products-container').append(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
