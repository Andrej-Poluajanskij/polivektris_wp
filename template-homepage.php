<?php
/* Template name: Homepage */
get_header();
?>
<section>
    <div class="page-img">
        <img src="<?php echo  get_correct_image_link_thumb(get_field('header_image'), 'home-page_header-image'); ?>" alt="">
    </div>
</section>
<section class="home_page-about">
    <div class="home_page-about_bg ">
        <div class="section-title container">
            <h1>About us</h1>
            <span class="section-title_spacer"></span>
        </div>

        <div class="about-feats container">
        <?php if( have_rows('about_section_fields') ): ?>
            
            <ul>
                <?php while( have_rows('about_section_fields') ): the_row(); ?>
                <li>
                    <div class="feat-icon" >
                        <span class="feat-icon-1" style="background-image: url(<?php the_sub_field('field_icon'); ?>)"></span>
                    </div>
                    <div class="feat-content">
                        <div class="feat-title"><?php the_sub_field('field_title'); ?></div>
                        <div class="feat-note"><?php the_sub_field('field_note'); ?></div>
                    </div>
                </li>
                <?php endwhile ?> 
            </ul>
        <?php endif ?>    
        </div>
    </div>
</section>

<section class="home_page-news ">
    <div class="section-title container">
        <h1>NEWS</h1>
        <span class="section-title_spacer"></span>
    </div>

    <div class="news-container container">
        <ul>
        <?php

            $post = array('post_type' => 'post', 'posts_per_page' => 3);
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

    <div class="news-container_btns container">
        <div class="btn_switcher">
            <button><span></span></button>
            <button><span></span></button>
        </div>
        <div class="btn_all-news">
            <a href="<?php echo get_all_news_url(); ?>">READ ALL NEWS</a>
        </div>
    </div>
</section>


<section id="polyamides" class="polyamides__compounds all-products">
    
        <?php

        $terms = get_terms([
            'taxonomy' => 'product_category',
            'hide_empty' => true,
        ]);
        $section_counter = 1;
        foreach( array_reverse($terms) as $term) {
            $catID = $term->term_id;
            
            
            ?>

             <div id="category-<?php echo $section_counter++ ?>" class="section-title container">
                <h1><?php echo $term->name ?></h1>
                <span class="section-title_spacer"></span>
                <p><?php echo $term->description ?></p>
            </div>
            <div class="product-list container">
            <ul>

      <?php
            
            $product = array(
                'post_type' => 'products',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'product_category',
                    'field' => 'term_id',
                    'terms' => $term->term_id
                    )
                )
                );
        
            $products = new WP_Query($product);
            $product_counter = 1;

            if($products->have_posts()) : 
            while($products->have_posts()) : 
                $products->the_post();
        ?>
        
            <li>
                <div class="product-content">
                    <div class="product-content_note">
                        <h1><?php the_field('product_name'); ?></h1>
                        <p><?php the_field('product_content'); ?></p>

                        <?php if( have_rows('product_key_words') ): ?>

                        <hr>
                        <div class="product-keywords">
                            <ul>
                            <?php while( have_rows('product_key_words') ): the_row(); ?>

                                <li><?php the_sub_field('key_word'); ?></li>

                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-content_number">
                        <?php echo str_pad($product_counter++, 2, '0', STR_PAD_LEFT); ?>
                    </div>
                </div>

                <div class="product-image-block">
                    <div class="product-image">
                        <img src="<?php  echo get_correct_image_link_thumb(get_field('product_image'), 'product_image' ); ?>" alt="">
                    </div>
                    <div class="product-decor" style="background-color: <?php the_field('image_decor_color'); ?>;"></div>

                </div>

                <div class="new-read product-read_more">
                    <a href="<?php the_permalink(); ?>">
                        <span>READ MORE</span> <span></span>
                    </a>
                </div>
            </li>
            <?php
                endwhile;
                endif;
            
            ?>
            </ul>
        </div>

            <?php  } ?>
</section>

<?php get_footer(); ?>