<template>
    <div class="h-full w-full flex justify-center items-center">
        <div class="bg-white rounded-md overflow-hidden w-[40rem] p-4 space-y-6">
            <div>
                <p>Êtes-vous sûr de vouloir supprimer le profil ?" {{ profile.firstname + ' ' + profile.lastname }}</p>
                <p>Cela entraînera la suppression de ses arrestations ainsi que de ses condamnations.</p>
            </div>
            <div class="flex justify-end space-x-4">
                <button @click="this.$emit('close-modal-delete-profile', false)" class="bg-red-500 p-2 w-24 text-white rounded-md">Annuler</button>
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
                this.$emit('close-modal-delete-profile', true)
            })
        }
    }
}
</script>

<style scoped>

</style>
