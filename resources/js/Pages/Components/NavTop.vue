<template>
    <div class="grid grid-cols-12 h-full">
        <Link :href="route('dashboard')" class="col-span-2 flex items-center pl-4">
            <img src="https://cdn.discordapp.com/attachments/1032375319002349651/1037129870175653909/logo_mpodif.png" class="h-20 object-contain object-center">
            <span>Gansta Paradise</span>
        </Link>

        <div class="col-span-8 flex items-center px-6">
            <button v-if="!admin" @click="this.$emit('add-profile')" class="bg-blue-500 py-2 px-4 text-white rounded-md">Ajouter un profile</button>
        </div>

        <div class="col-span-2 px-10 my-auto flex justify-end relative sd">
            <button @click="openDropdown = !openDropdown"
                    class="w-36 text-white bg-zinc-700 hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-zinc-300 rounded-lg px-4 py-2.5 flex justify-between item-center"
                    type="button">
                Profile
                <svg :class="openDropdown ? 'rotate-180' : 'rotate-0'"
                     class="w-5 h-5 ml-2 transform duration-300"
                     aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div class="divide-y rounded-lg shadow-md w-36 bg-white divide-bg-zinc-700-400 absolute top-12 overflow-hidden block"
                 :class="openDropdown ? 'block' : 'hidden'">
                <ul class="py-2 text-sm">
                    <li>
                        <Link :href="route('dashboard.admin.reset.my.password')" class="block px-4 py-2 hover:bg-zinc-700 hover:text-white">Settings</Link>
                    </li>
                    <li v-if="user.is_admin">
                        <Link :href="route('dashboard.admin')"  class="block px-4 py-2 hover:bg-zinc-700 hover:text-white">Admin</Link>
                    </li>
                </ul>
                <form @submit="disconnect" class="pt-2 ">
                    <button class="block w-full px-4 py-2 text-sm hover:bg-red-600 hover:text-white">Déconnexion</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: "NavTop",
    components: {
        Link
    },
    props: [
        'admin',
        'user'
    ],
    data() {
        return {
            openDropdown: false
        }
    },
    methods: {
        disconnect() {
            axios.post(route('logout'))
        }
    }
}
</script>

<style scoped>

</style>
