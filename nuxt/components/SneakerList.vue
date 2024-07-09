<template>
    <section class="flex gap-2">
        <input type="checkbox" class="col-span-1">
        <div class="w-full grid grid-cols-9 items-center text-xs font-semibold">
            <span class="col-span-3">{{ titulo }}</span>
            <span class="col-span-1">{{ precioCompra }}</span>
            <span class="col-span-1">{{ precioVenta }}</span>
            <span class="col-span-1">{{ fechaCompra }}</span>
            <span class="col-span-1">{{ fechaVenta }}</span>
            <span class="col-span-1">{{ estado }}</span>
            <span class="col-span-1">{{ beneficio }}</span>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        titulo: String,
        precioCompra: String,
        precioVenta: String,
        fechaCompra: String,
        fechaVenta: String,
        estado: String,
        beneficio: String
    }
}
</script>

<style lang="scss" scoped></style>