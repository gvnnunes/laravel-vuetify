require("./bootstrap");

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import '@mdi/font/css/materialdesignicons.css'

const customTheme = {
    dark: false,
    colors: {},
};

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: "customTheme",
        themes: {
            customTheme,
        },
    },
});

createInertiaApp({
    resolve: (name) => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .mount(el);
    },
});
