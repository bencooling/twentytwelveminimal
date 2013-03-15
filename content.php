<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <h1><?php the_title(); ?></h1>
  <?php the_content('read more'); ?>
  <?php if($post->post_type==='post'): ?>
    <p class="article-meta">
      <span class="user"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php the_author(); ?></a></span>
      <span class="category"><?php the_category(', '); ?></span>
      <?php if(has_tag()): ?><span class="tag"><?php the_tags('',', ',''); ?></span><?php endif; ?>
      <span class="comments"><?php comments_popup_link(get_comments_number( '0 comments', '1 comment', '% comments' )); ?></span>
    </p>
  <?php endif; ?>
</article>