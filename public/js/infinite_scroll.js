$(document).ready(function () {
    let page = 1;
    const perPage = 30;

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            page++;
            loadMoreProducts(page);
        }
    });

    function loadMoreProducts(page) {
        $.ajax({
            url: '/load_more_products',
            method: 'GET',
            data: {
                page: page,
                search: $('input[name="search"]').val(),
                min_price: $('#min-price').text(),
                max_price: $('#max-price').text(),
                selectedRegions: $('.dropdown-item input[type="checkbox"]:checked').map(function () {
                    return $(this).closest('.dropdown-item').data('region');
                }).get()
            },
            success: function (response) {
                if (response && response.trim() !== '') {
                    $('#product-container').append(response);
                    console.log(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
