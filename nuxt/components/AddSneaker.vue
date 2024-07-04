<template>
    <div @click="closeModal" class="absolute top-0 left-0 w-screen h-screen backdrop-blur-sm flex justify-center items-center">
        <div class="bg-background2 px-20 py-10 rounded-lg space-y-2">
            <h3 class="text-lg">Añade tu sneaker</h3>
            <div class="flex bg-background2 rounded-md w-full items-center border text-grayText">
                <IconsSearch class="ml-3 size-7" />
                <input class="text-xl font-semibold rounded-md w-96 px-3 py-2 bg-transparent outline-none" v-model="buscar"
                    type="text" placeholder="Buscar sneaker">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            closeModal() {
                this.$emit('close')
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>