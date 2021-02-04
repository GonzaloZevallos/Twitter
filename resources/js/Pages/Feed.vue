<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Feed
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mx-auto w-1/2">
                    <form-tweet v-on:tweetAdded="addTweet" />
                    <TweetsContainer :tweets="tweets" :tweetsExists="tweetsExists"/>
                    <infinite-loading @infinite="loadFeed"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import TweetsContainer from '@/components/TweetsContainer';
    import FormTweet from '@/components/Forms/FormTweet';
    import Loader from '@/components/Assets/Loader';

    export default {
        components: {
            AppLayout,
            TweetsContainer,
            FormTweet,
            Loader
        },
        data () {
            return {
                tweets: [],
                tweetsExists: true,
                currentPage: '',
                nextPage: '/api/tweets/feed?page=1'
            }
        },
        methods: {
            loadFeed ($state) {
                axios.get(this.nextPage)
                .then(response => {
                    if(response.data.tweets.next_page_url === null){
                        $state.complete();
                        return;
                    }

                    this.tweets = [...this.tweets, ...response.data.tweets.data];
                    this.tweetsExists = response.data.tweetsExists;
                    this.currentPage = response.data.tweets.current_page;
                    this.nextPage = response.data.tweets.next_page_url;
                    $state.loaded();
                })
                .catch(e => console.log(e))
            },
            addTweet() {
                axios.get('api/tweets/last')
                .then(response => {
                    this.tweets = [response.data.tweet, ...this.tweets];
                })
            }
        }
    }
</script>
