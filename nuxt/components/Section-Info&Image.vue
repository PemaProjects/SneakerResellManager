<template>
    <div class="h-screen w-full flex justify-center items-center" :class="{ 'flex-row-reverse': infoRight }">
        <section class="w-[40%] h-[80%] bg-background2" :class="{'rounded-l-3xl': !infoRight, 'rounded-r-3xl': infoRight}">
            <div class="flex flex-col justify-center items-center h-full gap-8">
                <slot />
            </div>
        </section>

        <section class="w-[60%] h-[80%] overflow-hidden" :class="{'rounded-r-3xl': !infoRight, 'rounded-l-3xl': infoRight}">
            <img class="w-full h-full object-cover" :src="image" alt="">
        </section>
    </div>
</template>

<script>
export default {
    props: {
        image: {
            type: String,
            required: true
        },

        infoRight: {
            type: Boolean,
            default: false
        }
    },

    data() {
        return {
        };
    },
    
}
</script>
