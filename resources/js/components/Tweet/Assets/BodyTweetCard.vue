<template>
    <div class="tweet-card-body p-4 text-sm">
        <p class="text-justify break-words">{{ content }}</p>
    </div>
</template>

<script>

    export default {
        props: {
            content: String
        }
    }


</script>
