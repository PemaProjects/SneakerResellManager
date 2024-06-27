<template>
    <Section-Info&Image image="/sneakers-bg.jpg">
        <header class="flex flex-col justify-center items-center gap-3">
            <Logo class="size-16 mb-2" />
            <h1 class="text-3xl md:text-4xl font-bold">Bienvenido!</h1>
            <p class="text-sm md:text-base w-2/3 text-center text-pretty">Únete y lleva una gestion sencilla y
                comoda de todas tus sneakers</p>
        </header>

        <form @submit.prevent="login" class="w-[60%] text-center space-y-4">
            <div class="relative">
                <input type="text" placeholder="Correo" v-model="email" @focus="emailFocus = true"
                    @blur="emailFocus = false" :class="{ 'border-white': email }"
                    class="w-full text-white text-sm py-2 px-4 rounded-md border border-grayText outline-none bg-background focus:border-primary focus:bg-transparent placeholder:text-grayText pr-10">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <IconsEmail
                        :class="{ '!text-primary': emailFocus, 'text-gray-400': !emailFocus && !email, 'text-white': email }"
                        class="size-5" />
                </div>
            </div>


            <div class="relative">
                <input type="password" placeholder="Contraseña" v-model="password" @focus="passwordFocus = true"
                    @blur="passwordFocus = false" :class="{ 'border-white': password }"
                    class="w-full text-white text-sm py-2 px-4 rounded-md border border-grayText outline-none bg-background focus:border-primary focus:bg-transparent placeholder:text-grayText pr-10">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <IconsLock
                        :class="{ '!text-primary': passwordFocus, 'text-gray-400': !passwordFocus && !password, 'text-white': password }"
                        class="size-5" />
                </div>
            </div>
            <div class="w-full flex justify-between items-center pb-3">
                <div class="flex items-center gap-1">
                    <input type="checkbox" class="checkbox-primary">
                    <p class="text-[10px] font-semibold text-grayText">Recordar contraseña</p>
                </div>
                <NuxtLink to="/forgot-password"
                    class="text-[10px] font-semibold text-primary hover:text-primary/80 transition duration-200">
                    Recuperar contraseña</NuxtLink>
            </div>

            <button :class="{ 'py-2': !loading }"
                class=" bg-primary text-white text-sm font-bold w-full rounded-md hover:bg-primary/70 transition duration-200">
                    <span v-if="!loading" key="text">Log in</span>
                    <Loader v-if="loading" key="loader" />
            </button>

            <GoogleButton @click="loginGoogle">Log in with Google</GoogleButton>
        </form>

        <footer class="flex justify-center items-center text-xs gap-1">
            <p>¿ No tienes cuenta ?</p>
            <NuxtLink to="/register" class="text-primary font-semibold hover:text-primary/80 transition duration-200">
                Registrate
            </NuxtLink>
        </footer>
    </Section-Info&Image>
</template>

<script>
import comManager from '@/comManager.js';

export default {
    data() {
        return {
            email: '',
            emailFocus: false,
            password: '',
            passwordFocus: false,
            loading: false
        };
    },
    methods: {
        async login() {
            console.log('Logging in ...');
            this.loading = true
            await comManager.userLogin(this.email, this.password);
            this.loading = false
            console.log('logged in!');
            this.$router.push('/');
        },

        async loginGoogle() {
            await comManager.registerGoogle();
        }
    }
}
</script>

<style>
.checkbox-primary:checked {
    accent-color: #90BB6C;
}
</style>