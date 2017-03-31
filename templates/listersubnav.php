<?php
  $cate = get_queried_object();
  $cateID = $cate->term_id;
  $args = array(
    'parent' => $cateID, // id of the direct parent
    'hide_empty' => false,
  );
  $parcateID=$cateID  ;
  $cats = get_terms( 'product_cat', $args );
?>
<?php if ($cats): ?>
<nav class="listersubnav">
  <ul class="menu menu--sub">
    <?php foreach( $cats as $cat ) : ?>
    <li <?= ($oricateID==$cat->term_id)?'class="current"':''; ?>><a href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name ?></a></li>
    <?php endforeach; ?>
  </ul>
</nav>
<?php endif ?>