import { onMounted, onUnmounted, reactive } from 'vue';

export function useCountdown(target) {
    const left = reactive({ days: 0, hours: 0, minutes: 0, seconds: 0, done: false });
    const tick = () => {
        const diff = Math.max(0, new Date(target).getTime() - Date.now());
        Object.assign(left, {
            days: Math.floor(diff / 864e5),
            hours: Math.floor((diff / 36e5) % 24),
            minutes: Math.floor((diff / 6e4) % 60),
            seconds: Math.floor((diff / 1e3) % 60),
            done: diff === 0,
        });
    };
    let id;
    tick();
    onMounted(() => (id = setInterval(tick, 1000)));
    onUnmounted(() => clearInterval(id));
    return left;
}
