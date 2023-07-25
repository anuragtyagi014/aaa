<?php
$titles = promina_get_page_titles();

$pagetitle = promina_get_opt( 'pagetitle', 'show' );
$breadcrumb = 'off';

$custom_pagetitle = promina_get_page_opt( 'custom_pagetitle', 'themeoption');
if($custom_pagetitle != 'themeoption' && $custom_pagetitle != '' && is_page() || $custom_pagetitle != 'themeoption' && $custom_pagetitle != '' && is_singular('project') || $custom_pagetitle != 'themeoption' && $custom_pagetitle != '' && is_singular('service') ) {
    $pagetitle = $custom_pagetitle;
}
ob_start();
if ( ( is_page() && get_post_meta( get_the_ID(), 'breadcrumb_on', true ) ) || promina_get_opt( 'breadcrumb_on', false ) )
{
    promina_breadcrumb();
    $breadcrumb = 'on';
}else{
    if ( $titles['title'] )
    {
        printf( '<h1 class="page-title">%s</h1>', wp_kses_post($titles['title']) );
    }
}
$titles_html = ob_get_clean();
if(is_404()) {
    return true;
}
if($pagetitle == 'show') : ?>
    <div id="pagetitle" class="page-title">
        <div class="container">
            <div class="page-title-inner breadcrumb-<?php echo esc_attr($breadcrumb)?>">
                <?php printf( '%s', wp_kses_post($titles_html)); ?>
            </div>
        </div>
    </div>
<?php endif; ?>