<?php
$footer_top_column = promina_get_opt( 'footer_top_column', '3' );
$footer_copyright = promina_get_opt( 'footer_copyright' );

$footer_middle_logo = promina_get_opt( 'footer_middle_logo' );
$footer_middle_logo_ov = promina_get_opt( 'footer_middle_logo_ov' );
$footer_middle_about = promina_get_opt( 'footer_middle_about' );

$f_btn_text = promina_get_opt( 'f_btn_text' );
$f_btn_link_type = promina_get_opt( 'f_btn_link_type', 'page' );
$f_btn_link = promina_get_opt( 'f_btn_link' );
$f_btn_link_custom = promina_get_opt( 'f_btn_link_custom' );
$f_btn_target = promina_get_opt( 'f_btn_target', '_self' );
if($f_btn_link_type == 'page') {
    $f_btn_url = get_permalink($f_btn_link);
} else {
    $f_btn_url = $f_btn_link_custom;
}

$phone_label = promina_get_opt( 'phone_label' );
$phone_number = promina_get_opt( 'phone_number' );
$phone_result = preg_replace('#[ () ]*#', '', $phone_number);
$email_label = promina_get_opt( 'email_label' );
$email_address = promina_get_opt( 'email_address' );
$time_label = promina_get_opt( 'time_label' );
$time = promina_get_opt( 'time' );

$f_btn_text = promina_get_opt( 'f_btn_text' );
$f_btn_link_type = promina_get_opt( 'f_btn_link_type', 'page' );
$f_btn_link = promina_get_opt( 'f_btn_link' );
$f_btn_link_custom = promina_get_opt( 'f_btn_link_custom' );
$f_btn_target = promina_get_opt( 'f_btn_target', '_self' );
if($f_btn_link_type == 'page') {
    $f_btn_url = get_permalink($f_btn_link);
} else {
    $f_btn_url = $f_btn_link_custom;
}
?>
<footer id="colophon" class="site-footer footer-layout1 footer-<?php echo esc_attr($footer_top_column); ?>-column">
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <?php promina_footer_top(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <?php if ( has_nav_menu( 'footer-bottom' ) ) : ?>
                    <div class="bottom-menu">
                        <?php
                        $footer_bottom_menu = array(
                            'theme_location' => 'footer-bottom',
                            'container'  => '',
                            'menu_id'    => 'footer-bottom-menu',
                            'menu_class' => 'footer-bottom-menu',
                            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
                            'depth' => 1
                        );
                        wp_nav_menu( $footer_bottom_menu );
                        ?>
                    </div>
                <?php 
                else:
    echo "this is test";
                
                
                endif; ?>
                <div class="bottom-meta">
                    <div class="bottom-copyright">
                        <?php
                        if ($footer_copyright) {
                            echo wp_kses_post($footer_copyright);
                        } else {
                            echo '&copy;'.esc_attr(date("Y")).' Promina. With Love by <a target="_blank" rel="nofollow" href="https://themeforest.net/user/farost/portfolio">Farost</a>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>