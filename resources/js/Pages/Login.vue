<template>
    <v-app class="overflow-auto">
        <v-row no-gutters>
            <v-col cols="5">
                <v-sheet>
                    <v-card-title class="text-h4 text-center mt-16"
                        >Acessar sua conta</v-card-title
                    >
                    <v-row class="align-center justify-center pa-10 mt-10">
                        <v-col cols="12" sm="8">
                            <v-text-field
                                v-model="form.email"
                                label="E-mail"
                                variant="outlined"
                                color="indigo"
                                type="email"
                                hide-details="auto"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="8">
                            <v-text-field
                                v-model="form.password"
                                label="Senha"
                                :append-inner-icon="viewPassword ? 'mdi-eye-off' : 'mdi-eye'"
                                variant="outlined"
                                color="indigo"
                                :type="viewPassword ? 'text' : 'password'"
                                @click:append-inner="togglePassword"
                                hide-details="auto"
                            >
                            </v-text-field>
                        </v-col>
                        <v-col cols="12" sm="8">
                            <v-btn
                            size="large"
                            prepend-icon="mdi-login"
                            color="indigo"
                            block
                            >Entrar</v-btn>
                            <div class="d-flex justify-end">
                                <span role="button" @click="" class="text-subtitle-2 text-decoration-underline text-grey-darken-1 mt-2">Esqueceu a senha?</span>
                            </div>
                        </v-col>
                    </v-row>
                </v-sheet>
            </v-col>
            <v-col cols="7">
                <v-sheet color="indigo" class="rounded-0 h-100"></v-sheet>
            </v-col>
        </v-row>
    </v-app>
</template>
<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
            viewPassword: false,
        };
    },
    methods: {
        togglePassword() {
            this.viewPassword = !this.viewPassword;
        },
    },
};
</script>
<style></style>
