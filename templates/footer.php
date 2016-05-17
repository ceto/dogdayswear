<?php get_template_part('templates/mailchimp','subscribe' ); ?>
<footer class="sitefooter grayblock">
  <div class="row container">
    <div class="columns medium-10 medium-centered large-10  text-center">
      <img class="flogo" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo_footer.svg" alt="Dogdays Yoga Wear">
      <ul class="fsocials">
        <li><a class="face" target="_blank" href="https://www.facebook.com/dogdaysyogawear/"><i class="icon icon--facebook"></i>facebook</a></li>
        <li><a class="insta" target="_blank" href="https://www.instagram.com/dogdaysyogawear/"><i class="icon icon--instagram"></i>instagram</a></li>
        <li><a class="tel" href="tel:+36205954060"><i class="icon icon--telephone"></i>06.20.595.4060</a></li>
      </ul>



    </div>
  </div>
  <div class="row container">
    <div class="columns text-center">

          <p class="flinks"><a href="<?php the_permalink(540); ?>">Adatvédelem</a> &middot; <a href="<?php the_permalink(529); ?>">ÁSZF</a> &middot; <a href="<?php the_permalink(542); ?>">Szállítás és Garancia</a> </p>

          <p class="copyright">&copy; 2015 <strong>Dog Days Yoga Wear</strong> &middot; All rights reserved &middot; Site by <a href="http://hydrogene.hu"><strong>HYDROGENE</strong></a></p>

    </div>
  </div>

</footer>


<?php //dynamic_sidebar('sidebar-footer'); ?>

