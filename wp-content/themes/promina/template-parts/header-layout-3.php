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
$phone_label = promina_get_opt( 'phone_label' );
$phone_number = promina_get_opt( 'phone_number' );
$phone_result = preg_replace('#[ () ]*#', '', $phone_number);
$email_label = promina_get_opt( 'email_label' );
$email_address = promina_get_opt( 'email_address' );
$time_label = promina_get_opt( 'time_label' );
$time = promina_get_opt( 'time' );

//Top Bar Link1
$top_bar_text1 = promina_get_opt( 'top_bar_text1' );
$top_bar_link_type1 = promina_get_opt( 'top_bar_link_type1', 'page_link' );
$top_bar_page_link1 = promina_get_opt( 'top_bar_page_link1' );
$top_bar_custom_link1 = promina_get_opt( 'top_bar_custom_link1' );

//Top Bar Link2
$top_bar_text2 = promina_get_opt( 'top_bar_text2' );
$top_bar_link_type2 = promina_get_opt( 'top_bar_link_type2', 'page_link' );
$top_bar_page_link2 = promina_get_opt( 'top_bar_page_link2' );
$top_bar_custom_link2 = promina_get_opt( 'top_bar_custom_link2' );

//Top Bar Link3
$top_bar_text3 = promina_get_opt( 'top_bar_text3' );
$top_bar_link_type3 = promina_get_opt( 'top_bar_link_type3', 'page_link' );
$top_bar_page_link3 = promina_get_opt( 'top_bar_page_link3' );
$top_bar_custom_link3 = promina_get_opt( 'top_bar_custom_link3' );
?>
<header id="masthead" class="site-header">
    <div id="site-header-wrap" class="header-layout3 <?php if($sticky_on == 1) { echo 'is-sticky'; } ?>">
        <div class="site-header-top">
            <div class="container">
                <div class="row">
                    <div class="header-top-left">
                        <div class="header-top-left-inner">
                            <?php if(!empty($top_bar_text1)) : ?>
                                <div class="header-top-left-link">
                                    <?php
                                    switch ( $top_bar_link_type1 ) {
                                        case 'custom_link': ?>
                                            <a href="<?php echo wp_kses_post($top_bar_custom_link1); ?>" target="_blank"><?php echo wp_kses_post( $top_bar_text1 ); ?></a>
                                            <?php break;

                                        default: ?>
                                            <a href="<?php echo get_permalink($top_bar_page_link1); ?>" target="_blank"><?php echo wp_kses_post( $top_bar_text1 ); ?></a>
                                            <?php break;
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($top_bar_text2)) : ?>
                                <div class="header-top-left-link">
                                    <?php
                                    switch ( $top_bar_link_type2 ) {
                                        case 'custom_link': ?>
                                            <a href="<?php echo wp_kses_post($top_bar_custom_link2); ?>" target="_blank"><?php echo wp_kses_post( $top_bar_text2 ); ?></a>
                                            <?php break;

                                        default: ?>
                                            <a href="<?php echo get_permalink($top_bar_page_link2); ?>" target="_blank"><?php echo wp_kses_post( $top_bar_text2 ); ?></a>
                                            <?php break;
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($top_bar_text3)) : ?>
                                <div class="header-top-left-link">
                                    <?php
                                    switch ( $top_bar_link_type3 ) {
                                        case 'custom_link': ?>
                                            <a href="<?php echo wp_kses_post($top_bar_custom_link3); ?>" target="_blank"><?php echo wp_kses_post( $top_bar_text3 ); ?></a>
                                            <?php break;

                                        default: ?>
                                            <a href="<?php echo get_permalink($top_bar_page_link3); ?>" target="_blank"><?php echo wp_kses_post( $top_bar_text3 ); ?></a>
                                            <?php break;
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="header-top-right">
                        <div class="site-header-social">
                            <?php promina_social_header(); ?>
                        </div>
                        <div class="site-header-meta">
                            <?php if(!empty($phone_number)) : ?>
                                <div class="header-top-item">
                                    <div class="header-top-item-inner">
                                        <i class="zmdi zmdi-phone"></i>
                                        <label><?php echo esc_html($phone_label); ?></label>
                                        <a href="tel:<?php echo esc_attr($phone_result); ?>"><?php echo esc_html($phone_number); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($email_address)) : ?>
                                <div class="header-top-item">
                                    <div class="header-top-item-inner">
                                        <i class="zmdi zmdi-email"></i>
                                        <label><?php echo esc_html($email_label); ?></label>
                                        <a href="mailto:<?php echo esc_attr($email_address); ?>"><?php echo esc_html($email_address); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($time)) : ?>
                                <div class="header-top-item">
                                    <div class="header-top-item-inner">
                                        <i class="zmdi zmdi-time"></i>
                                        <label><?php echo esc_attr($time_label); ?></label>
                                        <span><?php echo esc_attr($time); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    </div>
                    <div class="site-header-right">
                        <?php if($h_btn_on == 'show') : ?>
                            <div class="site-header-item site-header-button">
                                <a class="btn" href="<?php echo esc_url($h_btn_url); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr($h_btn_text); ?><i class="far fac-arrow-right"></i></a>
                            </div>
                        <?php endif; ?>
                        <?php if($search_on) : ?>
                            <div class="site-header-item site-header-search">
                                <span class="h-btn-search"><i class="fa fa-search"></i></span>
                            </div>
                        <?php endif; ?>
                    </div>
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