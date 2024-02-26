<?php
/*
Plugin Name: Benjo Abrasado
Description: Display last 10 modified and published blog posts.
Version: 1.0
Author: Benjo
*/

add_action('admin_notices', 'display_last_modified_blog_posts');

function display_last_modified_blog_posts() {

    $args = array(
        'posts_per_page' => 10,
        'orderby'        => 'modified',
        'order'          => 'DESC',
        'post_status'    => 'publish'
    );
    $blog_posts = get_posts($args);

    if ($blog_posts) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p><strong>Last Modified and Published Blog Post Titles</strong></p>
            <ul>
                <?php foreach ($blog_posts as $post) : setup_postdata($post); ?>
                    <li><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html($post->post_title); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }

    wp_reset_postdata();
}
