<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/footer.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/about.css'); ?>">
  <script src="<?php echo base_url('assets/js/about.js'); ?>" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<header class="header">
  <div class="container">

    <!-- Logo -->
    <div class="logo">
      <img src="<?= base_url('assets/image/logo.png') ?>" alt="Maha Solar">
    </div>

    <!-- Menu -->
    <nav>
      <ul class="nav-menu">

        <li><a href="<?= base_url('/'); ?> " class="active">Home</a></li>
        <li><a href="<?= base_url('user/about'); ?>">About</a></li>
        



        <li class="dropdown">
          <a href="#">Products ▾</a>
          <ul class="dropdown-menu">
            <li><a href="#">Solar Water Heater</a></li>
            <li><a href="#">Solar Water Pumps</a></li>
            <li><a href="#">On Grid Solar</a></li>
            <li><a href="#">Solar Street Light</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#">Services ▾</a>
          <ul class="dropdown-menu">
            <li><a href="#">Residential</a></li>
            <li><a href="#">Industrial</a></li>
            <li><a href="#">Educational</a></li>
            <li><a href="#">Healthcare</a></li>
          </ul>
        </li>

        <li><a href="blogs.php">Blogs</a></li>
        <li><a href="contact.php">Contact</a></li>

        <li><a href="quotation.php" class="quote-btn">Quotation</a></li>

      </ul>
    </nav>

  </div>
</header>
