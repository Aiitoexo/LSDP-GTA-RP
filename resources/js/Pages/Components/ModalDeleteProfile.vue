<template>
    <div class="h-full w-full flex justify-center items-center">
        <div class="bg-white rounded-md overflow-hidden w-[40rem] p-4 space-y-6">
            <div>
                <p>Etes vous sur de vouloir suprimer le profile ? {{ profile.firstname + ' ' + profile.lastname }}</p>
                <p>Cela entrainera la supression de cest arrestation ainsi que de ces condanations</p>
            </div>
            <div class="flex justify-end space-x-4">
                <button @click="this.$emit('close-modal-delete-profile')" class="bg-red-500 p-2 w-24 text-white rounded-md">Annuler</button>
                <button @click="deleteProfile" class="bg-blue-500 p-2 w-24 text-white rounded-md">Valider</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalDeleteProfile",
    props: ['profile'],
    methods: {
        deleteProfile() {
            axios.post(route('dashboard.delete.profile'), {
                profile_in_mate_id: this.profile.id
            })
            .then(response => {
                this.$emit('update-profile', response.data)
                this.$emit('close-modal-delete-profile')
            })
        }
    }
}
</script>

<style scoped>

</style>
