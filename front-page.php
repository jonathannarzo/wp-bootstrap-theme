<?php get_header(); ?>

<?php if (is_active_sidebar('slider')) dynamic_sidebar('slider'); ?>

<div class="row">
	<?php
		$layout_condition = is_active_sidebar('frontrightsidebar');
		$col_num = ($layout_condition) ? 8 : 12;
	?>
	<div class="col-md-<?php echo $col_num; ?>">
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
		?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php
			endwhile;
		else :
			echo "<p>No content found</p>";
		endif;
		?>
	</div><!-- /.col-md-8 -->

	<?php if ($layout_condition) dynamic_sidebar('frontrightsidebar'); ?>
	
</div><!-- /.row -->

<?php
	if (is_active_sidebar('frontcol1') OR is_active_sidebar('frontcol2') OR is_active_sidebar('frontcol3'))
		get_sidebar('front-bottom');
?>

<?php get_footer(); ?>