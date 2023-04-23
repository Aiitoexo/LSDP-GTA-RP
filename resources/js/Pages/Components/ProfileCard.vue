<template>
    <div class="h-full p-1 flex flex-col">
        <div class="h-12 bg-blue-900 rounded-t-lg flex justify-center items-center">
            <span class="text-2xl text-white">Gouvernement de Los Santos</span>
        </div>

        <div class="flex-1 rounded-b-lg p-2 gap-y-2 flex flex-col">
            <div class="h-36 grid grid-cols-12 gap-x-2">
                <div class="col-span-3">
                    <img src="https://placehold.co/400x600" class="object-cover object-center w-full h-36">
                </div>
                <div class="col-span-9 divide-y-2 divide-blue-900 space-y-1 font-semibold">
                    <span>Numero didentiter</span>
                    <div class="pl-2 flex flex-col">
                        <span>Prenom :</span>
                        <span>Nom :</span>
                    </div>
                    <div class="pl-2">
                        <div class="grid grid-cols-2">
                            <span class="col-span-1">Sexe :</span>
                            <span class="col-span-1">Nee le :</span>
                        </div>
                        <span>Adresse :</span>
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
    name: "ProfileCard"
}
</script>

<style scoped>

</style>
