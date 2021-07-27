<?php get_header(); ?>

<div class="container single-template-3">
  <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) { while (have_posts()) { the_post(); global $post;?>
      <article <?php post_class();?>>
        <header class="entry-header"><h1 class="entry-title"><?php the_title();?></h1></header>
        <div class="entry-summary"><?php _e( do_shortcode( '[orbit_excerpt]' ) );?></div>

        <?php

          if (get_post_meta( get_the_ID(), 'Hide Feature', true) != 'yes') { ?>
            <div class="post-thumbnail"><?php _e( do_shortcode( '[orbit_thumbnail size="full"]' ) );?></div>
          <?php }
        ?>

        <div class='author-meta'>By <?php
					if ( function_exists('coauthors_posts_links') ) {
						coauthors_posts_links();
					}
					else { the_author(); }
				?> | Published on <?php the_date('M j, Y');?> </div>

        <div class="entry-content"><?php the_content(); ?></div>

        <div class="post-meta">
            <h5>Posted in <?php the_category(", "); ?></h5>
        </div>

        <div class="post-tags">
          <?php if (has_tag()) { ?>
            <h5>Tagged Under: </h5>
          <?php the_tags( '', '', '' ); }?>
        </div>

        <div class="author-info">
          <h5>About the author(s)</h5>
          <?php if ( function_exists('coauthors_posts_links') ) {
            $coauthors = get_coauthors();
            foreach ( $coauthors as $coauthor ): ?>
                <div class="auth-bio">
                  <?php if ($coauthor->type == 'guest-author') { ?>
                    <?php echo coauthors_get_avatar($coauthor, 64, '', '', 'profile-pic alignleft'); ?>
                    <span>
                      <h6><?php echo $coauthor->display_name; ?></h6>
                      <p><?php echo $coauthor->description; ?></p>
                    </span>
                  <?php }
                  else {
                      echo get_avatar($coauthor->ID, 64, 'default', $coauthor->display_name, array('class' => 'alignleft profile-pic'));
                      $userdata = get_userdata( $coauthor->ID ); ?>
                      <span>
                        <h6><?php echo $userdata->display_name; ?></h6>
                        <p><?php echo $userdata->description; ?></p>
                      </span>
                  <?php } ?>
                </div>
            <?php endforeach;
          } ?>
        </div>
        <?php get_template_part( 'partials/comments', 'box');?>
        <?php get_template_part( 'partials/post', 'navigation');?>
      </article>
    <?php } } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
