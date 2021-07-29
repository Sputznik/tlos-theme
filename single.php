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
                <?php
                if ($coauthor->type == 'guest-author') {
                  $author_link = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename );
                  ?>
                  <a href="<?php echo $author_link;?>" class="author-link">
                    <?php echo coauthors_get_avatar($coauthor, 64, '', '', 'profile-pic alignleft'); ?>
                  </a>
                  <span>
                    <a href="<?php echo $author_link;?>">
                      <h6><?php echo $coauthor->display_name; ?></h6>
                    </a>
                    <p><?php echo $coauthor->description; ?></p>
                  </span>
                <?php }
                else {
                    $author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
                    $userdata = get_userdata( $coauthor->ID );?>
                    <a href="<?php echo $author_link;?>">
                      <?php echo get_avatar($coauthor->ID, 64, '', $coauthor->display_name, array('class' => 'alignleft profile-pic')); ?>
                    </a>
                    <span>
                      <a href="<?php echo $author_link;?>">
                        <h6><?php echo $userdata->display_name; ?></h6>
                      </a>
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
