<?php
if( ! function_exists( 'tukione_comments' ) ):
function tukione_comments($comment, $args, $depth) {
?>


<li id="li-comment-<?php comment_ID() ?>">
    <?php if ($comment->comment_approved == '0') : ?>
    <em><?php esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
    <br />
    <?php endif; ?>
    <div class="comment-body">
        <div class="comment-author">
            <?php echo get_avatar($comment,$size='60',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
        </div>
        <div class="comment-content">

            <h6 class="comment-author"><?php echo get_comment_author(); ?></h6>

            <?php comment_text() ?>

            <div class="comment-footer">
                <span class="date">
                    <?php echo get_comment_date('g:ia, j M Y'); ?>
                </span>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply'))) ?>
            </div>
        </div>
    </div>
</li>

<?php
}
endif;