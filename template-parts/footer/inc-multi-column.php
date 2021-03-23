<?php
//Global variable redux
global $beecolor_options;

$multi_column     =   $beecolor_options ["beecolor_footer_multi_column"];
$multi_column_l   =   $beecolor_options ["beecolor_footer_multi_column_1"];
$multi_column_2   =   $beecolor_options ["beecolor_footer_multi_column_2"];
$multi_column_3   =   $beecolor_options ["beecolor_footer_multi_column_3"];
$multi_column_4   =   $beecolor_options ["beecolor_footer_multi_column_4"];

if( is_active_sidebar( 'beecolor-sidebar-footer-multi-column-1' ) || is_active_sidebar( 'beecolor-sidebar-footer-multi-column-2' ) || is_active_sidebar( 'beecolor-sidebar-footer-multi-column-3' ) || is_active_sidebar( 'beecolor-sidebar-footer-multi-column-4' ) ) :

?>

    <div class="container">
        <div class="row">
            <?php
            for( $i = 0; $i < $multi_column; $i++ ):

                $j = $i +1;

                if ( $i == 0 ) :
                    $beecolor_col = $multi_column_l;
                elseif ( $i == 1 ) :
                    $beecolor_col = $multi_column_2;
                elseif ( $i == 2 ) :
                    $beecolor_col = $multi_column_3;
                else :
                    $beecolor_col = $multi_column_4;
                endif;

                if( is_active_sidebar( 'beecolor-sidebar-footer-multi-column-'.$j ) ):
            ?>

                <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $beecolor_col ); ?>">

                    <?php dynamic_sidebar( 'beecolor-sidebar-footer-multi-column-'.$j ); ?>

                </div>

            <?php
                endif;

            endfor;
            ?>
        </div>
    </div>

<?php endif; ?>
