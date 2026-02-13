<section class="services-section">
  <div class="container">
    <h1 class="section-title">Our Services</h1>

    <div class="services-grid">

      <!-- CARD -->
      <div class="service-card">
        <div class="card-img">
          <img src="<?= base_url('assets/image/gal1.webp') ?>">
          <div class="card-overlay">
            <h3>Residential</h3>
            <p>Smart solar systems for modern homes.</p>
            <a href="<?= base_url('user/residential') ?>">Explore</a>
          </div>
        </div>
      </div>

      <div class="service-card">
        <div class="card-img">
          <img src="<?= base_url('assets/image/industrial.webp') ?>">
          <div class="card-overlay">
            <h3>Industrial</h3>
            <p>Heavy-duty solar solutions for industries.</p>
            <a href="<?= base_url('user/industrial') ?>">Explore</a>
          </div>
        </div>
      </div>

      <div class="service-card">
        <div class="card-img">
          <img src="<?= base_url('assets/image/gal4.webp') ?>">
          <div class="card-overlay">
            <h3>Commercial</h3>
            <p>Efficient solar for business growth.</p>
            <a href="<?= base_url('user/commercial') ?>">Explore</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ================= SERVICE DETAILS SECTION ================= -->
<section class="service-details">
  <div class="container">

    <!-- Residential -->
    <div class="row align-items-center detail-row">
      
      <div class="col-md-6 detail-text">
        <h2>Residential Solar Solutions</h2>
        <p>
          Our residential solar systems help homeowners reduce electricity costs
          while contributing to a greener environment.
        </p>
        <ul>
          <li>✔ Reduce electricity bills up to 70%</li>
          <li>✔ 25 Years Performance Warranty</li>
          <li>✔ Government subsidy assistance</li>
        </ul>
      </div>

      <div class="col-md-6 detail-img">
        <img src="<?= base_url('assets/image/gal1.webp') ?>" class="img-fluid">
      </div>

    </div>

    <!-- Industrial -->
    <div class="row align-items-center detail-row reverse">
      
      <div class="col-md-6 detail-img">
        <img src="<?= base_url('assets/image/industrial.webp') ?>" class="img-fluid">
      </div>

      <div class="col-md-6 detail-text">
        <h2>Industrial Solar Infrastructure</h2>
        <p>
          We deliver large-scale solar installations tailored for factories and manufacturing units.
        </p>
        <ul>
          <li>✔ High capacity installations</li>
          <li>✔ Custom energy planning</li>
          <li>✔ Rapid ROI generation</li>
        </ul>
      </div>

    </div>

    <!-- Commercial -->
    <div class="row align-items-center detail-row">
      
      <div class="col-md-6 detail-text">
        <h2>Commercial Solar Projects</h2>
        <p>
          Our commercial solar systems are ideal for offices and business buildings.
        </p>
        <ul>
          <li>✔ Fast & efficient installation</li>
          <li>✔ Energy cost optimization</li>
          <li>✔ Long-term savings guarantee</li>
        </ul>
      </div>

      <div class="col-md-6 detail-img">
        <img src="<?= base_url('assets/image/gal4.webp') ?>" class="img-fluid">
      </div>

    </div>

  </div>
</section>
<script>
  const rows = document.querySelectorAll('.detail-row');

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('active');
      }
    });
  }, { threshold: 0.3 });

  rows.forEach(row => observer.observe(row));
</script>
