<?php get_header(); ?>
<?php $term = $wp_query->get_queried_object();?>
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class='col-sm-12'>
      <h1 class="text-center" style="text-transform: capitalize;border-bottom:2px solid black;width:25%;margin:0 auto 30px;">
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
            <p class="small">Posted on: <?php the_time( 'F jS Y' );?></p>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
