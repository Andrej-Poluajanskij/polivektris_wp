<?php
/* Template name: Contacts */
get_header();
?>
<section class="contacts-page">
    <div class="contacts_box-shadow">

        <div class="contacts-container container">

            <?php if( have_rows('contacts_block') ): ?>

            <div class="contacts-content">

                <?php while( have_rows('contacts_block') ): the_row(); ?>
                
                <div class="contacts">
                    <h3><?php the_sub_field('title'); ?></h3>

                    <?php 
                        $address = get_sub_field('address');
                        if($address){
                    ?>
                    <div class="contact-item address">
                        <span class="address-icon"></span>
                        <address><?php echo $address ?></address>
                    </div>
                    <?php }?>

                    <?php if( have_rows('tel_number') ): ?>
                        <?php while( have_rows('tel_number') ): the_row(); ?>
                    <div class="contact-item number">
                        <span class="phone-icon"></span>
                        <a href="tel:<?php the_sub_field('number'); ?>"><?php the_sub_field('number'); ?></a>
                    </div>
                        <?php endwhile ?> 
                    <?php endif ?>
                    
                    <div class="contact-item email">
                        <span class="email-icon"></span>
                        <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                    </div>
                    
                </div>
                <?php endwhile ?>        
            </div>
            <?php endif ?>

            <div class="contacts-form">

            <div class="sk-folding-cube loader display-none">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
                <div class="load_text">Loading...</div>
            </div>

                <form action="" id="form" method="post">
                    <div class="form-left">
                        <div class="form-item">
                            <label for="name">Name</label>
                            <input  type="text" name="name" id="name" placeholder="Type your name" >
                        </div>
                        <div class="form-item">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="Type e-mail address" required>
                        </div>
                        <div class="form-item">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" placeholder="Type your company" >

                        </div>
                    </div>

                    <div class="form-right">
                        <div class="form-item">
                            <label for="inquiry">Your’s inquiry</label>
                            <textarea name="inquiry" id="inquiry" placeholder="Type your inquiry" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-item">
                            <label class="gdpr" for="gdpr">
                                <div class="checkbox ">
                                    <span class="checkbox_inner " ></span>
                                </div>
                                <!-- <input type="checkbox" name="gdpr" id="gdpr" > -->
                                 <div class="gdpr-note">I understand and accept the Privacy Policies <a href="https://gdpr-info.eu/" target="_blank"> (GDPR)</a> <input type="checkbox" name="gdpr" id="gdpr" ></div>
                            </label>
                        </div>
                        <div class="form-item">
                            <button type="submit"><span></span><span>Send</span></button>
                        </div>

                    </div>
                </form>
                <span class="post-send-mess">Your message was sended. Thank You.</span>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>