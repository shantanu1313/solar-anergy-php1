<section class="services-hero">

  <!-- SLIDES -->
  <div class="hero-slide active"
       style="background-image:url('<?= base_url("assets/image/blog1.jpg") ?>')"></div>

  <div class="hero-slide"
       style="background-image:url('<?= base_url("assets/image/blog2.jpg") ?>')"></div>

  <div class="hero-slide"
       style="background-image:url('<?= base_url("assets/image/.jpg") ?>')"></div>

  <!-- CONTENT -->
  <div class="hero-content">
    <h1>Our Solar Services</h1>
    <p>Smart & Sustainable Solar Solutions</p>
  </div>

  <!-- CURVE -->
  <div class="hero-curve"></div>

</section>

<section class="service-fit">
  <div class="container">

    <h2 class="fit-title">Which Solar Solution Fits Your Property?</h2>
    <p class="fit-subtitle">
      Every property has different energy needs. Choose the solar solution
      that fits you best.
    </p>

    <!-- Residential -->
    <div class="fit-row">
      <div class="fit-img">
        <img src="<?= base_url('assets/image/gal1.jpg') ?>" alt="">
      </div>

      <div class="fit-content">
        <span class="fit-tag">Residential Solar</span>
        <h3>Designed for Daily Household Living</h3>
        <p>
          Ideal for families looking to reduce electricity bills and
          switch to clean, sustainable energy without complex maintenance.
        </p>

        <div class="fit-points">
          <span>Homes</span>
          <span>Villas</span>
          <span>Apartments</span>
          <span>Bungalows</span>
        </div>
      </div>
    </div>

    <!-- Commercial -->
    <div class="fit-row reverse">
      <div class="fit-img">
        <img src="<?= base_url('assets/image/gal2.jpg') ?>" alt="">
      </div>

      <div class="fit-content">
        <span class="fit-tag">Commercial Solar</span>
        <h3>Built for Business Daytime Energy Demand</h3>
        <p>
          Best suited for organizations with high daytime power usage,
          helping reduce operating costs and improve energy efficiency.
        </p>

        <div class="fit-points">
          <span>Offices</span>
          <span>Schools</span>
          <span>Hospitals</span>
          <span>Commercial Complexes</span>
        </div>
      </div>
    </div>

    <!-- Industrial -->
    <div class="fit-row">
      <div class="fit-img">
        <img src="<?= base_url('assets/image/gal3.jpg') ?>" alt="">
      </div>

      <div class="fit-content">
        <span class="fit-tag">Industrial Solar</span>
        <h3>Engineered for Heavy Power Operations</h3>
        <p>
          Developed for large-scale power consumption environments where
          efficiency, reliability and long-term savings matter the most.
        </p>

        <div class="fit-points">
          <span>Factories</span>
          <span>Warehouses</span>
          <span>Manufacturing Plants</span>
          <span>Industrial Sheds</span>
        </div>
      </div>
    </div>

  </div>
</section>


<section class="services-list">
  <div class="container">

    <!-- Residential -->
    <div class="service-card">
      <div class="card-img">
        <img src="<?= base_url('assets/image/residential.jpg') ?>" alt="Residential Solar">
      </div>

      <div class="card-body">
        <h3>Residential Solar</h3>
        <p>
          Affordable rooftop solar solutions for homes to reduce electricity
          bills and ensure long-term savings.
        </p>
        <a href="<?= base_url('user/residential') ?>" class="btn-primary">
          View Details
        </a>
      </div>
    </div>

    <!-- Commercial -->
    <div class="service-card">
      <div class="card-img">
        <img src="<?= base_url('assets/image/commercial.jpg') ?>" alt="Commercial Solar">
      </div>

      <div class="card-body">
        <h3>Commercial Solar</h3>
        <p>
          Customized solar systems for offices, schools and hospitals to
          lower operational costs.
        </p>
        <a href="<?= base_url('user/commercial') ?>" class="btn-primary">
          View Details
        </a>
      </div>
    </div>

    <!-- Industrial -->
    <div class="service-card">
      <div class="card-img">
        <img src="<?= base_url('assets/image/industrial.jpg') ?>" alt="Industrial Solar">
      </div>

      <div class="card-body">
        <h3>Industrial Solar</h3>
        <p>
          Large-scale solar power solutions designed for industries with
          high energy consumption.
        </p>
        <a href="<?= base_url('user/industrial') ?>" class="btn-primary">
          View Details
        </a>
      </div>
    </div>

  </div>
</section>

