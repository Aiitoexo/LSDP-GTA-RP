<template>
    <div class="h-screen w-screen flex flex-col relative">
        <div class="h-20 bg-white fixed top-0 left-0 right-0 drop-shadow-lg">
            <NavTop
                :admin="true"
                :user="user"
            />
        </div>

        <div class="flex-1 pt-20">
            <div class="p-4 grid grid-cols-12">
                <div class="col-span-6 flex flex-col bg-white rounded-md shadow-lg overflow-hidden">
                    <div class="h-12 bg-zinc-700 text-white text-lg shadow-lg shadow-gray-500 flex items-center justify-center">
                        Reinitialiser sont MDP
                    </div>

                    <form @submit.prevent="resetPassword" class="flex-1 p-4 space-y-2">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <label for="">Mot de passe</label>
                                <input v-model="newPassword" class="w-full rounded-md" type="password">
                            </div>
                            <div class="col-span-1 flex justify-end">
                                <label>&nbsp;</label>
                                <button type="submit" class="bg-blue-500 rounded-md px-4 py-2 w-full text-white">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavTop from "@/Pages/Components/NavTop.vue";
export default {
    name: "MyPassword",
    props: ['user'],
    components: {
        NavTop,

    },
    data() {
        return {
            newPassword: null
        }
    },
    methods: {
        resetPassword() {
            axios.post(route('dashboard.admin.reset.user'), {
                id: this.user.id,
                password: this.newPassword
            })
                .then(response => {
                    this.newPassword = null
                })
        }
    }
}
</script>

<style scoped>

</style>
