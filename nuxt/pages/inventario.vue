```vue
<template>
    <Layout title="Inventario">
        <h2 class="text-xl font-semibold">Tus sneaker</h2>
        <div class="flex justify-between items-center mt-4">
            <div class="flex bg-background2 rounded-md w-1/3 items-center text-grayText">
                <IconsSearch class="ml-3 size-5" />
                <input class="text-sm rounded-md w-full px-3 py-2 bg-transparent outline-none" v-model="buscar"
                    type="text" placeholder="Buscar">
            </div>
            <button @click="modal = true"
                class="px-6 py-2 bg-primary text-black font-bold text-sm rounded-md flex items-center gap-3 hover:scale-95 duration-200 ">
                <IconsPlus class="size-4" />
                Add new
            </button>
        </div>

        <section class="mt-4">
            <header class="flex gap-2">
                <input type="checkbox" class="col-span-1">
                <div class="w-full grid grid-cols-9 items-center text-xs font-semibold">
                    <span class="col-span-3">Titulo</span>
                    <span class="col-span-1">Precio compra</span>
                    <span class="col-span-1">Precio venta</span>
                    <span class="col-span-1">Fecha compra</span>
                    <span class="col-span-1">Fecha venta</span>
                    <span class="col-span-1">Estado</span>
                    <span class="col-span-1">Beneficio</span>
                </div>
            </header>
            <SneakerList v-for="sneaker in sneakers" :key="sneaker.id" :titulo="sneaker.titulo"
                :precioCompra="sneaker.precioCompra" :precioVenta="sneaker.precioVenta" :fechaCompra="sneaker.fechaCompra"
                :fechaVenta="sneaker.fechaVenta" :estado="sneaker.estado" :beneficio="sneaker.beneficio" />
        </section>
    </Layout>

    <div>
        <Modal v-if="modal" @close="closeModal">
            <AddSneaker @close="closeModal" @sneakerSelected="handleSneakerSelected" />
        </Modal>
    </div>

</template>

<script>
export default {
    data() {
        return {
            buscar: '',
            sneakers: {},
            modal: false
        }
    },

    methods: {

        handleSneakerSelected(sneaker) {
            console.log(sneaker)
        },

        closeModal() {
            this.modal = false
        }
    }
}
</script>