<template>
    <div class="my-12">
<!--    @CSFR    -->

        <div class="mt-1 px-4 py-5 bg-white sm:p-6">
            <textarea @keyup="handleCounter()" data-limit-rows="true" name="content" rows="3" class="overflow-hidden resize-none shadow-sm border-gray-300 focus:border-gray-400 mt-1 block w-full sm:text-sm rounded-md" v-model="tweet.content" placeholder="What's going on?"></textarea>
            <div class="flex justify-end mt-2">
                <small class="right-0" v-if="contentCounter > 0" v-bind:class="{ 'text-red-600': contentCounter > 160 }">{{ contentCounter }}</small>
            </div>
        </div>
        <div @click="addTweet()" class="px-4 py-3 bg-gray-50 flex justify-between sm:px-6">
<!--            <div>-->
<!--                <loader v-if="isLoading" />-->
<!--            </div>-->
            <button class="inline-flex justify-center py-2 px-4 border-none border-transparent text-sm font-medium rounded-md text-white bg-none text-gray-400 hover:text-gray-700 focus:outline-none">Tweet</button>
        </div>

    </div>
</template>

<script>

    import Loader from "@/components/Assets/Loader";

    export default {
        components: {
            Loader
        },
        data() {
            return {
                tweet: {
                    content: ''
                },
                contentCounter: 0,
                isLoading: true
            }
        },
        methods: {
            clearForm() {
                this.tweet.content = '';
                this.contentCounter = 0;
            },
            addTweet() {
                if(this.tweet.content === '' || this.contentCounter > 160) return;

                this.isLoading = true;

                axios.post('api/tweets', {
                    content: this.tweet.content,
                    author_id: 1
                })
                .then((response) => {
                    this.isLoading = false;
                    if(response.status === 201){
                        this.clearForm();
                        this.$emit('tweetAdded');
                    }
                })
                .catch(e => {
                    console.log(e);
                });
            },
            handleCounter() {
                this.contentCounter = this.tweet.content.length
            }
        }
    }

</script>
