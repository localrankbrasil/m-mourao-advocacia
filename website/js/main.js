/* M. Mourão Advocacia — main.js */

document.addEventListener('DOMContentLoaded', () => {

  /* ── Header scroll shadow ── */
  const hdr = document.querySelector('.hdr');
  if (hdr) {
    const onScroll = () => hdr.classList.toggle('stuck', window.scrollY > 8);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Mobile nav ── */
  const burger = document.querySelector('.hdr-burger');
  const mobileNav = document.querySelector('.mobile-nav');
  if (burger && mobileNav) {
    burger.addEventListener('click', () => {
      const open = burger.classList.toggle('open');
      mobileNav.classList.toggle('open', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    mobileNav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        burger.classList.remove('open');
        mobileNav.classList.remove('open');
        document.body.style.overflow = '';
      });
    });
  }

  /* ── FAQ accordion ── */
  document.querySelectorAll('.faq-q').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const answer = item.querySelector('.faq-a');
      const isOpen = item.classList.contains('open');

      // Close all
      document.querySelectorAll('.faq-item.open').forEach(openItem => {
        openItem.classList.remove('open');
        openItem.querySelector('.faq-a').style.maxHeight = '0';
      });

      // Open clicked (if it was closed)
      if (!isOpen) {
        item.classList.add('open');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  });

  /* ── Form ── */
  document.querySelectorAll('.js-form').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const btn = form.querySelector('[type="submit"]');
      const orig = btn.textContent;
      btn.textContent = 'Enviando…';
      btn.disabled = true;
      setTimeout(() => {
        btn.textContent = '✓ Mensagem enviada!';
        btn.style.background = '#25d366';
        setTimeout(() => {
          btn.textContent = orig;
          btn.disabled = false;
          btn.style.background = '';
          form.reset();
        }, 3000);
      }, 1200);
    });
  });

  /* ── Active nav link ── */
  const path = window.location.pathname.split('/').filter(Boolean).pop() || 'index.html';
  document.querySelectorAll('.nav-list a').forEach(a => {
    if (a.getAttribute('href') === path ||
        a.getAttribute('href') === './' + path ||
        (path === 'index.html' && (a.getAttribute('href') === '/' || a.getAttribute('href') === './index.html'))) {
      a.classList.add('active');
    }
  });

  /* ── Intersection observer: fade in sections ── */
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

});
