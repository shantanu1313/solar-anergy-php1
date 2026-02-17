<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
.custom-card {
    padding: 22px 15px;
    border-radius: 14px;
    text-align: center;
    color: #fff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    transition: all 0.25s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    min-height: 130px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.custom-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.custom-card p {
    font-size: 13px;
    letter-spacing: 0.5px;
    opacity: 0.9;
    margin-bottom: 6px;
}

.custom-card h2 {
    font-size: 26px;
    font-weight: 600;
    margin: 0;
}

.card-icon {
    font-size: 22px;
    margin-bottom: 6px;
}

.container-fluid {
    padding-left: 35px;
    padding-right: 35px;
}


/* Gradient Colors */
.primary-card { background: linear-gradient(135deg, #4e73df, #375acb); }
.success-card { background: linear-gradient(135deg, #1cc88a, #159d6a); }
.warning-card { background: linear-gradient(135deg, #f6c23e, #e0a800); }
.info-card    { background: linear-gradient(135deg, #36b9cc, #2c9faf); }
.danger-card  { background: linear-gradient(135deg, #e74a3b, #c82333); }

/* Responsive */
@media(max-width:768px){
    .custom-card {
        min-height: 110px;
        padding: 18px 12px;
    }
    .custom-card h2 {
        font-size: 22px;
    }
}


</style>
<div class="row g-4 mt-3">

<div class="container-fluid mt-4">
    <div class="row g-3">

        <div class="col-lg-3 col-md-6">
            <div class="custom-card primary-card" onclick="window.location='<?= site_url('admin/quotes') ?>'">
                <div class="card-icon">📊</div>
                <p>Total Quotes</p>
                <h2 class="counter" data-target="<?= $total_quotes ?>">0</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="custom-card success-card">
                <div class="card-icon">📅</div>
                <p>Today Quotes</p>
                <h2 class="counter" data-target="<?= $today_quotes ?>">0</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="custom-card warning-card">
                <div class="card-icon">🆕</div>
                <p>New Quotes</p>
                <h2 class="counter" data-target="<?= $new_quotes ?>">0</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="custom-card info-card">
                <div class="card-icon">✅</div>
                <p>Approved</p>
                <h2 class="counter" data-target="<?= $approved_quotes ?>">0</h2>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="custom-card danger-card">
                <div class="card-icon">❌</div>
                <p>Rejected</p>
                <h2 class="counter" data-target="<?= $rejected_quotes ?>">0</h2>
            </div>
        </div>

    </div>
</div>
<div class="card shadow-sm mt-4 border-0">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Monthly Quote Activity</h5>
        <div style="height:320px;">
            <canvas id="monthlyChart"></canvas>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".counter");

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const count = +counter.innerText;
            const increment = target / 100;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
});


const ctx = document.getElementById('monthlyChart').getContext('2d');

const months = <?= $months ?>;
const totals = <?= $totals ?>;

new Chart(ctx, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: "Monthly Quotes",
            data: totals,
            borderColor: '#007bff',
            backgroundColor: 'rgba(0,123,255,0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>



