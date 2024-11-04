$(document).ready(function() {
    let loading = false; 

    // Debounce function to limit the rate at which a function can fire
    function debounce(func, delay) {
        let timeoutId;
        return function(...args) {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            timeoutId = setTimeout(() => {
                func.apply(this, args); 
            }, delay);
        };
    }

    // Function to load more products via AJAX
    const loadMoreProducts = debounce(function () {
        if (loading) return; 
        loading = true; 

        var nextPage = $(this).data('page') || 2; 
        var url = 'webshop?page=' + nextPage; 

        var oldProducts = $('.product'); 
        oldProducts.addClass('exiting'); 

        setTimeout(function() {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    
                    oldProducts.remove();
                    $('.product-grid').append(data.products); 
                    $('#load-more').data('page', nextPage + 1); 
                    $('#previous').show(); 

                    if (!data.hasMore) {
                        $('#load-more').hide(); 
                    }

                    // Reset animation classes for new products
                    var newProducts = $('.product-grid').find('.product');
                    newProducts.removeClass('entering-right entering-right-active'); 
                    
                    // Wait a moment before adding animations to ensure they start correctly
                    setTimeout(function() {
                        newProducts.addClass('entering-right'); // Add animation class
                        setTimeout(function() {
                            newProducts.addClass('entering-right-active'); 
                            loading = false; 
                        }, 50); 
                    }, 50);
                },
                error: function() {
                    console.log('Error loading more products.'); 
                    loading = false;
                }
            });
        }, 50);
    });

    // Event listener for load more button click
    $(document).on('click', '#load-more', loadMoreProducts);

    // Function to load previous products via AJAX
    const loadPreviousProducts = debounce(function() {
        var currentPage = $('#load-more').data('page') - 1;
        var previousPage = currentPage - 1; 
        var url = 'webshop?page=' + previousPage; 

        if (previousPage > 0) {
            var oldProducts = $('.product'); 
            oldProducts.addClass('exiting'); 

            setTimeout(function() {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        
                        oldProducts.remove();
                        $('.product-grid').html(data.products); 
                        $('#load-more').data('page', previousPage + 1); 

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

                        // Reset animation classes for new products
                        var newProducts = $('.product-grid').find('.product');
                        newProducts.removeClass('entering-left entering-left-active'); 
                        
                        
                        setTimeout(function() {
                            newProducts.addClass('entering-left'); 
                            setTimeout(function() {
                                newProducts.addClass('entering-left-active'); 
                            }, 50);
                        }, 50); 
                    },
                    error: function() {
                        console.log('Error loading previous products.'); 
                    }
                });
            }, 50);
        }
    }); 

    // Event listener for previous button click
    $(document).on('click', '#previous', loadPreviousProducts);
});
