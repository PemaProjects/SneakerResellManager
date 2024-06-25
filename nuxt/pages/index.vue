<template>
    <Header />
    <div class="flex flex-col lg:flex-row justify-between gap-10 lg:gap-0 items-center mt-10 md:mt-16 lg:mt-24">
        <div class="space-y-4 md:space-y-6 lg:space-y-8">
            <h1 class="uppercase font-bold text-2xl text-center text-balance md:text-4xl lg:text-left lg:text-[42px] 2xl:text-6xl">Simplifica la reventa de <span
                    class="text-primary">sneakers</span> y maximiza tus ganancias</h1>
            <p class="text-grayText font-medium text-pretty text-center md:w-3/4 md:mx-auto lg:mx-0 lg:text-left 2xl:w-3/4">Nuestra plataforma ayuda a revendedores de sneakers a gestionar inventario y ventas eficientemente.</p>
            <div class="text-xs flex justify-between md:justify-center md:gap-10 md:text-sm lg:text-base lg:block lg:space-x-12 [&>button:hover]:-translate-y-2 [&>button]:transition [&>button]:duration-200">
                <button class="  bg-gradient-to-r from-primary to-[#B6D497] text-black font-bold px-4 py-3 rounded-md">Ir
                    al dashboard</button>
                <button class=" border-2 border-grayText font-bold px-4 py-3 rounded-md">Administrar sneakers</button>
            </div>
        </div>
        <img class="-rotate-[20deg] md:-rotate-12 lg:w-2/5 2xl:w-full" src="/public/green-powerpuff.png" alt="">
    </div>
</template>

<script>

export default {

}
</script>