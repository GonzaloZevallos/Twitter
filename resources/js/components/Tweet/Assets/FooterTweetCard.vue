<template>
    <div class="tweet-card-footer border-t-2 px-4 py-1">
        <div class="flex justify-around">
            <div class="mt-2">
                <p class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>

                    <span v-if="likes.length > 0" class="pl-2">
                        {{ likes.length }}
                    </span>
                </p>
            </div>
            <div class="mt-2">
                <p class="flex">
                    <!--                    Si likee este tweet-->
                    <!--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 inline">-->
                    <!--                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />-->
                    <!--                        </svg>-->
                    <!--                    End if-->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>

                    <span v-if="responses.length > 0" class="pl-2">
                        {{ responses.length }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>

span, svg {
    font-size: 12px;
}

</style>

<script>

export default {
    props: {
        likes: Array,
        responses: Array
    }
}

</script>
