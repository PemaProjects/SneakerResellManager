<template>
    <div class="h-screen w-full flex flex-col-reverse lg:flex-row justify-center items-center" :class="{ 'lg:flex-row-reverse': infoRight }">
        <section class="w-screen h-[85vh] md:w-[80%] md:h-[60%] lg:w-[40%] lg:h-[80%] bg-background2 md:rounded-b-3xl lg:rounded-none" :class="{'lg:rounded-l-3xl': !infoRight, 'lg:rounded-r-3xl': infoRight}">
            <div class="flex flex-col justify-center items-center h-full gap-8 md:gap-14 lg:gap-8">
                <slot />
            </div>
        </section>

        <section class="w-screen h-[15vh] md:w-[80%] md:h-[20%] lg:w-[60%] lg:h-[80%] overflow-hidden md:rounded-t-3xl lg:rounded-none" :class="{'lg:rounded-r-3xl': !infoRight, 'lg:rounded-l-3xl': infoRight}">
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
