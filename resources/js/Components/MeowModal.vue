<template>

    <button type="button" class="fixed right-20 bottom-10 bg-gray-800 p-3 flex text-sm rounded-full focus:outline-none" aria-expanded="false" aria-haspopup="false" @click="showModal=true">
        <span class="sr-only">Post a new meow</span>
        <font-awesome-icon class="icon-color" id="test" icon="paw" size="3x" inverse/>
    </button>

    <div v-if="showModal">
        <div className="fixed inset-0 z-10 overflow-y-auto">
            <div
                className="fixed inset-0 w-full h-full bg-black opacity-40"
                @click="showModal=false"
            ></div>
            <div className="flex items-center min-h-screen px-4 py-8">
                <div className="relative w-full max-w-lg p-4 mx-auto bg-white rounded-md shadow-lg">
                    <div className="flex-col">
                        <button className="self-start mt-2 px-2 py-1 text-white bg-black rounded-md outline-none" @click="showModal=false">
                           X
                        </button>
                        <div className="mt-2 text-center sm:ml-4 sm:text-left">
                            <form @submit.prevent="postMeow">
                                <textarea className="mt-2 text-[15px] w-full" maxlength=250 v-model="form.message" placeholder="Enter your meow here"/>
                                Preview
                                <textarea className="mt-2 text-[15px] w-full" disabled :placeholder="meowMessage"/>
                                <div className="justify-end items-center gap-2 mt-3 sm:flex">
                                    
                                    <button
                                        className="mt-2 p-2.5 text-gray-800 rounded-md outline-none border ring-offset-2 ring-indigo-600"
                                        :disabled="form.processing"
                                    >
                                        MEOW
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

export default {
    props: ['user'],
    data(){
        return {
            meowMessage: '',
            showModal: false,
            form: this.$inertia.form({
                message: '',
            }),
        }
    },
    watch: {
        'form.message'(newValue) {
            this.meowMessage = this.meowTranslation(newValue);
        }
    },
    methods: {
        postMeow(){
            this.form
            .transform((data) => ({
                ...data,
                message: this.meowMessage,
            }))
            .post('/meow');
            this.showModal = false;
        },
        meowTranslation(string){
            // split string by puncuation, retain punctuation 
            const split_string = string.split(/([!.?])/); 
            let meow_phrase = split_string
            .map(phrase => {
                // punctuation returned as-is, space added behind
	            if(phrase.length <=1){
                    return phrase + " ";
                }
                // words in all other phrases replaced with meow 
                else {
                    return phrase
                    .trim()
                    .split(" ")
                    .map((word, index)=> index == 0 ? "Meow" : "meow") // capitalize first letter
                    .join(" ");
                } 
            })
            .join("");
            // cut off length at 250 if more than that
            if(meow_phrase.length > 250){
                meow_phrase = meow_phrase.slice(0, 250);
            }
            return meow_phrase;
        }
    }
};
</script>
