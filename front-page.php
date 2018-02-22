<?php 
/**
 * 
 * @package recantoalternativo
 */

get_header(); ?>

<main class="site-content">
    
    <section class="vt-space">
        <div class="container">
            <div class="row">
                <div class="col col-5">
                   <?php
                    $title = get_theme_mod( 'frontpage_about-title' );
                    $text = get_theme_mod( 'frontpage_about-text' );
                    $image = get_theme_mod( 'frontpage_about-img' );
                   ?>
                   <h1 class="sec-title"> <?php echo $title; ?></h1>
                   <p><?php echo $text; ?></p>
                </div>
                <div class="col col-6 offset-1">
                    <?php
                     if ( $image ): ?>
                     <img src="<?= $image ?>" alt="Imagem sobre o recanto alternativo">
                    <?php endif; ?>
                </div>
            
            </div>
        </div>
    </section>

    <section class="vt-space">
        <div class="container">
            <div class="row">
                <div class="col col-6">
                    
                </div>
                <div class="col col-5 offset-1">
                    
                </div>            
            </div>
        </div>
    </section>
    <section class="vt-space">
        <div class="container">
            <div class="row">
                <div class="col col-12">
                    
                </div>
            </div>
        </div>
    </section>
    
</main>


<?php

get_footer();