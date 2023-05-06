<template>
    <div class="h-full p-1 flex flex-col">
        <div class="h-12 bg-blue-900 rounded-t-lg flex justify-between items-center px-2">
            <span class="text-2xl text-white">Gouvernement de Los Santos</span>
            <button @click="this.$emit('open-modal-delete-profile')" class="text-white bg-red-500 p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </div>

        <div class="flex-1 rounded-b-lg p-2 gap-y-2 flex flex-col">
            <div class="h-36 grid grid-cols-12 gap-x-2">
                <div class="col-span-3">
                    <img :src="profile.picture_url" class="object-cover object-center w-full h-36">
                </div>
                <div class="col-span-9 divide-y-2 divide-blue-900 space-y-1 font-semibold">
                    <span>Numero didentiter: {{ profile.identity_number }}</span>
                    <div class="pl-2 flex flex-col">
                        <span>Prenom : {{ profile.firstname }}</span>
                        <span>Nom : {{ profile.lastname }}</span>
                    </div>
                    <div class="pl-2">
                        <div class="grid grid-cols-2">
                            <span class="col-span-1">Sexe : {{ profile.gender === "1" ? 'F' : 'M' }}</span>
                            <span class="col-span-1">Nee le : {{ profile.birthday }}</span>
                        </div>
                        <span>Adresse : {{ profile.address }}</span>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-red-100">
                Test
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileCard",
    props: ['profile'],
}
</script>

<style scoped>

</style>
