<template>
    <div v-if="tweetsExists">
        <tweet-card v-for="tweet in tweets" :tweet="tweet" :key="tweet.id" />
    </div>
    <tweets-empty v-else />
</template>

<script>

    import TweetCard from '@/components/Tweet/TweetCard';
    import TweetsEmpty from '@/components/Tweet/TweetsEmpty';

    export default {
        components: {
            TweetCard,
            TweetsEmpty
        },
        props: {
            tweets: Array,
            tweetsExists: Boolean
        }
    }
</script>
