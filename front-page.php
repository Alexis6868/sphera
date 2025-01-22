<?php get_header(); ?>
<main>
      <section class="hero">
        <aside>
          <h1>Découvrez notre agence créative</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque
            excepturi officia suscipit aut fuga corporis voluptatum sunt odio
          </p>
          <div class="call">
            <a class="CTA" href="<?php echo home_url('/contact');?>">Contacter nous</a>
            <a class="CTAW" href="<?php echo home_url('/realisation');?>">Nos réalisations</a>
          </div>
        </aside>
        <div id="container3D">
        </div>
      </section>
      <section class="stat">
        <div class="stat-info">
          <h2>L'agence en quelque chiffres</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores
            repellat rem tempora ipsam vel sit repellendus laudantium veniam
            laborum dolores. Nihil laboriosam modi qui nostrum tenetur quo
            repellendus accusantium id!
          </p>
        </div>
        <div class="bento">
          <div class="box up">
            <h3>360°</h3>
            <div class="sub">Réalisation</div>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
          <div class="box down">
            <h3>360°</h3>
            <div class="sub">Réalisation</div>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
          <div class="box up">
            <h3>360°</h3>
            <div class="sub">Réalisation</div>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
          <div class="box down">
            <h3>360°</h3>
            <div class="sub">Réalisation</div>
            <p>Lorem ipsum dolor sit amet consectetur</p>
          </div>
        </div>
      </section>
      <section class="team">
        <div class="team-info">
          <h2>Les membres de notre équipes</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipiscing elit volutpat
            <br />
            gravida malesuada quam commodo id integer nam.
          </p>
        </div>
        <div class="team-img">
          <div class="profil">
          <img src="<?php  echo get_template_directory_uri(); ?>/assets/images/alexis.png" alt="image de profil" />
            <div class="name">Alexis ZIMMERMANN</div>
            <p>Webdesigner</p>
          </div>

          <div class="profil">
          <img src="<?php  echo get_template_directory_uri(); ?>/assets/images/enzo.png" alt="image de profil" />            
          <div class="name">Enzo RATTONI</div>
            <p>Artiste 3D</p>
          </div>
          <div class="profil">
          <img src="<?php  echo get_template_directory_uri(); ?>/assets/images/emilien.png" alt="image de profil" />            
          <div class="name">Emilien DREY</div>
            <p>Graphiste</p>
          </div>

          <div class="profil">
          <img src="<?php  echo get_template_directory_uri(); ?>/assets/images/benjamin.png" alt="image de profil" />            
          <div class="name">Benjamin ANTENAT</div>
            <p>Vidéaste</p>
          </div>

          <div class="profil">
          <img src="<?php  echo get_template_directory_uri(); ?>/assets/images/paul.png" alt="image de profil" />
            <div class="name">Paul SCHNOEBELEN</div>
            <p>Community manager</p>
          </div>
        </div>
      </section>
      <div class="upside">
        <h3>
          Tu as une idée ? <br />
          Commençons ton projet dès aujourd'hui !
        </h3>
        <a class="CTA" href="">En avant</a>
      </div>
    </main>
<?php get_footer(); ?>
<script type="module" src="<?php echo get_template_directory_uri() ?>/assets/js/main.js"></script>