<?php
/**
 * Template part for displaying results in search pages
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
    <header class="entry-header">
        <?php //the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php //if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php
			//tukione_posted_on();
			//tukione_posted_by();
			?>
        </div><!-- .entry-meta -->
        <?php //endif; ?>
    </header><!-- .entry-header -->

    <?php //tukione_post_thumbnail(); ?>

    <div class="entry-summary">
        <?php //the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <?php //tukione_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article>
<!-- #post-<?php the_ID(); ?> -->