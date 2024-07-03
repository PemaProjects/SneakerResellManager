<template>
    <section class="flex">
        <SideBar class="border"/>

        <main class="w-full h-screen p-6">
            <div class="bg-background2 w-full h-full rounded-2xl p-4">
                
                <slot></slot>

            </div>
        </main>
    </section>
</template>

<script>
    export default {
        

    }
</script>