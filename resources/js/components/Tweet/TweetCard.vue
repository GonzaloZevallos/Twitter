<template>
    <div class="tweet-card mx-auto my-4 border-2 bg-white">
        <header-tweet-card :date="tweet.created_at" :author="tweet.author"/>
        <body-tweet-card :content="tweet.content"/>
        <footer-tweet-card :likes="tweet.likers" :responses="tweet.responses"/>
    </div>
</template>

<script>

    import BodyTweetCard from '@/components/Tweet/Assets/BodyTweetCard';
    import HeaderTweetCard from '@/components/Tweet/Assets/HeaderTweetCard';
    import FooterTweetCard from '@/components/Tweet/Assets/FooterTweetCard';

    export default {
        components: {
            BodyTweetCard,
            HeaderTweetCard,
            FooterTweetCard
        },
        props: {
            tweet: Object
        }
    }


</script>
