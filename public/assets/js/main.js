document.addEventListener("DOMContentLoaded", () => {
    feather.replace();

    // ###########################################################
    // Navbar functions
    // ###########################################################
    // Initialize highlighting the active section in the menu
    const sections = document.querySelectorAll('section[id], header[id]');
    const navLinks = document.querySelectorAll('#main-nav a');
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const id = entry.target.getAttribute('id');
            navLinks.forEach(link => {
                link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
            });
        });
    }, {
        rootMargin: '-40% 0px -45% 0px',
        threshold: 0
    });
    document.querySelectorAll('section[id], header[id]').forEach(section => sectionObserver.observe(section));

    // Smooth scroll for internal anchors on the current page
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (!href) return;

            const url = new URL(href, window.location.href);

            const normalize = (path) => {
                if (path === '/index.php') return '/';
                return path.replace(/\/+$/, '') || '/';
            };

            const currentPath = normalize(window.location.pathname);
            const targetPath = normalize(url.pathname);

            if (!url.hash || currentPath !== targetPath) return;

            const targetId = url.hash.slice(1);
            const target = document.getElementById(targetId);

            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.replaceState(null, '', url.hash);
            }
        });
    });

    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.getElementById('main-nav');
    menuToggle && menuToggle.addEventListener('click', function () {
        const isOpen = mainNav.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        const icon = menuToggle.querySelector('i');
        if (isOpen) icon.setAttribute('data-feather', 'x'); else icon.setAttribute('data-feather', 'menu');
        feather.replace();
    });

    // Close menu when clicking a link (mobile)
    document.querySelectorAll('#main-nav a').forEach(a => a.addEventListener('click', () => {
        if (mainNav.classList.contains('open')) {
            mainNav.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.querySelector('i').setAttribute('data-feather', 'menu');
            feather.replace();
        }
    }));
    // Close mobile menu on escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mainNav.classList.contains('open')) {
            mainNav.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.querySelector('i').setAttribute('data-feather', 'menu');
            feather.replace();
        }
    });
    // Close mobile menu on click outside of it on the screen
    document.addEventListener('click', (e) => {
        if (!mainNav.classList.contains('open')) return;

        const isClickInsideMenu = mainNav.contains(e.target);
        const isClickOnToggle = menuToggle.contains(e.target);
        if (!isClickInsideMenu && !isClickOnToggle) {
            mainNav.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.querySelector('i').setAttribute('data-feather', 'menu');
            feather.replace();
        }
    });

    // ###########################################################
    // Hero functions
    // ###########################################################
    // Initialize hero image animation (desktop only)
    const heroCard = document.querySelector('.hero-photo-card');
    function updateHeroParallax() {
        if (!heroCard || window.innerWidth <= 980) return;
        const scrolled = window.scrollY;
        heroCard.style.transform = `translateY(${Math.min(scrolled * 0.08, 18)}px)`;
    }
    window.addEventListener('scroll', updateHeroParallax, { passive: true });
    updateHeroParallax();

    // ###########################################################
    // Process/proof functions
    // ###########################################################
    // Initialize fade-in of each step on scroll visibility
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12
    });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));


    // ###########################################################
    // FAQ functions
    // ###########################################################
    // Only one item open at a time in the accordion
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        item.addEventListener('toggle', () => {
            if (!item.open) return;

            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.removeAttribute('open');
                }
            });
        });
    });

    // ###########################################################
    // Contact form functions
    // ###########################################################
    // Handle form submit
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    const formError = document.getElementById('formError');
    const successModal = document.getElementById('successModal');
    let modalTimer = null;

    function showSuccessModal() {
        successModal.classList.add('is-visible');
        successModal.setAttribute('aria-hidden', 'false');
        feather.replace();

        clearTimeout(modalTimer);
        modalTimer = setTimeout(() => {
            hideSuccessModal();
        }, 3200);
    }

    function hideSuccessModal() {
        successModal.classList.remove('is-visible');
        successModal.setAttribute('aria-hidden', 'true');
    }

    function startLoadingAnimation(button, baseText = 'Wird gesendet') {
        let dots = 0;
        const interval = setInterval(() => {
            dots = (dots + 1) % 4; // 0 → 3
            button.textContent = baseText + ' ' + '.'.repeat(dots);
        }, 300);

        return interval;
    }

    function stopLoadingAnimation(interval, button, defaultText) {
        clearInterval(interval);
        button.textContent = defaultText;
    }

    const MIN_LOADING_TIME = 2000;
    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        formError.textContent = '';

        if (!form.reportValidity()) return;

        submitBtn.disabled = true;
        const defaultButtonText = submitBtn.textContent;
        const loadingAnimation = startLoadingAnimation(submitBtn);

        try {
            const formData = new FormData(form);
            const requestPromise = fetch('/contact.php', {
                method: 'POST',
                body: formData
            });
            const delayPromise = new Promise(resolve =>
                setTimeout(resolve, MIN_LOADING_TIME)
            );
            const [responseResult] = await Promise.all([
                requestPromise.then(
                    response => ({ ok: true, response }),
                    error => ({ ok: false, error })
                ),
                delayPromise
            ]);

            if (!responseResult.ok) {
                throw responseResult.error;
            }

            const response = responseResult.response;
            const result = await response.json();

            if (response.status === 422) {
                formError.textContent = result.error || 'Bitte prüfen Sie Ihre Eingaben.';
                return;
            }

            if (!response.ok) {
                throw new Error('Server error');
            }

            if (result.success) {
                form.reset();
                showSuccessModal();
            } else {
                formError.textContent = 'Ihre Anfrage konnte gerade nicht gesendet werden. Bitte versuchen Sie es erneut.';
            }
        } catch (error) {
            formError.textContent = 'Beim Senden ist ein Problem aufgetreten. Bitte versuchen Sie es in wenigen Augenblicken erneut.';
        } finally {
            submitBtn.disabled = false;
            stopLoadingAnimation(loadingAnimation, submitBtn, defaultButtonText);
        }
    });

    // Form validation messages
    document.querySelectorAll("input, textarea").forEach(field => {
        field.addEventListener("invalid", function () {
            this.setCustomValidity("");

            if (this.validity.valueMissing) {
                this.setCustomValidity("Dieses Feld ist erforderlich.");
            } else if (this.validity.typeMismatch && this.type === "email") {
                this.setCustomValidity("Bitte geben Sie eine gültige E-Mail-Adresse ein.");
            } else if (this.validity.patternMismatch && this.type === "tel") {
                this.setCustomValidity("Bitte geben Sie eine gültige Telefonnummer ein.");
            }
        });
        field.addEventListener("input", function () {
            this.setCustomValidity("");
            formError.textContent = '';
        });
    });
});