<template>
    <section class="flex">
        <SideBar class=""/>

        <main class="w-full h-screen p-6 pl-0 flex flex-col">
            <div class="bg-background2 w-full h-full rounded-2xl py-4 pb-6 px-6 flex flex-col">
                <Header class="text-4xl font-semibold pt-4" :title="title" />
                <div class="w-full flex-1 bg-background rounded-2xl py-6 px-8 mt-6">
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
