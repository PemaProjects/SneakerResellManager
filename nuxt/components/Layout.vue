<template>
    <section class="flex overflow-hidden">
        <SideBar class=""/>

        <main class="w-full h-screen p-6 pl-0">
            <div class="bg-background2 w-full h-full rounded-2xl py-4 px-6">
                <Header class="text-4xl font-semibold" :title="title" />
                <div class="bg-background rounded-2xl py-6 px-6">
                    <slot></slot>
                </div>

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