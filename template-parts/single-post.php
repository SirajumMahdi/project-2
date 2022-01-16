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
                            title="<?php echo esc_attr(the_author_meta('display_name', $author_id)); ?>"><?php the_author_meta('display_name' , $author_id); ?></a>
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
                        class="title"><?php echo esc_html__( 'Previous Post', 'tukitwo' )?></span>
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
            <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()):
				comments_template();              
			endif;
		?>
        </div>
</section>
<!--====== Post Details End ======-->