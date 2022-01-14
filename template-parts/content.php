<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TukiTwo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="entry-post">
        <div class="entry-thumbnail">
            <?php the_post_thumbnail('full') ?>
        </div>
        <div class="entry-content">
            <h4 class="title">
                <a href="<?php esc_url(the_permalink()); ?>">
                    <?php the_title(); ?>
                </a>
            </h4>
            <ul class="post-meta">
                <li class="date">
                    <a href="#"><?php the_date() ?></a>
                </li>
                <li class="categories">
                    <?php
                        $categories = get_the_category();
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
            <p>
                <?php the_excerpt() ?>
            </p>
            <a href="blog-details.html" class="read-more">
                <?php echo esc_html__( 'Read More ', 'tukitwo') ?><i class="fas fa-long-arrow-right"></i>
            </a>
        </div>
    </div>


</article><!-- #post-<?php the_ID(); ?> -->