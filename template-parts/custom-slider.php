<?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3, 
        'post_status' => 'publish' 
    ));
    foreach( $recent_posts as $post_item ) : 
?>

<div class="sinlge-banner">
    <div class="banner-wrapper">
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_item['ID']), 'full'); ?>
        <div class="banner-bg" style="background-image: url('<?php echo $image[0]; ?>')">
        </div>
        <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
            <h3 class="title" data-animation="fadeInUp" data-delay="0.6s">
                <a href="<?php esc_url(the_permalink($post_item['ID']));?>">
                    <?php echo get_the_title($post_item['ID']); ?>
                </a>
            </h3>
            <ul class="meta" data-animation="fadeInUp" data-delay="0.8s">
                <li>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_item['post_author'])) ); ?>"
                        title="<?php echo esc_attr( the_author_meta( 'display_name', $post_item['post_author']) ); ?>">
                        <?php
                            echo esc_html__( 'By
                            - ', 'tukitwo' ); the_author_meta('display_name', $post_item['post_author']);
                        ?>
                    </a>
                </li>
                <li>
                    <?php
                        $categories = get_the_category($post_item['ID']);
                        $separator = ', ';
                        $result = '';
                        if ($categories) {
                            foreach ($categories as $category) {
                                $result .= '<a href="' . get_category_link($category->term_id) . '">' . $category -> cat_name . '</a>' . $separator ;
                            }
                            echo trim($result, $separator);     
                        }
                    ?>

                </li>
            </ul>
            <p data-animation="fadeInUp" data-delay="1s">
                <?php echo get_the_excerpt($post_item['ID']);?>
            </p>
            <a href="<?php esc_url(the_permalink($post_item['ID']));?>" class="read-more" data-animation="fadeInUp"
                data-delay="1.2s">
                <?php echo esc_html__( 'Read More', 'tukitwo' ); ?> <i class="fas fa-long-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
<?php endforeach; ?>