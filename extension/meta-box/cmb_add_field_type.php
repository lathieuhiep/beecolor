<?php

/**
 * Render identity card field
 */
function cmb2_render_identity_card_field_callback($field, $value, $object_id, $object_type, $field_type)
{

    // make sure we specify each part of the value we need.
    $value = wp_parse_args($value, array(
        'id_no' => '',
        'issued_on' => '',
        'issued_by' => '',
    ));

    ?>

    <div class="identity-card-cmb">
        <div class="item">
            <p>
                <label for="<?php echo $field_type->_id('_id_no'); ?>'">
                    <?php esc_html_e('CMND/CCCD', 'beecolor') ?>
                </label>
            </p>

            <?php echo $field_type->input(array(
                'class' => 'cmb_text_small',
                'name' => $field_type->_name('[id_no]'),
                'id' => $field_type->_id('_id_no'),
                'value' => $value['id_no'],
                'desc' => '',
            )); ?>
        </div>

        <div class="item">
            <p>
                <label for="<?php echo $field_type->_id('_issued_on'); ?>'">
                    <?php esc_html_e('Ngày cấp', 'beecolor') ?>
                </label>
            </p>

            <?php echo $field_type->input(array(
                'class' => 'cmb_text_small',
                'name' => $field_type->_name('[issued_on]'),
                'id' => $field_type->_id('_issued_on'),
                'value' => $value['issued_on'],
                'type' => 'date',
                'desc' => '',
            )); ?>
        </div>

        <div class="item">
            <p>
                <label for="<?php echo $field_type->_id('_issued_by'); ?>'">
                    <?php esc_html_e('Nơi cấp', 'beecolor') ?>
                </label>
            </p>

            <?php echo $field_type->input(array(
                'class' => 'cmb_text_small',
                'name' => $field_type->_name('[issued_by]'),
                'id' => $field_type->_id('_issued_by'),
                'value' => $value['issued_by'],
                'desc' => '',
            )); ?>
        </div>
    </div>

    <?php
    echo $field_type->_desc(true);

}

add_filter('cmb2_render_identity_card', 'cmb2_render_identity_card_field_callback', 10, 5);