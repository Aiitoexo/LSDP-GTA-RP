<template>
    <div class="h-screen w-screen flex flex-col relative">
        <div class="h-20 bg-white fixed top-0 left-0 right-0 drop-shadow-lg">
            <NavTop
                :admin="true"
                @update-users="updateUsers"
                :user="user"
            />
        </div>

        <div class="flex-1 bg-white pt-20">
            <div class="p-4 grid grid-cols-12 h-full gap-4">
                <div class="col-span-6 flex flex-col rounded-md overflow-hidden shadow-lg">
                    <div
                        class="h-12 bg-zinc-700 text-white text-lg shadow-lg shadow-gray-500 flex items-center justify-center">
                        Liste des Administrateurs
                    </div>

                    <div class="flex-1">
                        <User
                            v-for="user in users"
                            :key="user.id"
                            :user="user"
                            @delete-user="deleteUser"
                            @reset-password-user="resetPasswordUser"
                        />
                    </div>
                </div>

                <div class="col-span-6 h-auto flex flex-col rounded-md overflow-hidden shadow-lg">
                    <div
                        class="h-12 bg-zinc-700 text-white text-lg shadow-lg shadow-gray-500 flex items-center justify-center">
                        Ajouter un administrateur
                    </div>

                    <form @submit.prevent="addUser" class="w-full p-4 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1 flex flex-col">
                                <label for="">Nom</label>
                                <input v-model="form.name" class="w-full rounded-md" type="text">
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <label for="">Email</label>
                                <input v-model="form.email" class="w-full rounded-md" type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1 flex flex-col">
                                <label for="">Mot de passe</label>
                                <input v-model="form.password" class="w-full rounded-md" type="text">
                            </div>
                            <div class="col-span-1 flex flex-col">
                                <label>&nbsp;</label>
                                <button type="submit" class="bg-blue-500 h-full w-full rounded-md text-white">Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div v-if="modalResetActive"
             class="top-0 absolute h-screen w-screen bg-black bg-opacity-70 flex justify-center items-center">
            <div class="w-96 bg-white p-4 rounded-md space-y-2">
                <div>
                    <p>Reset le MDP du user {{ resetPasswordUserId.name }}</p>
                    <input v-model="newPassword" class="rounded-md w-full" type="text">
                </div>
                <div class="flex justify-end space-x-4">
                    <button @click="modalDeleteActive = false" type="button"
                            class="w-20 text-white bg-red-500 p-2 rounded-md">
                        Annuler
                    </button>
                    <button @click="userReset" type="button" class="w-20 text-white bg-green-500 p-2 rounded-md">
                        Valider
                    </button>
                </div>
            </div>
        </div>

        <div v-if="modalDeleteActive"
             class="top-0 absolute h-screen w-screen bg-black bg-opacity-70 flex justify-center items-center">
            <div class="w-96 bg-white p-4 rounded-md space-y-2">
                <div>Voulez vous supprimer le user {{ deleteUserId.name }}</div>
                <div class="flex justify-end space-x-4">
                    <button @click="modalDeleteActive = false" type="button"
                            class="w-20 text-white bg-red-500 p-2 rounded-md">
                        Non
                    </button>
                    <button @click="userDelete" type="button" class="w-20 text-white bg-green-500 p-2 rounded-md">
                        Oui
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavTop from "@/Pages/Components/NavTop.vue";
import User from "@/Pages/Components/User.vue";

export default {
    name: "Admin",
    props: ['all_users', 'user'],
    components: {
        NavTop,
        User
    },
    data() {
        return {
            users: this.all_users,
            modalDeleteActive: false,
            modalResetActive: false,
            deleteUserId: null,
            resetPasswordUserId: null,
            newPassword: null,
            form: {
                name: null,
                email: null,
                password: null
            }
        }
    },
    methods: {
        addUser() {
            axios.post(route('dashboard.admin.add.user'), this.form)
                .then(response => {
                    this.users = response.data.all_users
                    this.form.name = null
                    this.form.email = null
                    this.form.password = null
                })
        },
        updateUsers(users) {
            this.users = users
        },
        deleteUser(id) {
            this.modalDeleteActive = true
            this.deleteUserId = this.users.find(u => u.id === id)
        },
        resetPasswordUser(id) {
            this.modalResetActive = true
            this.resetPasswordUserId = this.users.find(u => u.id === id)
        },
        userDelete() {
            axios.post(route('dashboard.admin.delete.user'), {
                id: this.deleteUserId.id
            })
                .then(response => {
                    this.users = response.data.all_users
                    this.modalDeleteActive = false
                })
        },
        userReset() {
            axios.post(route('dashboard.admin.reset.user'), {
                id: this.resetPasswordUserId.id,
                password: this.newPassword
            })
                .then(response => {
                    this.modalResetActive = false
                })
        }
    }
}
</script>

<style scoped>

</style>
