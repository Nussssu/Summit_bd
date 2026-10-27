// v-reveal            → fade up when scrolled into view
// v-reveal="'left'"   → direction variant (left | right | zoom)
// v-reveal:120        → delay in ms (arg)
const observer = typeof window !== 'undefined' && 'IntersectionObserver' in window
    ? new IntersectionObserver((entries) => {
        entries.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add('is-visible');
                observer.unobserve(e.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 })
    : null;

export default {
    mounted(el, binding) {
        el.setAttribute('data-reveal', binding.value || 'up');
        if (binding.arg) el.style.setProperty('--reveal-delay', `${binding.arg}ms`);
        observer ? observer.observe(el) : el.classList.add('is-visible');
    },
    unmounted(el) {
        observer?.unobserve(el);
    },
};
