<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TukiTwo
 */

?>

<!--====== Post Details Start ======-->
<section class="post-details-area">
    <div class="container container-1000">
        <div class="post-details">
            <div class="entry-header">
                <h2 class="title"><?php the_title(); ?></h2>
                <ul class="post-meta">
                    <li><?php the_date(); ?></li>
                    <li>
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
                <p class="short-desc">
                    <?php the_excerpt(); ?>
                </p>
            </div>
            <div class="entry-media text-center">
                <?php the_post_thumbnail() ?>
            </div>
            <div class="entry-content">
                <?php the_content() ?>
            </div>
            <div class="entry-footer">

                <?php
                        $tags = get_tags();
                        $html = '<div class="post-tags"><span>Tag:</span>';
                        $sep = ', ';
                            foreach ( $tags as $tag ) {
                                $tag_link = get_tag_link( $tag->term_id );                                
                                $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                                $html .= "{$tag->name}</a>" . $sep;
                            }
                        $html .= '</div>';
                        echo trim($html, $sep);   
                    ?>

                <div class="social-share">
                    <span>Share:</span>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fas fa-heart"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>

                <div class="post-author">
                    <div class="author-img">
                        <?php 
                            $author_id=$post->post_author; 
                            if($avatar = get_avatar($author_id)): 
                                echo $avatar; 
                            endif; 
                        ?>
                    </div>
                    <h5><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id)) ); ?>"
                            title="<?php echo esc_attr( the_author_meta( 'display_name', $author_id) ); ?>"><?php the_author_meta('display_name' , $author_id); ?></a>
                    </h5>
                    <p><?php the_author_meta('description' , $author_id); ?></p>
                </div>
            </div>

            <div class="post-nav">
                <div class="prev-post">
                    <?php
                        $prevPost= get_previous_post();
                            if(is_a($prevPost, 'WP_Post')):
                    ?>
                    <a href="<?php echo get_permalink($prevPost->ID); ?>"><i class="far fa-angle-left"></i></a><span
                        class="title">Previous Post</span>
                    <?php endif;?>
                </div>
                <div class="next-post">
                    <?php 
                        $nextPost= get_next_post();
                        if(is_a($nextPost, 'WP_Post')):	 
                    ?>
                    <span class="title">Next Post</span><a href="<?php echo get_permalink($nextPost->ID); ?>"><i
                            class="far fa-angle-right"></i></a>
                    <?php endif;?>
                </div>
            </div>

            <!-- <div class="related-posts">
                <h4 class="related-title">Related Posts</h4>
                <div class="related-loop row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="related-post-box">
                            <div class="thumb">
                                <img src="assets/img/post-details/related-01.jpg" alt="image">
                            </div>
                            <h5 class="title">
                                <a href="#">
                                    The Olivier da Costa restaurant experience in Lisbon
                                </a>
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="related-post-box">
                            <div class="thumb">
                                <img src="assets/img/post-details/related-02.jpg" alt="image">
                            </div>
                            <h5 class="title">
                                <a href="#">
                                    The Olivier da Costa restaurant experience in Lisbon
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

            <div class="comment-template">
                <h4 class="template-title">04 Comments</h4>

                <ul class="comment-list">
                    <li>
                        <div class="comment-body">
                            <div class="comment-author">
                                <img src="assets/img/post-details/comment-01.jpg" alt="image">
                            </div>
                            <div class="comment-content">
                                <h6 class="comment-author">Zhon Andarson</h6>
                                <p>
                                    Coding is used in almost all aspects of life and work now, be it directly or
                                    indirectly.
                                    It’s not just for companies in the tech sector. “An increasing number of businesses
                                    rely
                                    on computer code,
                                </p>
                                <div class="comment-footer">
                                    <span class="date"> 10:35pm, 27 jan 2015.</span>
                                    <a href="#" class="reply-link">Reply</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="comment-body">
                            <div class="comment-author">
                                <img src="assets/img/post-details/comment-02.jpg" alt="image">
                            </div>
                            <div class="comment-content">
                                <h6 class="comment-author">Andro Smith Doe</h6>
                                <p>
                                    Coding is used in almost all aspects of life and work now, be it directly or
                                    indirectly.
                                    It’s not just for companies in the tech sector. “An increasing number of businesses
                                    rely
                                    on computer code,
                                </p>
                                <div class="comment-footer">
                                    <span class="date"> 10:35pm, 27 jan 2015.</span>
                                    <a href="#" class="reply-link">Reply</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <h4 class="template-title">Leave your comment</h4>
                <div class="comment-form">
                    <form action="#">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" placeholder="Enter your name">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Your Email">
                            </div>
                            <div class="col-12">
                                <textarea placeholder="Your message here"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit">Post <i class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
<!--====== Post Details End ======-->