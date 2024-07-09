<template>
    <section class="w-full flex justify-between items-center">
        <h1>{{ title }}</h1>
        <div class="flex items-center gap-6">
            <button>
                <IconsNotification class="size-7" />
            </button>
            <img class="size-10 object-cover rounded-full" src="https://i.pinimg.com/736x/4d/8f/ce/4d8fcea1a8efb1d2389859dbbe3514de.jpg" alt="">
        </div>
    </section>
</template>

<script>
export default {
    props: {
        title: String
    }
}
</script>

<style lang="scss" scoped>

</style>