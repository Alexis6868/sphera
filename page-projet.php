<?php
/*
Template Name: Projet
*/

get_header(); ?>
<main>
<main>
    <section class="realisations">
        <div class="container">
            <h2>Nos réalisations</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit semper dalar elementum tempus hac tellus libero accumsan.</p>
            <div class="projects">
                <?php
                // Requête personnalisée pour afficher les articles du type "projet"
                $args = array(
                    'post_type' => 'projet', 
                    'posts_per_page' => -1, 
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="project">
                            <img src="<?php the_field('hero_image'); ?>" alt="">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_field('description') ?></p>
                            <a href="<?php the_permalink(); ?>">Voir plus</a>
                        </div>
                    <?php endwhile;
                else : ?>
                    <p>Aucun projet trouvé.</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</main>