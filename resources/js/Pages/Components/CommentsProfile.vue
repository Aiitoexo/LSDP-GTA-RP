<template>
    <div class="h-full flex flex-col">
        <div class="h-12 bg-zinc-700 text-white text-lg shadow-lg shadow-gray-500 flex items-center justify-center">
            Commentaires
        </div>

        <div class="h-80 overflow-y-auto">
            <Comment
                @delete-comment="deleteComment"
                v-for="comment in allComments"
                :key="comment.id"
                :comment="comment"
            />
        </div>

        <form @submit.prevent="addComment" class="flex-1 bg-zinc-100 p-2 grid grid-cols-6 shadow-[0_-4px_30px_-5px_rgba(0,0,0,0.3)]">
            <textarea v-model="comment" class="col-span-5 resize-none rounded-l-md border-blue-200"></textarea>
            <button class="bg-zinc-700 rounded-r-md flex justify-center items-center text-white hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-zinc-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </button>
        </form>
    </div>
</template>

<script>
import Comment from "@/Pages/Components/Comment.vue";
export default {
    name: "CommentsProfile",
    components: {
        Comment
    },
    props: ['comments', 'profile-id'],
    data() {
        return {
            allComments: this.comments,
            comment: null
        }
    },
    watch: {
        comments(newVal) {
            this.allComments = newVal
        }
    },
    methods: {
        addComment() {
            axios.post(route('dashboard.add.comment'), {
                profile_in_mate_id: this.profileId,
                content: this.comment
            }).then(response => {
                this.comment = null
                this.allComments = response.data.comments
            })
        },
        deleteComment(comment_id) {
            this.allComments = this.allComments.filter(comment => comment.id !== comment_id);
        }
    }
}
</script>

<style scoped>

</style>
