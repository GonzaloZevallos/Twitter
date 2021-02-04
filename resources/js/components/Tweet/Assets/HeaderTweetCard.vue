<template>
    <div class="tweet-card-header flex justify-between content-center p-3 border-b-2">
        <div class="tweet-username-container flex flex-col justify-center">
            <small class="text-xs opacity-75">{{ moment(date).fromNow() | uppercase }}</small>
        </div>
        <div class="tweet-avatar-container flex">
            <div class="flex flex-col justify-center">
                <p class="text-gray-500">{{ author.name }}</p>
            </div>
            <div>
                <dropdown-tweet :author="author" />
            </div>
        </div>
    </div>
</template>

<script>

import DropdownTweet from "@/components/Tweet/Assets/DropdownTweet";

export default {
    props: {
        author: Object,
        date: String,
    },
    components: {
        DropdownTweet
    }
}

</script>
