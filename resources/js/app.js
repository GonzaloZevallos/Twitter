require('./bootstrap');


// Import modules...
import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import SvgVue from 'svg-vue';
import moment from 'moment'
import InfiniteLoading from 'vue-infinite-loading';

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(SvgVue);
Vue.use(InfiniteLoading);

// Moment
Vue.prototype.moment = moment
Vue.use(require('vue-moment'));

Vue.filter('uppercase', function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
})

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
