<?php get_header(); ?>
<?php $term = $wp_query->get_queried_object();?>
<div class="container archive-template" style="margin-top: 80px;">
  <div class="row">
    <div class='col-sm-12'>
      <h1 class="text-center term-title">
        <?php _e( $term->name );?>
      </h1>
      <br>
      <?php if (have_posts()) : ?>
      <ul class='orbit-two-grid grid-uno' style='margin-bottom:50px; padding-left: 0;'>
        <?php while (have_posts()) : the_post(); ?>
        <li class="orbit-article-db orbit-list-db" style="border:1px solid #efefef;">
          <div class="grid-uno-feature">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full'); ?></a>
          </div>
          <div class="grid-uno-text">
            <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
            <p><?php the_excerpt();?></p>
            <p class="small"><?php the_time( 'F jS Y' );?></p>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <?php
        global $wp_query;
        if( $wp_query->max_num_pages > 1 ){
          the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => __( 'Previous', 'textdomain' ),
            'next_text' => __( 'Next', 'textdomain' ),
          ) );
        }
      ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
