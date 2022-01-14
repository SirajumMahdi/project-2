<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TukiTwo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<!--widget-comments-->
<div class="post-footer__comment">
    <?php
	// You can start editing here -- including this comment!
	    if ( have_comments() ) :
		    $noonpost_comment_count = get_comments_number();
	    ?>
    <h3 class="comment-title">
        <span><?php echo $noonpost_comment_count . ($noonpost_comment_count === '1' ? ' comment' : ' comments');?></span>
    </h3>
    <?php endif;?>
    <div class="post-footer__comment__detail">
        <?php
		wp_list_comments(
			array(
				'style'      => '',
				'short_ping' => true,
				'callback' => 'tukione_comments'
			)
		);
	?>
    </div>
    <?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		    if ( ! comments_open() ) :
	?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'noonpost' ); ?></p>
    <?php
		endif;
	?>
    <!--Leave-comments-->
    <?php comment_form(array(
		'fields' => array(
			'author' => '<input type="text" placeholder="Name" name="author" id="author"/>',
			'email' => '<input type="email" placeholder="Email" name="email" id="email"/>',
			'url' => '<input type="text" placeholder="Webiste" name="url" id="url"/>',
            'cookies' => ''
		),
		'comment_field' => '<textarea cols="30" rows="5" placeholder="Messages" name="comment" id="comment"></textarea>',
		'class_form' => 'widget-form',
		'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="btn-custom %3$s">%4$s</button>',
		'title_reply' => '<h3 class="comment-title"> <span>Leave a comment</span></h3>',
        'class_submit' => 'btn -normal',
        'label_submit' => 'Submit'
	)); ?>
</div>