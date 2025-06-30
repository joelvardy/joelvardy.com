(function () {
  const slides = document.querySelectorAll('.carousel-slide');
  const prevBtn = document.querySelector('.carousel-btn.prev');
  const nextBtn = document.querySelector('.carousel-btn.next');
  let current = 0;
  let timer = null;

  function showSlide(idx) {
    slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === idx);
    });
    current = idx;
  }

  function nextSlide() {
    showSlide((current + 1) % slides.length);
  }

  function prevSlide() {
    showSlide((current - 1 + slides.length) % slides.length);
  }

  prevBtn.addEventListener('click', () => {
    prevSlide();
    resetTimer();
  });
  nextBtn.addEventListener('click', () => {
    nextSlide();
    resetTimer();
  });

  function resetTimer() {
    if (timer) clearInterval(timer);
    timer = setInterval(nextSlide, 8000);
  }

  resetTimer();
  showSlide(0);
})();
