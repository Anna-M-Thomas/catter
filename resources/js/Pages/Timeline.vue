<template>
    <main class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <section class="common">
            TEST
            <font-awesome-icon icon="cat" size="2x" color="#E1FF00"/>
            <ul>
                <li v-for="meow in all_meows" :key="meow.id">
                    {{meow.message}}
                </li>
            </ul>   
        </section>

    </main>
    <MeowModal :user="user" />
</template>


<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import MeowModal from '@/Components/MeowModal.vue';

    export default {
        components: {
            MeowModal
        },
        props: ['user', 'all_meows'],
        layout: AppLayout,
        mounted(){
            console.log(this.user);
            console.log(this.all_meows);
        },
    };
</script>