(function ($) {
    "use strict";

    const content_data = $('.video-img-box .content-data');
    const spinner = $('.select-box__spinner');

    $('.select-contract-code').on('change', function () {
        const valueSelected = parseInt( this.value );

        $.ajax({
            url: warranty_page.url,
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

})(jQuery);