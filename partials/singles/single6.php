<div id="content" class="container-fluid single-template-6">
  <?php if(have_posts()): while ( have_posts() ): the_post();?>
  <article class="single-post">
    <?php if( has_post_thumbnail() ):?>
      <div class="header_img" style="background-image:url( <?php _e( get_the_post_thumbnail_url() );?> );"></div>
    <?php else:?>
      <div class="header_no_img"></div>
    <?php endif;?>
    <div class="post-content narrow-col">
      <div class="post-meta">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class='author-info'>
          <?php global $post;?>
          <div class="author-avatar">
            <img src="<?php _e( get_avatar_url( $post->post_author,array("size"=>60 ) ) );?>" alt="">
          </div>
          <div class="author-meta">
            <div class="author-name"><?php the_author();?></div>
            <div class="author-date"><?php the_date('M j, Y');?></div>
            <?php get_template_part( 'partials/icons', 'box');?>
          </div>
        </div>
      </div>
      <div class="description">
        <?php the_content(); ?>
      </div>
      <div class="tags">
        <?php the_tags( '', '', '' ); ?>
        <?php get_template_part( 'partials/icons', 'box');?>
      </div>
      <div class="decoration"></div>
      <div id="below-post" class='author-info'>
        <?php global $post;?>
        <div class="author-avatar">
          <img src="<?php _e( get_avatar_url( $post->post_author,array("size"=>60 ) ) );?>" alt="">
        </div>
        <div class="author-meta">
          <div class="author-header">
            <h2 class="author-name"><?php the_author();?></h2>
          </div>
          <div class="author-desc"><?php _e( get_the_author_meta( 'description', $post->post_author ) );?></div>
        </div>
      </div>
    </div>

    <!-- Checks whether the post has tags or not -->
    <?php if( has_tag() ):?>
    <?php $html = do_shortcode( '[orbit_related_query taxonomy="post_tag" style="grid3" posts_per_page="3"]' );?>
    <?php if( strlen( $html  ) ):?>
    <div class="related-posts">
      <div class="container">
        <h2>Related Posts</h2>
        <p class="decoration"></p>
        <?php echo $html;?>
      </div>
    </div>
    <?php endif;?>
    <?php endif;?>
  </article>
<?php endwhile;endif;?>
</div>
