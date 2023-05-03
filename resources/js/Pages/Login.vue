<template>
    <v-app>
        <v-row no-gutters>
            <v-col cols="12" md="5">
                <div
                    class="d-flex align-center justify-center fill-height login-form-layout"
                >
                    <v-sheet class="w-100">
                        <v-img
                            width="300"
                            aspect-ratio="16/9"
                            cover
                            src="/images/myanimelist.webp"
                            class="mx-auto"
                        ></v-img>
                        <v-window v-model="step">
                            <v-window-item :value="1">
                                <v-card-title class="text-h5 text-center mt-6"
                                    >Acessar sua conta</v-card-title
                                >
                                <p
                                    v-if="errors.erro"
                                    class="text-subtitle-1 text-red-darken-1 text-center"
                                >
                                    {{ errors.erro }}
                                </p>
                                <p
                                    v-if="$page.props.message"
                                    class="text-subtitle-1 text-green-darken-1 text-center"
                                >
                                    {{ $page.props.message }}
                                </p>
                                <v-form
                                    ref="formLogin"
                                    @submit.prevent="submit('login')"
                                >
                                    <v-row
                                        class="align-center justify-center pa-10 mr-0"
                                    >
                                        <v-col cols="12" sm="8">
                                            <v-text-field
                                                v-model="form.login.email"
                                                label="E-mail"
                                                variant="outlined"
                                                color="indigo"
                                                type="email"
                                                :rules="rules.email"
                                                hide-details="auto"
                                                autocomplete="email"
                                                :error-messages="
                                                    form.login.errors.email
                                                "
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="8">
                                            <v-text-field
                                                v-model="form.login.password"
                                                label="Senha"
                                                :append-inner-icon="
                                                    viewPassword
                                                        ? 'mdi-eye-off'
                                                        : 'mdi-eye'
                                                "
                                                variant="outlined"
                                                color="indigo"
                                                :type="
                                                    viewPassword
                                                        ? 'text'
                                                        : 'password'
                                                "
                                                @click:append-inner="
                                                    togglePassword
                                                "
                                                :rules="rules.password"
                                                hide-details="auto"
                                                autocomplete="current-password"
                                                :error-messages="
                                                    form.login.errors.password
                                                "
                                            >
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="8" class="py-0">
                                            <div
                                                class="d-flex justify-center align-center"
                                            >
                                                <v-checkbox
                                                    v-model="
                                                        form.login.rememberMe
                                                    "
                                                    label="Lembrar-me"
                                                    color="indigo"
                                                    hide-details="auto"
                                                ></v-checkbox>
                                                <span
                                                    role="button"
                                                    class="text-indigo text-decoration-underline"
                                                    @click="step++"
                                                    >Esqueceu a senha?</span
                                                >
                                            </div>
                                        </v-col>
                                        <v-col cols="12" sm="8">
                                            <v-btn
                                                size="large"
                                                prepend-icon="mdi-login"
                                                color="indigo"
                                                block
                                                type="submit"
                                                >Entrar</v-btn
                                            >
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-window-item>
                            <v-window-item :value="2">
                                <v-card-title class="text-h5 text-center mt-6"
                                    >Recuperar sua senha</v-card-title
                                >
                                <v-row class="align-center justify-center">
                                    <v-col cols="10">
                                        <p class="text-subtitle-1 text-center">
                                            Informe o e-mail associado à sua
                                            conta para alterar sua senha.
                                        </p>
                                    </v-col>
                                    <v-col v-if="$page.props.status" cols="11">
                                        <v-alert type="success" closable>
                                            {{ $page.props.status }}
                                        </v-alert>
                                    </v-col>
                                </v-row>
                                <v-form
                                    ref="formForgotPassword"
                                    @submit.prevent="submit('forgotPassword')"
                                >
                                    <v-row
                                        class="align-center justify-center pa-10 mr-0"
                                    >
                                        <v-col cols="12" sm="8">
                                            <v-text-field
                                                v-model="
                                                    form.forgotPassword.email
                                                "
                                                label="E-mail"
                                                variant="outlined"
                                                color="indigo"
                                                type="email"
                                                :rules="rules.email"
                                                hide-details="auto"
                                                autocomplete="email"
                                                :error-messages="
                                                    form.forgotPassword.errors
                                                        .email
                                                "
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="8">
                                            <v-btn
                                                size="large"
                                                color="indigo"
                                                block
                                                type="submit"
                                                >Continuar</v-btn
                                            >
                                        </v-col>
                                    </v-row>
                                </v-form>
                                <div class="d-flex align-center justify-center">
                                    <v-btn
                                        prepend-icon="mdi-chevron-left"
                                        variant="text"
                                        class="text-center"
                                        @click="step--"
                                    >
                                        Voltar para a página de acesso
                                    </v-btn>
                                </div>
                            </v-window-item>
                        </v-window>
                    </v-sheet>
                </div>
            </v-col>
            <v-col cols="7" class="d-none d-md-block">
                <v-sheet class="rounded-0 fill-height">
                    <v-carousel
                        cycle
                        hide-delimiters
                        :show-arrows="false"
                        transition="10000"
                        class="fill-height"
                    >
                        <v-carousel-item
                            cover
                            src="/images/login/nezuko.jpg"
                            class="fill-height login-thumb top"
                        ></v-carousel-item>

                        <v-carousel-item
                            cover
                            src="/images/login/rimuru.jpg"
                            class="fill-height login-thumb"
                        ></v-carousel-item>

                        <v-carousel-item
                            cover
                            src="/images/login/oshinoko.jpg"
                            class="fill-height login-thumb"
                        ></v-carousel-item>
                    </v-carousel>
                </v-sheet>
            </v-col>
        </v-row>
    </v-app>
</template>
<script>
export default {
    props: {
        errors: Object,
    },
    data() {
        return {
            form: {
                login: this.$inertia.form({
                    email: null,
                    password: null,
                    rememberMe: false,
                }),
                forgotPassword: this.$inertia.form({
                    email: null,
                }),
            },
            viewPassword: false,
            rules: {
                email: [
                    (value) => {
                        if (value) return true;

                        return "Insira seu e-mail.";
                    },
                ],
                password: [
                    (value) => {
                        if (value) return true;

                        return "Insira sua senha.";
                    },
                ],
            },
            step: 1,
        };
    },
    methods: {
        togglePassword() {
            this.viewPassword = !this.viewPassword;
        },
        async submit(form) {
            if (form == "login") {
                const isValid = await this.$refs.formLogin.validate();

                if (isValid.valid) {
                    this.form.login.post("/login");
                }
            } else if (form == "forgotPassword") {
                const isValid = await this.$refs.formForgotPassword.validate();

                if (isValid.valid) {
                    this.form.forgotPassword.post("/esqueceu-senha");
                }
            }
        },
    },
    watch: {
        "form.login.email"() {
            this.form.login.errors = {};
        },
        "form.login.password"() {
            this.form.login.errors = {};
        },
        "form.forgotPassword.email"() {
            this.form.forgotPassword.errors = {};
        },
    },
};
</script>
<style>
html {
    overflow: auto;
}
.login-thumb.top img {
    object-position: top;
}
.login-thumb .v-responsive__sizer {
    padding-bottom: 0 !important;
}
.login-form-layout .v-window__container,
.login-form-layout .v-window-item {
    height: 500px !important;
}
</style>
<style lang="scss" scoped>
@import "./styles/login.scss";
</style>
