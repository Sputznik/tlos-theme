<?php get_header(); ?>
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class='col-sm-12'>
      <div class="about-author" style="margin-bottom: 40px;">
        <div class="media">
        <?php if( function_exists('coauthors_posts_links') ) : $coauthors = get_coauthors();
          foreach( $coauthors as $coauthor ): ?>
            <?php if( $coauthor->type == 'guest-author' ): ?>
              <div class="media-left">
                <?php echo coauthors_get_avatar( $coauthor, 96, '', '', 'profile-pic alignleft'); ?>
              </div>
              <div class="media-body">
                <h2 class="media-heading"><?php echo $coauthor->display_name; ?></h2>
                <?php echo $coauthor->description; ?>
              </div>
            <?php else: ?>
              <div class="media-left">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), '100', '', $coauthor->display_name ); ?>
              </div>
              <div class="media-body">
                <h2 class="media-heading"><?php echo $coauthor->display_name;  ?></h2>
                <?php the_author_meta( 'description' ); ?>
              </div>
            <?php endif;?>
        <?php endforeach; endif; ?>
        </div>
      </div>
      <?php if( have_posts()  ) : ?>
      <ul class='orbit-two-grid grid-uno' style='margin-bottom:50px; padding-left: 0;'>
        <?php while( have_posts() ) : the_post(); ?>
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
      <div style="margin-bottom: 30px;">
        <?php
          // PAGINATION
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
</div>
<?php get_footer(); ?>
