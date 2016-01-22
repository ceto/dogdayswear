<nav class="listersubnav">
  <?php if (is_product_category()) : ?>
    <?php
      $cate = get_queried_object();
      $cateID = $cate->term_id;
      if ($cate->parent == 0 ) {
        $args = array(
          'parent' => $cateID, // id of the direct parent
          'hide_empty' => false,
        );
        $parcateID=$cateID  ;
      } else {
        $args = array(
          'parent' => $cate->parent, // id of the direct parent
          'hide_empty' => false,
        );
        $parcateID=$cate->parent;
      }
      $cats = get_terms( 'product_cat', $args );
    ?>
    <ul class="menu menu--sub">
      <li><a href="<?php echo get_term_link($parcateID) ?>"><?= __('Show all', 'dd'); ?></a></li>
      <?php foreach( $cats as $cat ) : ?>
          <li <?= ($oricateID==$cat->term_id)?'class="current"':''; ?>><a href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a></li>
      <?php endforeach; ?>
    </ul>
   <?php elseif (is_shop()) : ?>
    <?php
      $args = array(
        'parent' => 0, // id of the direct parent
        'hide_empty' => false,
      );
      $cats = get_terms( 'product_cat', $args );
    ?>
    <ul class="menu menu--sub">
      <?php foreach( $cats as $cat ) : ?>
          <li <?= ($oricateID==$cat->term_id)?'class="current"':''; ?>><a href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a></li>
      <?php endforeach; ?>
    </ul>
   <?php endif; ?>
 </nav>