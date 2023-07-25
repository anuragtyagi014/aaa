<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = promina_get_opt( 'sticky_on', false );
$search_on = promina_get_opt( 'search_on', false );
$h_phone = promina_get_opt( 'h_phone', '' );
$phone_result = preg_replace('#[ () ]*#', '', $h_phone);
$h_btn_on = promina_get_opt( 'h_btn_on', 'hide' );
$h_btn_text = promina_get_opt( 'h_btn_text' );
$h_btn_link_type = promina_get_opt( 'h_btn_link_type', 'page' );
$h_btn_link = promina_get_opt( 'h_btn_link' );
$h_btn_link_custom = promina_get_opt( 'h_btn_link_custom' );
$h_btn_target = promina_get_opt( 'h_btn_target', '_self' );
if($h_btn_link_type == 'page') {
    $h_btn_url = get_permalink($h_btn_link);
} else {
    $h_btn_url = $h_btn_link_custom;
}
?>
<header id="masthead" class="site-header">
    <div id="site-header-wrap" class="header-layout1 <?php if($sticky_on == 1) { echo 'is-sticky'; } ?>">
        <div id="site-header" class="site-header-main">
            <div class="container">
                <div class="row">
                    <div class="site-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="site-navigation">
                        <nav class="main-navigation">
                            <?php get_template_part( 'template-parts/header-menu' ); ?>
                        </nav>
                        <?php if($h_btn_on == 'show') : ?>
                            <div class="site-header-item site-header-button">
                                <a class="btn" href="<?php echo esc_url($h_btn_url); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr($h_btn_text); ?><i class="far fac-arrow-right"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if($h_phone) : ?>
                        <div class="site-header-right">
                            <div class="site-header-item site-header-phone">
                                <a href="tel:<?php echo esc_attr($phone_result); ?>">
                                    <span class="phone-box"><i class="zmdi zmdi-phone"></i></span>
                                    <span><?php echo esc_attr($h_phone); ?></span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div id="main-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>