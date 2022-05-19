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
            item.append('<div class="spinner-box"><div class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                url: beecolor_landing_page.url,
                type: 'POST',
                data: ({
                    action: 'beecolor_product_popup',
                    product_id: product_id,
                }),

                success: function (data) {
                    if (data) {
                        body.append(data);
                    }
                },

                complete: function () {
                    const modalToggle = body.find('#modal-product-popup');
                    modalToggle.modal("show");

                    eventShowProductPopup('modal-product-popup');
                    eventHideProductPopup('modal-product-popup');
                    product_item.removeClass('pointer-events-none');
                    item.find('.spinner-box').remove();
                }
            });
        });

        // event project popup
        $('.view-project').on('click', function (event) {
            event.preventDefault();

            const item_parent = $('.element-project-popup .item-post');
            const item = $(this).closest('.item-post');
            const id = $(this).data('project-id');

            item_parent.addClass('pointer-events-none');
            item.append('<div class="spinner-box"><div class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                url: beecolor_landing_page.url,
                type: 'POST',
                data: ({
                    action: 'beecolor_project_popup',
                    id: id,
                }),

                success: function (data) {
                    if (data) {
                        body.append(data);
                    }
                },

                complete: function () {
                    const modalToggle = body.find('#modal-project-popup');
                    modalToggle.modal("show");

                    eventShowProductPopup('modal-project-popup');
                    eventHideProductPopup('modal-project-popup');
                    item_parent.removeClass('pointer-events-none');
                    item.find('.spinner-box').remove();
                }
            });
        });

        // event post popup
        $('.view-post').on('click', function (event) {
            event.preventDefault();

            const item_parent = $('.element-post-carousel .item-post');
            const item = $(this).closest('.item-post');
            const id = $(this).data('id');

            item_parent.addClass('pointer-events-none');
            item.append('<div class="spinner-box"><div class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div></div>');

            $.ajax({
                url: beecolor_landing_page.url,
                type: 'POST',
                data: ({
                    action: 'beecolor_post_popup',
                    id: id,
                }),

                success: function (data) {
                    if (data) {
                        body.append(data);
                    }
                },

                complete: function () {
                    const modalToggle = body.find('#modal-post-popup');
                    modalToggle.modal("show");

                    eventShowProductPopup('modal-post-popup');
                    eventHideProductPopup('modal-post-popup');
                    item_parent.removeClass('pointer-events-none');
                    item.find('.spinner-box').remove();
                }
            });
        });

    });

    // function event show product popup
    const eventShowProductPopup = (element) => {
        const myModalEl = document.getElementById(element);
        const productGallery = $('#product-gallery');

        if ( productGallery.length ) {
            myModalEl.addEventListener('shown.bs.modal', function (event) {
                productGallery.lightSlider({
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
    }

    // function event hide product popup
    const eventHideProductPopup = (element) => {
        const myModalEl = document.getElementById(element);

        myModalEl.addEventListener('hidden.bs.modal', function (event) {
            myModalEl.remove();
        })
    }

} )( jQuery );