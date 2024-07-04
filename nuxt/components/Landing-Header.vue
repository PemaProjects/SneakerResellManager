<template>
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-2 md:gap-4 py-4">
            <Logo class="size-10 md:size-16" />
            <h1 class="md:text-2xl font-bold">SNKRSMAN</h1>
        </div>

        <NuxtLink to="/login" class="text-xs md:text-base inline-block md:border border-white font-bold py-2 px-5 rounded-md hover:bg-white hover:text-black transition duration-200">Log In</NuxtLink>
    </div>
</template>

<script>
export default {

}
</script>