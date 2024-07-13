<template>
    <div @click="closeModal"
        class="absolute top-0 left-0 w-screen h-screen backdrop-blur-sm flex justify-center items-start">
        <div @click.stop class="relative bg-background2 px-20 py-10 mt-10 rounded-lg">
            <h3 class="text-sm text-grayText font-semibold">Añade una nueva sneaker</h3>
            <!-- Contenedor del input con posicionamiento relativo -->
            <div class="relative flex bg-background2 rounded-md w-full items-center border text-grayText mt-2">
                <IconsSearch class="ml-3 size-7" />
                <input class="text-xl font-semibold rounded-md w-96 px-3 py-2 bg-transparent outline-none"
                    v-model="buscar" @input="searchSneaker" type="text" placeholder="Buscar sneaker">

                <div v-if="buscar && sneakers"
                    class="absolute top-full left-0 mt-1 w-full rounded-md overflow-hidden bg-background">
                    <button v-for="sneaker in sneakers" :key="sneaker.id" @click="selectSneaker(sneaker)"
                        class="flex items-center gap-2 bg-background2 px-3 py-2 w-full text-left hover:bg-primary hover:text-white transition duration-100">
                        <img class="h-auto w-14 object-cover" :src="sneaker.img" alt="">
                        <p>{{ sneaker.name }}</p>
                    </button>
                    <p>{{ sneaker }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import comManager from '@/comManager.js';

export default {

    data() {
        return {
            buscar: '',
            sneakers: {},
        }
    },

    methods: {
        searchSneaker() {
            comManager.getSneakerByName(this.buscar)
                .then(res => {
                    if (res.data.length === 0) {
                        // Asignar un arreglo con un objeto que indica que no se encontraron resultados
                        this.sneakers = [{ name: null, img: null }];
                    } else {
                        this.sneakers = res.data;
                    }
                })
                .catch(err => {
                    console.log(err);
                })
        },

        selectSneaker(sneaker) {
            this.$emit('sneakerSelected', sneaker);
        },

        closeModal() {
            this.$emit('close')
        }
    }
}
</script>

<style lang="scss" scoped></style>