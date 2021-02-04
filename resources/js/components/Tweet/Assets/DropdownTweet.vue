<template>
    <jet-dropdown>
        <template #trigger>
            <img :src="author.profile_photo_url" :alt="author.name" class="h-10 rounded-full border-2 border-gray-200 ml-3">
        </template>
        <template #content>
            <div>
                <jet-dropdown-link href="www.google.com">
                    <div>
                        Profile
                    </div>
                    <div>
                        <svg class="w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </jet-dropdown-link>
            </div>

            <div v-if="author.id != $page.props.user.id">
                <jet-dropdown-link href="www.google.com" as="button">
                    <div>
                        Follow
                    </div>
                    <div>
                        <svg class="w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
<!--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
<!--                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />-->
<!--                        </svg>-->
                    </div>
                </jet-dropdown-link>
            </div>
        </template>
    </jet-dropdown>
</template>

<script>

    import JetDropdown from "@/Jetstream/Dropdown";
    import JetDropdownLink from "@/Jetstream/DropdownLink";

    export default {
        props: {
            author: Object
        },
        components: {
            JetDropdown,
            JetDropdownLink,
        }
    }

</script>
