<template>
    <div class="h-full flex justify-center items-center p-2 shadow-lg shadow-zinc-500">
        <input type="text"
               class="rounded-lg w-full h-full"
               placeholder="Recherche un Détenue"
               @input="searchProfile"
               v-model="term"
        >
    </div>
</template>

<script>
export default {
    name: "SearchPrisonInmate",
    data() {
        return {
            term: null
        }
    },
    methods: {
        searchProfile() {
            if (this.term.length >= 3) {
                axios.get(route('dashboard.search.profile'), {
                    params: {
                        term: this.term,
                    }
                })
                .then(response => {
                    this.$emit('update-profile', response.data)
                })
            } else if (this.term.length < 3) {
                axios.get(route('dashboard.search.profile'), {
                    params: {
                        term: null,
                    }
                })
                .then(response => {
                    this.$emit('update-profile', response.data)
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
