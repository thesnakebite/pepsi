require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { __, trans, setLocale, getLocale, transChoice, MaticeLocalizationConfig, locales } from "matice"
import { createHead } from '@vueuse/head'
import { VueReCaptcha } from 'vue-recaptcha-v3'
import VueGtag from 'vue-gtag'

import {
    ElSelect,
    ElOption
} from 'element-plus';

import "element-plus/dist/index.css"

const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        })
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(createHead())
    .use(VueReCaptcha, {
        siteKey: window.grcptch,
        loaderOptions: {
            useRecaptchaNet: true,
            autoHideBadge: true
        }
    })
    .use(VueGtag, {
        bootstrap: false
    })
    // .use(VueAnalytics, { id: "UA-211164692-2" })
    .use(ElSelect)
    .use(ElOption)
    .mixin({
        methods: {
            $trans: trans,
            $__: __,
            $transChoice: transChoice,
            $setLocale(locale) {
                setLocale(locale);
                this.$forceUpdate() // Refresh the vue instance(The whole app in case of SPA) after the locale changes.
            },
            // The current locale
            $locale() {
                return getLocale()
            },
            // A listing of the available locales
            $locales() {
                return locales()
            }
        }
    })
    .mount(el);

InertiaProgress.init({ color: '#4B5563' });