<?php get_header(); ?>

<div class="row">
	<div class="col-md-8">
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

	<div class="col-md-4">
	</div><!-- /.col-md-4 -->
</div><!-- /.row -->

<?php get_footer(); ?>