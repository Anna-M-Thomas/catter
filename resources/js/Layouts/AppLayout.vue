<template>
    <Navbar/>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">        
        <main class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot/>
        </main>
    </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue';

export default {
    components: {
        Navbar
    },
};
</script>