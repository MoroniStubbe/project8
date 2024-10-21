$(document).ready(function(){
    
    $(document).on('click', '#load-more', function () {
        var nextPage = $(this).data('page') || 2;
        var url = 'webshop?page=' + nextPage;

        var oldProducts = $('.product');
        oldProducts.addClass('exiting');

        setTimeout(function () {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    
                    oldProducts.remove();

                    $('.product-grid').append(data.products);
                    $('#load-more').data('page', nextPage + 1);
                    $('#previous').show();

                    // Check for more products
                    if (!data.hasMore) {
                        $('#load-more').hide();
                    }

                    // Reset new products for animation
                    var newProducts = $('.product-grid').find('.product').not('.exiting');

                    newProducts.addClass('entering-right');

                    setTimeout(function () {
                        newProducts.addClass('entering-right-active');
                    }, ); 
                },
                error: function () {
                    console.log('Error loading more products.');
                }
            });
        }, 50); 
    });

    
    $(document).on('click', '#previous', function () {
        var currentPage = $('#load-more').data('page') - 1;
        var previousPage = currentPage - 1;
        var url = 'webshop?page=' + previousPage;

        if (previousPage > 0) {
            var oldProducts = $('.product');
            oldProducts.addClass('exiting');

            setTimeout(function () {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        
                        oldProducts.remove();

                        // replace current products with previous ones
                        $('.product-grid').html(data.products);
                        $('#load-more').data('page', previousPage + 1);

                        // check for more products on new page
                        if (data.hasMore) {
                            $('#load-more').show(); 
                        } else {
                            $('#load-more').hide(); 
                        }

                        if (previousPage === 1) {
                            $('#previous').hide();
                        } else {
                            $('#previous').show();
                        }

                        // Reset new products for animation
                        var newProducts = $('.product-grid').find('.product').not('.exiting');

                        newProducts.addClass('entering-left'); 
                        
                        setTimeout(function () {
                            newProducts.addClass('entering-left-active');
                        },); 
                    },
                    error: function () {
                        console.log('Error loading previous products.');
                    }
                });
            }, 50); 
        }
    });

})