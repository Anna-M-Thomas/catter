<template>
    <main class="w-full sm:max-w-lg mt-6 px-3 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <section class="common">
            <ul v-if="all_meows.length > 0" class="bg-white rounded-lg border border-gray-200 text-gray-900">
                <li v-for="meow in all_meows" :key="meow.id" 
                class="px-6 py-2 border-b border-gray-200 w-full"
                >
                    <div class="flex justify-between">
                        <div>
                            <font-awesome-icon class="px-1" id="user_img" icon="cat" size="2x" :color="meow.users.icon_color" />
                            <span class="font-bold">{{meow.users.name}}</span><br/>
                        </div>
                        <span v-if="meow.created_at">{{getFormattedDate(meow.created_at)}}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>{{meow.message}}</span>
                        <button v-if="meow.user_id==user.id">
                            <span class="sr-only">Delete this meow</span>
                            <font-awesome-icon class="icon-color" icon="trash" @click="deleteMeow"/>
                        </button>
                    </div>
                </li>
            </ul>
            <div v-else>
                No meows yet!
            </div>
        </section>

    </main>
    <MeowModal :user="user" />
    <DeleteConfirmModal thing_to_delete="meow" ref="confirmDeleteModal"/>
</template>


<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import MeowModal from '@/Components/MeowModal.vue';
    import DeleteConfirmModal from '@/Components/DeleteConfirmModal.vue';

    export default {
        components: {
            MeowModal, DeleteConfirmModal
        },
        props: ['user', 'all_meows'],
        data(){
            return {
            }
        },
        layout: AppLayout,
        mounted(){
            //console.log(this.user);
            console.log(this.all_meows);
        },
        methods:{
            getFormattedDate(date_string){
                const date = new Date(date_string);
                return date.toDateString();
            },
            async deleteMeow(){
                const confirm = await this.$refs.confirmDeleteModal.show();
                if (confirm) {
                    console.log("confirm!!");
                } else {
                    console.log("reject!!");
                }
            }
        }
    };
</script>