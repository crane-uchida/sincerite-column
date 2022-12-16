<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
);
}



// テーマディレクトリ内に置いた『feed-rss2.php』を使用する
remove_filter('do_feed_rss2', 'do_feed_rss2', 10);
function custom_feed_rss2(){
  $template_file = '/feed-rss2.php';
  load_template(get_stylesheet_directory() . $template_file);
}
add_action('do_feed_rss2', 'custom_feed_rss2', 10);



// テーマフォルダの画像を短いパスで表示（子テーマ）
function imagepassshort($arg) {
    $content = str_replace('"images/', '"' . get_bloginfo('stylesheet_directory') . '/images/', $arg);
    return $content;
}
add_action('the_content', 'imagepassshort');



?>