<template>
    <button class="hover:text-primary">
        <IconsExit class="size-7"/>
        <span class="hidden">Logout</span>
    </button>
</template>

<script>
    export default {
        methods: {
            logout() {
                console.log('Logging out ...');

                console.log('logged out!');
            }
        }
    }
</script>