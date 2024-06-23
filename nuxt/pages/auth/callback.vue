<template>
    <div>
        Redirecting...
    </div>
</template>

<script>
    export default {
        async mounted() {
            const token = this.$route.query.token;
            if (token) {
                console.log(token);
                this.$router.push('/');
            } else {
                console.error('No token found');
                this.$router.push('/login');
            }
        }
    }
</script>