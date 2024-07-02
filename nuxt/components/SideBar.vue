<template>
    <section>
        <nav :style="{ width: active ? '20rem' : '8rem' }"
            class="h-screen fixed top-0 left-0 flex flex-col gap-12 py-10 px-12 transition-all duration-500 ease-in-out border"
            @mouseover="active = true" @mouseleave="active = false">
            <div class="h-full flex flex-col justify-between items-center">
                <div :class="active ? '[&>a]:px-4 [&>a]:w-full' : ''"
                    class="flex flex-col justify-center items-start gap-6 [&>a]:text-white [&>a]:py-3 [&>a]:transition [&>a]:rounded-md [&>a]:duration-200 [&>a:hover]:bg-selected [&>a:hover]:text-primary">
                    <div class="flex gap-4 items-center">
                        <Logo class="size-10" />
                        <h1 :class="active ? 'block' : 'hidden'" class="text-3xl font-bold">SNKRSMAN</h1>
                    </div>
                    <NuxtLink to="/dashboard" exact-active-class="text-primary" class="flex items-center gap-3">
                        <IconsDashboard class="size-7" />
                        <span :class="active ? 'block' : 'hidden'">Dashboard</span>
                    </NuxtLink>

                    <NuxtLink to="/inventario" exact-active-class="text-primary" class="flex items-center gap-3">
                        <IconsList class="size-7" />
                        <span :class="active ? 'block' : 'hidden'">Inventario</span>
                    </NuxtLink>

                    <NuxtLink to="/estadisticas" exact-active-class="text-primary" class="flex items-center gap-3">
                        <IconsStatistics class="size-7" />
                        <span :class="active ? 'block' : 'hidden'">Estadisticas</span>
                    </NuxtLink>

                    <NuxtLink to="/tickets" exact-active-class="text-primary" class="flex items-center gap-3">
                        <IconsTicket class="size-7" />
                        <span :class="active ? 'block' : 'hidden'">Tickets</span>
                    </NuxtLink>

                    <NuxtLink to="/perfil" exact-active-class="text-primary" class="flex items-center gap-3">
                        <IconsProfile class="size-7" />
                        <span :class="active ? 'block' : 'hidden'">Perfil</span>
                    </NuxtLink>

                    <NuxtLink to="/settings" exact-active-class="text-primary" class="flex items-center gap-3">
                        <IconsSetting class="size-7" />
                        <span :class="active ? 'block' : 'hidden'">Ajustes</span>
                    </NuxtLink>
                </div>

                <button :class="active ? 'px-4 w-full' : ''"
                    class="flex  items-center gap-3 py-3 transition duration-200 hover:bg-[#BB6C6C]/10 hover:text-[#BB6C6C] rounded-md">
                    <IconsExit class="size-7" />
                    <span :class="active ? 'block' : 'hidden'">Logout</span>
                </button>
            </div>
        </nav>

    </section>
</template>

<script>
export default {
    data() {
        return {
            active: false
        }
    }
}
</script>

<style scoped>
/* .active{
        color: #FFC107;
    } */
</style>