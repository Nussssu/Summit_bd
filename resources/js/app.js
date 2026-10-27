import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import SiteLayout from '@/Layouts/SiteLayout.vue';
import reveal from '@/directives/reveal';

createInertiaApp({
    title: (title) => (title ? `${title} | Freelancer Summit Bangladesh 2027` : 'Freelancer Summit Bangladesh 2027'),
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        page.default.layout ??= SiteLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .directive('reveal', reveal)
            .mount(el);
    },
    progress: { color: '#2563EB' },
});
