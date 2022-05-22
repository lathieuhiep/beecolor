( function( $ ) {
    "use strict";

    const body = $('body');

    $( document ).ready( function () {
        const body = $('body');

        // event product popup
        body.on('click', '.item-product-popup', function () {
            const item = $(this);
            const product_item = $('.element-product-popup .item-post');
            const product_id = item.data('product-id');

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
        body.on('click', '.view-project', function (event) {
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
        body.on('click', '.view-post', function (event) {
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

        // event search warranty
        $('.search-warranty').on('submit', function (event) {
            const phoneCode = $(this).find('.phone-code');
            const gRecaptcha = $(this).find('.g-recaptcha');
            const valPhoneCode = phoneCode.val();
            const gRecaptchaVal = grecaptcha.getResponse();

            $(this).find('.error').remove();

            if ( valPhoneCode === '' ) {
                phoneCode.after('<p class="error">Bạn chưa nhập số điện thoại hoặc mã đơn hàng</p>');
            } else if ( gRecaptchaVal === '' ) {
                gRecaptcha.after('<p class="error">Hãy xác nhận CAPTCHA</p>');
            } else {
                const formData = {
                    action: 'beecolor_search_warranty',
                    phone_code: valPhoneCode
                };

                const action_box = $(this).find('.action-box');

                phoneCode.attr('readonly', true);

                action_box.append('<div class="spinner-box"><div class="spinner-border text-dark" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                $.ajax({
                    url: beecolor_landing_page.url,
                    type: 'POST',
                    data: formData,

                    success: function (data) {
                        if (data) {
                            body.append(data);
                        }
                    },

                    complete: function () {
                        const modalToggle = body.find('#modal-search-warranty');
                        modalToggle.modal("show");

                        eventShowProductPopup('modal-search-warranty');
                        eventHideProductPopup('modal-search-warranty');
                        phoneCode.attr('readonly', false);
                        action_box.find('.spinner-box').remove();
                    }
                });

            }

            event.preventDefault();

        });

        // warranty select
        body.on('change', '.select-contract-code', function () {
            const content_data = $('.video-img-box .content-data');
            const spinner = $('.select-box__spinner');
            const valueSelected = parseInt( this.value );

            $.ajax({
                url: beecolor_landing_page.url,
                type: 'POST',
                data: ({
                    action: 'beecolor_warranty_load_video_image',
                    id: valueSelected
                }),

                beforeSend: function () {
                    content_data.empty();
                    spinner.addClass('active');
                },

                success: function (data) {
                    if ( data ) {
                        content_data.append(data);
                        $('#imageGallery').lightSlider({
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
                    }
                },

                complete: function () {
                    spinner.removeClass('active');
                }
            });
        })

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