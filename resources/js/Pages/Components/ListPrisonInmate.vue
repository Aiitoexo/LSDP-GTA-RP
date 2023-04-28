<template>
    <div class="h-20 w-full grid grid-cols-12 py-2 px-4 gap-6 border-b border-zinc-300"
         :class="primary"
         @click="this.$emit('selected-profile', profile)"
    >
        <div class="col-span-3 h-16 w-16 rounded-full bg-green-400 overflow-hidden">
            <img :src="profile.picture_url"
                 alt=""
                 class="h-full object-cover object-center"
            >
        </div>

        <div class="col-span-7 my-auto text-lg">
            <p>{{ profile.firstname }}</p>
            <p>{{ profile.lastname }}</p>
        </div>

        <div class="col-span-2 my-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListPrisonInmate",
    props: ['profile'],
    data() {
        return {
            primaryClass: "white",
            secondaryClass: "zinc-700",
            tertiaryClass: "zinc-50",
        };
    },
    computed: {
        primary() {
            return `bg-${this.primaryClass}`;
        },
        secondary() {
            return `bg-${this.secondaryClass}`;
        },
        tertiary() {
            return `bg-${this.tertiaryClass}`;
        }
    },
}
</script>

<style scoped>

</style>
