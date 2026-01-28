const toggle = document.getElementById('menuToggle');
const links = document.getElementById('navLinks');
const nav = document.querySelector('.nav');

if (toggle && links) {
  toggle.addEventListener('click', () => {
    links.classList.toggle('open');
  });
}

if (nav) {
  const onScroll = () => {
    nav.classList.toggle('scrolled', window.scrollY > 8);
  };
  onScroll();
  window.addEventListener('scroll', onScroll);
}

const revealItems = document.querySelectorAll('.reveal');
const counters = document.querySelectorAll('[data-counter]');
let countersPlayed = false;

revealItems.forEach((item, index) => {
  const delay = (index % 6) * 80;
  item.style.transitionDelay = `${delay}ms`;
});

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.15 });

revealItems.forEach(item => observer.observe(item));

const countObserver = new IntersectionObserver((entries) => {
  if (entries[0].isIntersecting && !countersPlayed) {
    countersPlayed = true;
    counters.forEach(counter => {
      const target = Number(counter.dataset.counter);
      let current = 0;
      const step = Math.max(1, Math.floor(target / 60));
      const timer = setInterval(() => {
        current += step;
        if (current >= target) {
          counter.textContent = target;
          clearInterval(timer);
        } else {
          counter.textContent = current;
        }
      }, 30);
    });
  }
}, { threshold: 0.4 });

if (counters.length) {
  countObserver.observe(counters[0]);
}

const mockForms = document.querySelectorAll('form[data-mock]');
mockForms.forEach(form => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const status = form.querySelector('.form-status');
    if (status) {
      status.textContent = 'Gracias. Tu solicitud fue enviada con exito.';
    }
    form.reset();
  });
});
