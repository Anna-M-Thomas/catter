<template>
    <Navbar/>
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">        
        <slot/>
    </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue';

export default {
    components: {
        Navbar
    },
    data(){
        return {
        }
    },
    methods: {
        meow(){
            console.log("meow");
            console.log(this.user);
        },
    }
};
</script>

<style scoped>
.icon-color {
    color: "green"
}
</style>