import { onMounted, onUnmounted, ref } from 'vue';

// Progress (0 → 1) of an element travelling through the viewport.
// mode 'through': 0 when its top hits the viewport bottom, 1 when its bottom leaves the top.
// mode 'sticky':  0 when its top hits the viewport top, 1 when its bottom hits the viewport bottom
//                 (for tall wrappers around a sticky child).
export function useScrollProgress(el, { mode = 'through' } = {}) {
    const progress = ref(0);
    const reduced = typeof window !== 'undefined' && matchMedia('(prefers-reduced-motion: reduce)').matches;
    let raf = 0;

    const measure = () => {
        raf = 0;
        if (!el.value) return;
        const r = el.value.getBoundingClientRect();
        const vh = window.innerHeight;
        const p = mode === 'sticky'
            ? -r.top / Math.max(1, r.height - vh)
            : (vh - r.top) / (vh + r.height);
        progress.value = Math.min(1, Math.max(0, p));
    };
    const onScroll = () => { if (!raf) raf = requestAnimationFrame(measure); };

    onMounted(() => {
        if (reduced) { progress.value = 1; return; }
        measure();
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
    });
    onUnmounted(() => {
        cancelAnimationFrame(raf);
        window.removeEventListener('scroll', onScroll);
        window.removeEventListener('resize', onScroll);
    });

    return progress;
}
