<template>
    <div class="grid grid-cols-12 h-full">
        <div class="col-span-2 flex items-center pl-4">
            <img src="https://cdn.discordapp.com/attachments/1032375319002349651/1037129870175653909/logo_mpodif.png" class="h-20 object-contain object-center">
            <span>Gansta Paradise</span>
        </div>

        <div class="col-span-8 ">

        </div>

        <div class="col-span-2 px-10 my-auto flex justify-end relative">
            <button @click="openDropdown = !openDropdown"
                    class="w-36 text-white bg-zinc-700 hover:bg-zinc-800 focus:ring-2 focus:outline-none focus:ring-zinc-300 rounded-lg px-4 py-2.5 flex justify-between item-center"
                    type="button">
                Profile
                <svg :class="openDropdown ? 'rotate-180' : 'rotate-0'"
                     class="w-5 h-5 ml-2 transform duration-300"
                     aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div class="divide-y rounded-lg shadow w-36 bg-zinc-700 divide-bg-zinc-700-400 absolute top-14 overflow-hidden block z-50 "
                 :class="openDropdown ? 'block' : 'hidden'">
                <ul class="py-2 text-sm text-gray-200">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-bg-zinc-600 hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-bg-zinc-600 hover:text-white">Admin</a>
                    </li>
                </ul>
                <div class="pt-2 ">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-red-600 text-gray-200 hover:text-white">Deconecter</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "NavTop",
    data() {
        return {
            openDropdown: false
        }
    }
}
</script>

<style scoped>

</style>
