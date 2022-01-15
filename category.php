<?php
/**
 * The template for displaying Category archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TukiTwo
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="image-boxes-area">
        <div class="container-fluid">
            <div class="">
                <?php the_archive_title( '<h4 class="page-title">', '</h4>' ); ?>
            </div>
        </div>
    </section>
    <section class="post-area with-sidebar">
        <div class="container-fluid">
            <div class="post-area-inner">
                <!-- Search Result Post -->
                <div class="entry-posts clearfix masonary-posts row">
                    <?php
                        while(have_posts()):
                            the_post()
                    ?>
                    <div class="col-xl-4 col-sm-6">
                        <?php get_template_part('template-parts/content'); ?>
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
                <!-- Sidebar -->
                <div class="primary-sidebar clearfix">
                    <div class="sidebar-masonary row">
                        <div class="col-lg-12 col-sm-6 widget author-widget">
                            <div class="author-img">
                                <img src="assets/img/sidebar/author.jpg" alt="Post-Author" />
                            </div>
                            <h5 class="widget-title">I am a Bloger</h5>
                            <p>
                                When it comes to creating is a website for your business, an
                                attractive design will only get you far,...
                            </p>
                            <div class="author-signature">
                                <img src="assets/img/sidebar/author-signature.png" alt="Signature" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 widget categories-widget">
                            <h5 class="widget-title">Categoriesr</h5>
                            <div class="categories">
                                <div class="categorie" style="background-image: url(assets/img/sidebar/cat/01.jpg)">
                                    <a href="#"> Business </a>
                                </div>
                                <div class="categorie" style="background-image: url(assets/img/sidebar/cat/02.jpg)">
                                    <a href="#"> Fashion </a>
                                </div>
                                <div class="categorie" style="background-image: url(assets/img/sidebar/cat/03.jpg)">
                                    <a href="#"> Artistic </a>
                                </div>
                                <div class="categorie" style="background-image: url(assets/img/sidebar/cat/04.jpg)">
                                    <a href="#"> Media </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 widget social-widget">
                            <h5 class="widget-title">Subscribe</h5>
                            <div class="social-links">
                                <a href="#"> <i class="fab fa-facebook-f"></i>Facebook </a>
                                <a href="#"> <i class="fab fa-twitter"></i>Twitter </a>
                                <a href="#"> <i class="fab fa-instagram"></i>Instagram </a>
                                <a href="#"> <i class="fab fa-youtube"></i>YouTube </a>
                                <a href="#"> <i class="fab fa-pinterest-p"></i>Pinterest </a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 widget popular-articles">
                            <h5 class="widget-title">Popular Articles</h5>
                            <div class="articles">
                                <div class="article">
                                    <div class="thumb">
                                        <img src="assets/img/sidebar/articles/01.jpg" alt="Image" />
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="blog-details.html">Best Wordpress Theme of 2018</a>
                                        </h6>
                                        <span class="post-date">Audust 23, 2015</span>
                                    </div>
                                </div>
                                <div class="article">
                                    <div class="thumb">
                                        <img src="assets/img/sidebar/articles/02.jpg" alt="Image" />
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="blog-details.html">Dating While Studying Abroad—Maximize Fun
                                                Minimize
                                                Heartbreak</a>
                                        </h6>
                                        <span class="post-date">Audust 23, 2015</span>
                                    </div>
                                </div>
                                <div class="article">
                                    <div class="thumb">
                                        <img src="assets/img/sidebar/articles/03.jpg" alt="Image" />
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="blog-details.html">Nature Photography Best Place Focus</a>
                                        </h6>
                                        <span class="post-date">Audust 23, 2015</span>
                                    </div>
                                </div>
                                <div class="article">
                                    <div class="thumb">
                                        <img src="assets/img/sidebar/articles/04.jpg" alt="Image" />
                                    </div>
                                    <div class="desc">
                                        <h6>
                                            <a href="blog-details.html">Best Wordpress Theme of 2018</a>
                                        </h6>
                                        <span class="post-date">Audust 23, 2015</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 widget ad-widget">
                            <img src="assets/img/sidebar/ad.jpg" alt="Image" />
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