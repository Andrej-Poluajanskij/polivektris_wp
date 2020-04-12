<?php
/* Template name: News */
get_header();
?>
<section class="inner-page_header">
<?php $header_image = get_correct_image_link_thumb(get_field('header_image'), 'inner-page_header-image');
    top_header_image($header_image); ?>


    <div class="news-container news_page-container container">
        <ul>
        <?php

            $post = array('post_type' => 'post');
            $news = new WP_Query($post);
            // print_r($news->the_post());

            if($news->have_posts()) : 
            while($news->have_posts()) : 
                $news->the_post();
        ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="new-image">
                        <img src="<?php  echo get_the_post_thumbnail_url($post->ID, 'news_image'); ?>" alt="">
                    </div>
                    <div class="new-content">
                        <div class="new-title"><?php the_title(); ?></div>
                        <span class="section-title_spacer"></span>
                        <p><?php echo excerpt(30); ?></p>
                        <div class="new-read"><span>READ MORE</span> <span></span></div>
                    </div>
                </a>
            </li>
            <?php
                endwhile;
                endif;
            ?>
        </ul>
    </div>
    
</section>



<?php get_footer(); ?>