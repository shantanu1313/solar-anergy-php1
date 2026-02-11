<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- HERO -->
<section class="com-hero">
  <div class="container">
    <h1>Commercial Solar Solutions</h1>
    <p>Smart Energy Solutions for Businesses & Institutions</p>
  </div>
</section>

<!-- ABOUT -->
<section class="com-about">
  <div class="container com-grid">

    <div class="com-image">
      <?php if(!empty($about->image) && file_exists(FCPATH.'uploads/'.$about->image)){ ?>
        <img src="<?= base_url('uploads/'.$about->image) ?>" alt="Commercial Solar">
      <?php } else { ?>
        <div class="img-placeholder"></div>
      <?php } ?>
    </div>

    <div class="com-text">
      <h2>Solar for Commercial Buildings</h2>

      <p>
        <?= !empty($about->description)
              ? $about->description
              : 'Maha Solar delivers customized solar solutions for commercial buildings to reduce operational costs and improve long-term sustainability. Our systems are designed to provide high efficiency and better ROI.' ?>
      </p>

      <ul class="com-points">
        <?php if(!empty($points)){ foreach($points as $p){ ?>
          <li><?= $p->point ?></li>
        <?php }} ?>
      </ul>

    </div>

  </div>
</section>

<!-- SUITABLE -->
<section class="com-suitable">
  <div class="container">
    <h2>Suitable For</h2>

    <div class="suitable-grid">
      <?php if(!empty($suitable)){ foreach($suitable as $s){ ?>
        <div class="suitable-box">
          <?= $s->title ?>
        </div>
      <?php }} ?>
    </div>

  </div>
</section>

<!-- BENEFITS -->
<section class="com-benefits">
  <div class="container">
    <h2>Benefits of Commercial Solar</h2>

    <div class="benefit-grid">
      <?php if(!empty($benefits)){ foreach($benefits as $b){ ?>
        <div class="benefit-box">
          <?= $b->title ?>
        </div>
      <?php }} ?>
    </div>

  </div>
</section>
