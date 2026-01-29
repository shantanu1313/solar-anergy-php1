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


  const faqItems = document.querySelectorAll(".faq-item");

  faqItems.forEach((item) => {
    item.addEventListener("click", () => {

      // Close all
      faqItems.forEach((other) => {
        other.classList.remove("active");
      });

      // Open clicked one
      item.classList.add("active");
    });
  });



document.querySelectorAll("#faq-section .faq-col:first-child .faq-q").forEach(q => {

  q.addEventListener("click", () => {

    // close all
    document.querySelectorAll("#faq-section .faq-col:first-child .faq-q")
      .forEach(item => item.classList.remove("active"));

    document.querySelectorAll("#faq-section .faq-answer")
      .forEach(ans => ans.classList.remove("show"));

    // open clicked
    q.classList.add("active");
    q.nextElementSibling.classList.add("show");
  });
});
