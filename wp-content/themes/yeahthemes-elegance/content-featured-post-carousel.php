<?php
/**
 * @package yeahthemes
 */
 
	$format = get_post_format();
	
	if( false === $format )
		$format = 'standard';
	
	$formats_meta = yt_get_post_formats_meta( get_the_ID());
	
	$extra_class = 'large ';
	
	YT_Post_Helpers::$featured_post_counter++;
	$extra_class .= YT_Post_Helpers::$featured_post_counter % 2 == 0 ? "even" : "odd";
?>
<?php 
/**
 * Standard format
 ******************************************************************
 */
?>
<article id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class( esc_attr( $extra_class ) ); ?> <?php yt_post_atts();?>>

	<?php do_action( 'yt_before_hero_post_entry_header' );?>

	<header class="entry-header">

		<?php do_action( 'yt_hero_post_entry_header_start' );?>

		<?php the_title( sprintf( '<h2 class="entry-title secondary-2-primary"><a href="%s" rel="bookmark" title="%s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h2>' ); ?>
		
		<?php if( !is_search() && 'hide' !== yt_get_options( 'blog_post_meta_info_mode' )): ?>
		<div class="entry-meta hidden-print">
			<?php if( function_exists( 'yt_post_meta_description' ))
				yt_post_meta_description(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php do_action( 'yt_hero_post_entry_header_end' );?>

	</header><!-- .entry-header -->

	<?php do_action( 'yt_before_hero_post_entry_content' );?>
	
	
	<div class="entry-content">		

		<?php do_action( 'yt_hero_post_entry_content_start' );?>

		<?php the_excerpt(); ?>
		
		<?php do_action( 'yt_hero_post_entry_content_end' );?>

	</div><!-- .entry-content -->

	
	<footer class="entry-meta clearfix">
		<?php if ( current_user_can('edit_post', get_the_ID()) ) {?>
			<?php edit_post_link( esc_html__( '—Edit—', 'yeahthemes' ), '<span class="edit-link">', '</span>' ); ?>
		<?php }?>
	</footer><!-- .entry-meta -->
	
	<?php do_action( 'yt_after_hero_post_entry_footer' );?>
	
	<?php 
		$thumbnail = wp_get_attachment_url( get_post_thumbnail_id(), 'post-thumbnail' );
		// Support Lazyload plugin
		if ( class_exists( 'LazyLoad_Images' ) ) {
			
			$template = '<div class="wp-post-image" data-lazy-src="%s"></div>';

		}else{
			$template = '<div class="wp-post-image" style="background-image:url(%s);"></div>';
		}
	?>
	<div class="entry-thumbnail">
		
		<a class="post-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>">
            <?php echo !empty( $thumbnail ) ? sprintf( $template, esc_attr( $thumbnail ) ) : '<div class="wp-post-image"></div>' ;?>
        </a>

	</div>
	
</article><!-- #post-<?php the_ID(); ?>## -->