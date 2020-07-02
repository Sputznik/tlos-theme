<?php $term = $wp_query->get_queried_object();?>
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class='col-sm-12'>
      <h1 class="text-center" style="text-transform: capitalize;border-bottom:2px solid black;">
        <?php _e( $term->name );?>
      </h1>
      <br>
      <?php if (have_posts()) : ?>
      <ul class='orbit-three-grid' style='margin-bottom:50px; padding-left: 0;'>
        <?php while (have_posts()) : the_post(); ?>
        <li class="orbit-article-db orbit-list-db">
          <?php get_template_part('partials/post', 'common');?>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
