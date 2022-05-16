( function( $ ) {
    "use strict";

    const body = $('body');

    $( document ).ready( function () {
        const body = $('body');

        // event product popup
        $('.item-post__title').on('click', function () {
            const product_item = $('.element-product-popup .item-post');
            const item = $(this).closest('.item-post');
            const product_id = $(this).data('product-id');

            product_item.addClass('pointer-events-none');
            item.append('<div class="spinner-box"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                url: beecolor_landing_page.url,
                type: 'POST',
                data: ({
                    action: 'beecolor_product_popup',
                    product_id: product_id,
                }),

                beforeSend: function () {},

                success: function (data) {
                    if (data) {
                        body.append(data);
                    }
                },

                complete: function () {
                    const modalToggle = body.find('#modal-product-popup');
                    modalToggle.modal("show");

                    eventShowProductPopup();
                    eventHideProductPopup();
                    product_item.removeClass('pointer-events-none');
                    item.find('.spinner-box').remove();
                }
            });
        });

    });

    // function event hide product popup
    const eventHideProductPopup = () => {
        const myModalEl = document.getElementById('modal-product-popup');

        myModalEl.addEventListener('hidden.bs.modal', function (event) {
            body.find('.modal-product-popup').remove();
        })
    }

    // function event show product popup
    const eventShowProductPopup = () => {
        const myModalEl = document.getElementById('modal-product-popup');

        myModalEl.addEventListener('shown.bs.modal', function (event) {
            $('#product-gallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:6,
                slideMargin:0,
                enableDrag: true,
                currentPagerPosition:'left',
                adaptiveHeight:true,
                controls: false
            });
        })
    }

} )( jQuery );