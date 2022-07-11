<template>
    <!-- <button @click="open">Dummy button</button> -->
    <div v-if="showModal">
        <div className="fixed inset-0 z-10 overflow-y-auto">
            <div
                className="fixed inset-0 w-full h-full bg-black opacity-40"
                @click="onCancel"
            ></div>
            <div className="flex items-center min-h-screen px-4 py-8">
                <div className="relative w-full max-w-lg p-4 mx-auto bg-white rounded-md shadow-lg">
                    <div className="flex-col">
                        <button className="self-start mt-2 px-2 py-1 text-white bg-black rounded-md outline-none" @click="close">
                           X
                        </button>
                        <div className="mt-2 text-center sm:ml-4 sm:text-left">
                            Are you sure you want to delete this {{ thing_to_delete }}?
                        </div>
                        <div className="justify-end items-center gap-2 mt-3 sm:flex">
                            <button
                                className="mt-2 p-2.5 text-gray-800 rounded-md outline-none border ring-offset-2 ring-indigo-600"
                                @click="onCancel"
                            >
                                Cancel
                            </button>
                            <button
                                className="mt-2 p-2.5 text-white bg-red-600 rounded-md outline-none border ring-offset-2 ring-indigo-600"
                                @click="onConfirm"
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    props: ["thing_to_delete"],
    data(){
        return {
            showModal: false,
            resolvePromise: undefined,
        }
    },
    methods: {
        show(){
            this.showModal = true;
            return new Promise((resolve, reject) => {
                this.resolvePromise = resolve;
            })
        },
        close() {
            this.showModal = false;
        },
        onConfirm(){
            this.resolvePromise(true);
            this.close();
        },
        onCancel(){
            this.resolvePromise(false);
            this.close();
        },
    }
};
</script>
