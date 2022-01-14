<?php
if( ! function_exists( 'tukione_comments' ) ):
function tukione_comments($comment, $args, $depth) {
?>

<ul class="widget-comments">
    <div class="comment__item" id="li-comment-<?php comment_ID() ?>">
        <?php if ($comment->comment_approved == '0') : ?>
        <em><?php esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
        <br />
        <?php endif; ?>
        <div class="comment__item__avatar">
            <?php echo get_avatar($comment,$size='90',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
        </div>
        <div class="comment__item__content">
            <div class="comment__item__content__header">
                <h5><?php echo get_comment_author(); ?></h5>
                <div class="data">
                    <p><i class="far fa-clock"></i><?php echo get_comment_date(); ?></p>
                </div>
            </div>

            <?php comment_text() ?>

            <div>
                <span class="link">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply'))) ?>
                </span>
            </div>
        </div>
    </div>
</ul>
<?php
}
endif;