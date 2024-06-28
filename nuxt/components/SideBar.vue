<template>
    <div class="fixed top-0 left-0 h-screen flex flex-col gap-12">
        <div class="flex flex-col gap-6">
            <Logo/>
            <NuxtLink to="/inventory" class="">

                <span>Dashboard</span>
            </NuxtLink>
        </div>

        <div>
            Logout
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>