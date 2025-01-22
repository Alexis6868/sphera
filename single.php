<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="project-detail">
        <h1><?php the_title(); ?></h1>
        <img src="<?php the_field('hero_image'); ?>" alt="">
        <p><strong>tag</strong><?php the_field('tag');?></p>
        <p><?php the_field('description'); ?></p>
        <p><strong>Date :</strong> <?php the_field('date'); ?></p>
        <p><strong>Texte :</strong> <?php the_field('texte'); ?></p>
        <p><strong>Client :</strong> <?php the_field('client'); ?></p>
        <p><strong>Technologies :</strong> <?php the_field('liens'); ?></p>
        <a href="<?php echo home_url('/projet'); ?>" target="_blank">Retour</a>
    </div>
<?php endwhile; endif;
get_footer();
?>
