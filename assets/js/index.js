document.addEventListener("DOMContentLoaded", function () {

  const images = [
    BASE_URL + "assets/image/ind1.jpg",
    BASE_URL + "assets/image/ind2.jpg",
    BASE_URL + "assets/image/ind3.jpg"
  ];

  let index = 0;
  const slider = document.getElementById("sliderImage");

  function changeImage() {
    slider.style.opacity = 0;

    setTimeout(() => {
      index = (index + 1) % images.length;
      slider.src = images[index];
      slider.style.opacity = 1;
    }, 500);
  }

  setInterval(changeImage, 3000);

});




document.addEventListener("DOMContentLoaded", function () {

  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach(item => {

    const btn = item.querySelector(".faq-question");

    btn.addEventListener("click", () => {

      faqItems.forEach(faq => {
        if (faq !== item) faq.classList.remove("active");
      });

      item.classList.toggle("active");
    });

  });

});

