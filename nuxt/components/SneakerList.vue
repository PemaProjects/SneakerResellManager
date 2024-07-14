<template>
    <section class="flex gap-2 mb-6">
        <input type="checkbox" class="col-span-1">
        <div class="w-full grid grid-cols-9 items-center text-xs gap-2">
            <span class="col-span-3 flex items-center gap-2"> <img class="h-auto w-16 object-cover" :src="image" alt="">
                {{ titulo }}</span>
            <span class="col-span-1">{{ precioCompra }}</span>
            <span class="col-span-1">{{ precioVenta }}</span>
            <span class="col-span-1">{{ fechaCompra }}</span>
            <span class="col-span-1">{{ fechaVenta }}</span>
            <!-- <span class="col-span-1 px-3 py-2 text-center w-fit rounded-full" :class="estadoClass">{{ estado }}
            </span> -->
            <select 
                class="col-span-1 px-3 py-2 text-center w-fit rounded-full"
                :class="estadoClass"
                :value="estado"
                @change="updateEstado"
            >
                <option class="bg-[#466145] text-[#93FFB3]" value="Compradas">Compradas</option>
                <option class="bg-[#616045] text-[#FFE193]" value="En venta">En venta</option>
                <option class="bg-[#614545] text-[#FF9393]" value="Vendidas">Vendidas</option>
            </select>
            <span class="col-span-1">{{ beneficio }}</span>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        image: String,
        titulo: String,
        precioCompra: String,
        precioVenta: String,
        fechaCompra: String,
        fechaVenta: String,
        estado: String,
        beneficio: String
    },

    methods: {
        updateEstado(event) {
            this.$emit('updateEstado', event.target.value);
        }
    },

    computed: {
        estadoClass() {
            switch (this.estado) {
                case 'Compradas':
                    return 'bg-[#466145] text-[#93FFB3]';
                case 'En venta':
                    return 'bg-[#616045] text-[#FFE193]';
                case 'Vendidas':
                    return 'bg-[#614545] text-[#FF9393]';
                default:
                    return 'bg-white text-black';
            }
        }
    }
}
</script>

<style lang="scss" scoped></style>