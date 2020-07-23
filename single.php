<?php get_header(); ?>

<div class="container single-template-3">
  <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) : while (have_posts()) : the_post(); global $post;?>
      <article <?php post_class();?>>
        <header class="entry-header"><h1 class="entry-title"><?php the_title();?></h1></header>
        <div class="entry-summary"><?php _e( do_shortcode( '[orbit_excerpt]' ) );?></div>
        <?php
          if (get_post_meta( get_the_ID(), 'Hide Feature', true) != 'yes') { ?>
            <div class="post-thumbnail"><?php _e( do_shortcode( '[orbit_thumbnail size="full"]' ) );?></div>
          <?php }
        ?>

        <div class="entry-content"><?php the_content(); ?></div>
        <div class="author-meta">
            <h5>By <?php the_author();?> | Published on <?php the_date('M j, Y');?> in <?php the_category(", "); ?></h5>
        </div>
        <?php get_template_part( 'partials/comments', 'box');?>
        <?php get_template_part( 'partials/post', 'navigation');?>
      </article>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
