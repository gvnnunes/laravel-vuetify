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
                            src="/images/globalview.png"
                            class="mx-auto"
                        ></v-img>
                        <v-card-title class="text-h5 text-center mt-6"
                            >Redefinir sua senha</v-card-title
                        >
                        <p class="text-subtitle-1 text-center">
                            Preencha o formulário corretamente para redefinir sua senha.
                        </p>
                        <v-form ref="form" @submit.prevent="submit()">
                            <v-row
                                class="align-center justify-center pa-10 mr-0"
                            >
                                <v-col cols="12" sm="8">
                                    <v-text-field
                                        v-model="form.email"
                                        label="E-mail"
                                        variant="outlined"
                                        color="indigo"
                                        type="email"
                                        :rules="rules.email"
                                        hide-details="auto"
                                        autocomplete="off"
                                        :error-messages="
                                            form.errors.email
                                        "
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="8">
                                    <v-text-field
                                        v-model="form.password"
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
                                        autocomplete="off"
                                        :error-messages="
                                            form.errors.password
                                        "
                                    >
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" sm="8">
                                    <v-text-field
                                        v-model="form.password_confirmation"
                                        label="Confirmar Senha"
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
                                        :rules="rules.password_confirmation"
                                        hide-details="auto"
                                        autocomplete="off"
                                        :error-messages="
                                            form.errors.password_confirmation
                                        "
                                    >
                                    </v-text-field>
                                </v-col>
                                <v-col cols="12" sm="8">
                                    <v-btn
                                        size="large"
                                        color="indigo"
                                        block
                                        type="submit"
                                        >Redefinir</v-btn
                                    >
                                </v-col>
                            </v-row>
                        </v-form>
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
        token: String,
        email: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: null,
                password_confirmation: null,
            }),
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
                password_confirmation: [
                    (value) => {
                        if (value) return true;

                        return "Insira sua senha novamente.";
                    },
                ],
            },
        };
    },
    methods: {
        togglePassword() {
            this.viewPassword = !this.viewPassword;
        },
        async submit() {
            const isValid = await this.$refs.form.validate();

            if (isValid.valid) {
                this.form.post('/recuperar-senha');
            }
        }
    },
    watch: {
        "form.email"() {
            this.form.errors = {};
        },
        "form.password"() {
            this.form.errors = {};
        },
        "form.password_confirmation"() {
            this.form.errors = {};
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
</style>
<style lang="scss" scoped>
@import "./styles/login.scss";
</style>
