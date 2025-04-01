import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Layouts/Layout.vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'

createInertiaApp({
  title: (title) => `My App | ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    // This uses the main layout and prevents layout from being child of component
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head', Head)  // ADD THIS - gets rid of imports in layout
      .component('Link', Link)  // ADD THIS - uses links instead of anchor tags
      .mount(el)
  },
  // progress bar
  progress: {
    color: "red",
    includeCSS: true,
    showSpinner: true,
  }
})