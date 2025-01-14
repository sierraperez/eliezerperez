<div class="hero-header">
        <?php
            $args = array(
            'post_type' => 'project', 
            'orderby' => 'rand',
            'posts_per_page' => '1',
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); 
                    if (has_post_thumbnail()) : ?>
                    <a href="<?= the_permalink() ?>" alt="<?= the_title() ?>"> 
                        <?= the_post_thumbnail("hero" , ['class' => 'hero-img']); ?>
                        <h1 class="hero-header__page-title">Eliezer Perez</h1>
                    </a>
                <?php endif; 
                }
            } else {
                esc_html_e( 'Sorry, no posts matched your criteria.' );
            }
            // Restore original Post Data.
            wp_reset_postdata();
        ?>
    </div>