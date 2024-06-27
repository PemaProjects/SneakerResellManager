<template>
    <Section-Info&Image image="/green-bg.png" infoRight>
        <header class="flex flex-col justify-center items-center gap-3">
            <Logo class="size-12 md:size-14 2xl:size-16 2xl:mb-2" />
            <h1 class="text-2xl md:text-3xl 2xl:text-4xl font-bold">Bienvenido!</h1>
            <p class="text-xs md:text-base 2xl:text-base w-2/3 text-center text-pretty">Únete y lleva una gestion sencilla y
                comoda de todas tus sneakers</p>
        </header>

        <form @submit.prevent="register" class="w-[60%] text-center space-y-3">
            <div class="w-full flex gap-2 justify-center items-center">
                <input v-model="name" :class="{ 'border-white': name }"
                    class="w-full text-white text-sm py-2 px-4 rounded-md border border-grayText outline-none bg-background focus:border-primary focus:bg-transparent placeholder:text-grayText"
                    type="text" placeholder="Nombre">
                <input v-model="surname" :class="{ 'border-white': surname }"
                    class="w-full text-white text-sm py-2 px-4 rounded-md border border-grayText outline-none bg-background focus:border-primary focus:bg-transparent placeholder:text-grayText"
                    type="text" placeholder="Apellido">
            </div>
            <InputEmail placeholder="Correo" v-model="email" />
            <InputPassword placeholder="Contraseña" v-model="password" />
            <InputPassword placeholder="Repetir contraseña" v-model="repPassword" />

            <div class="flex items-center gap-1">
                <input type="checkbox" class="checkbox-primary">
                <p class="text-[10px] font-semibold text-grayText">Acepto todos los <span class="text-primary">terminos
                        y condiciones</span></p>
            </div>

            <button type="submit"
                class="bg-primary text-white text-sm font-bold w-full py-2 rounded-md hover:bg-primary/70 transition duration-200">Sign
                in</button>
            <GoogleButton>Sign in with Google</GoogleButton>
        </form>

        <footer class="flex justify-center items-center text-xs gap-1">
            <p>¿ Ya tienes cuenta ?</p>
            <NuxtLink to="/login" class="text-primary font-semibold hover:text-primary/80 transition duration-200">
                Log in
            </NuxtLink>
        </footer>


    </Section-Info&Image>
</template>

<script>
import comManager from '@/comManager.js';

export default {
    data() {
        return {
            name: '',
            surname: '',
            email: '',
            password: '',
            repPassword: ''
        }
    },

    methods: {
        async register (){
            console.log('Registrando...');
            await comManager.userRegister(this.name, this.surname, this.email, this.password, this.repPassword)
            console.log('Registrado!');
        }
    }
}
</script>