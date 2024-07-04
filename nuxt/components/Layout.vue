<template>
    <section class="flex">
        <SideBar class=""/>

        <main class="w-full h-screen p-6 pl-0">
            <div class="bg-background2 w-full h-full rounded-2xl py-4 px-6">
                <Header class="text-4xl font-semibold" :title="title" />
                <slot></slot>

            </div>
        </main>
    </section>
</template>

<script>
    export default {
        props: {
            title: String
        }

    }
</script>