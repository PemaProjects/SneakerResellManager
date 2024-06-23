<template>
    <div>
        Redirecting...
    </div>
</template>

<script>
    import comManager from '@/comManager.js';

    export default {
        async mounted() {
            const token = this.$route.query.token;
            if (token) {
                console.log("Primero devuelvo el token para despues poder obtener el usuario: " ,token);
                const res = await comManager.getUser(token);
                console.log("Esta es la info del usuario utilizando el token" ,res);
                this.$router.push('/');
            } else {
                console.error('No token found');
                this.$router.push('/login');
            }
        }
    }
</script>