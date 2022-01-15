<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TukiTwo
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="image-boxes-area">
        <div class="container-fluid">
            <div class="">
                <h4 class="page-title">
                    <?php
                        printf( esc_html__( 'Are you looking for: %s', 'noonpost' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h4>
            </div>
        </div>
    </section>
    <section class="post-area no-sidebar">
        <div class="container-fluid">
            <div class="post-area-inner">
                <!-- Search Result Post -->
                <div class="entry-posts two-column masonary-posts row">
                    <?php
                        while(have_posts()):
                            the_post()
                    ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <?php get_template_part('template-parts/content', 'search'); ?>
                    </div>
                    <?php
                        endwhile;
                    ?>
                    <div class="col-12">
                        <div class="text-center">
                            <?php the_posts_pagination(  ); ?>
                            <a href="#" class="load-more-btn">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Post Area End ======-->
</main>

<?php
get_footer();