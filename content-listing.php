<?php
/**
 * The default template for displaying listed content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
$classname = (has_post_thumbnail()) ? 'thumbnail' : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <?php // TODO: Full width for post without post thumbnail ?>
  <?php if(has_post_thumbnail()) the_post_thumbnail(); ?>
  <div class="article-content <?php echo $classname; ?>">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php // the_content('read more'); ?>
    <?php the_excerpt(); ?>
  </div>
</article>