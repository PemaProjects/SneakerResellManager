<template>
    <div class="relative">
        <input type="text" :value="localValue" @input="updateLocalValue($event.target.value)" @blur="handleBlur" :placeholder="placeholder"
            @focus="emailFocus = true" :class="{ 'border-white': localValue }"
            class="w-full text-white text-sm py-2 px-4 rounded-md border border-grayText outline-none bg-background focus:border-primary focus:bg-transparent placeholder:text-grayText pr-10">
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <IconsEmail
                :class="{ '!text-primary': emailFocus, 'text-gray-400': !emailFocus && !localValue, 'text-white': localValue }"
                class="size-5" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        placeholder: String,
        value: String
    },

    data() {
        return {
            emailFocus: false,
            localValue: this.value // Inicializa la variable local con el valor pasado como prop
        }
    },

    methods: {
        updateLocalValue(value) {
            this.localValue = value; // Actualiza el valor local con cada entrada del usuario
        },
        emitValue() {
            this.$emit('update:modelValue', this.localValue); // Emite el valor local al componente padre
        },
        handleBlur() {
            this.emailFocus = false; // Actualiza el estado de emailFocus
            this.emitValue(); // Llama a emitValue para emitir el valor actualizado
        }
    },

    watch: {
        value(newValue) {
            this.localValue = newValue; // Asegura que la variable local se actualice si la prop 'value' cambia externamente
        }
    }
}
</script>