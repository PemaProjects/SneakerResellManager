<template>
    <Header />
    <div class="flex justify-between items-center mt-24">
        <div class="space-y-8">
            <h1 class="uppercase font-bold text-6xl text-balance">Simplifica la reventa de <span
                    class="text-primary">sneakers</span> y maximiza tus ganancias</h1>
            <p class="text-grayText font-medium w-3/4 text-pretty">Lleva un control preciso de tu
                inventario, gestiona tus ventas y optimiza cada transacción. Ideal para revendedores de sneakers que
                buscan eficiencia y crecimiento.</p>
            <div class="space-x-12 [&>button:hover]:-translate-y-2 [&>button]:transition [&>button]:duration-200">
                <button class="bg-gradient-to-r from-primary to-[#B6D497] text-black font-bold px-4 py-3 rounded-md">Ir
                    al dashboard</button>
                <button class="border-2 border-grayText font-bold px-4 py-3 rounded-md">Administrar sneakers</button>
            </div>
        </div>
        <img class="-rotate-12" src="/public/green-powerpuff.png" alt="">
    </div>
</template>

<script>
import Header from '~/components/Header.vue';

export default {

}
</script>