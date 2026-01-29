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
  if (entries[0]?.isIntersecting && !countersPlayed) {
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

const carousels = document.querySelectorAll('[data-carousel]');
carousels.forEach(carousel => {
  const track = carousel.querySelector('.carousel-track');
  if (!track) return;
  const original = Array.from(track.children);
  if (!original.length) return;

  // Clone slides for infinite loop
  original.forEach(slide => track.appendChild(slide.cloneNode(true)));
  const total = original.length;
  const allSlides = Array.from(track.children);

  const prev = carousel.querySelector('.carousel-btn.prev');
  const next = carousel.querySelector('.carousel-btn.next');
  const dotsWrap = carousel.querySelector('.carousel-dots');
  let index = 0;
  let timer = null;

  const getStep = () => {
    const width = parseFloat(getComputedStyle(carousel).getPropertyValue('--slide-width')) || 240;
    const gap = parseFloat(getComputedStyle(carousel).getPropertyValue('--slide-gap')) || 18;
    return width + gap;
  };

  const updateDots = () => {
    if (!dotsWrap) return;
    const active = index % total;
    dotsWrap.querySelectorAll('button').forEach((d, i) => d.classList.toggle('active', i === active));
  };

  if (dotsWrap) {
    dotsWrap.innerHTML = '';
    for (let i = 0; i < total; i++) {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(dot);
    }
  }

  const goTo = (i, animate = true) => {
    index = (i + allSlides.length) % allSlides.length;
    track.style.transition = animate ? 'transform 0.5s ease' : 'none';
    track.style.transform = `translateX(-${getStep() * index}px)`;
    updateDots();
  };

  track.addEventListener('transitionend', () => {
    if (index >= total) {
      goTo(0, false);
      requestAnimationFrame(() => {
        track.style.transition = 'transform 0.5s ease';
      });
    }
  });

  prev?.addEventListener('click', () => {
    if (index === 0) {
      goTo(total, false);
      requestAnimationFrame(() => goTo(total - 1));
      return;
    }
    goTo(index - 1);
  });
  next?.addEventListener('click', () => goTo(index + 1));
  window.addEventListener('resize', () => goTo(index, false));

  goTo(0, false);
  timer = setInterval(() => goTo(index + 1), 2500);
});
