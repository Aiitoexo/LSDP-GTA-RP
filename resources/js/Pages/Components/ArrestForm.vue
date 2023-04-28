<template>
    <div class="bg-zinc-700 text-white h-16 flex justify-center items-center text-lg">Ajouter une Arrestation</div>

    <div class="p-4 space-y-2 divide-y-2">
        <div class="grid grid-cols-6">
            <div class="col-span-2">Prenom</div>
            <div class="col-span-2">Nom</div>
            <div class="col-span-2">N identiter</div>
        </div>

        <div class="grid grid-cols-12 pt-4 space-x-4 pb-2">
            <div class="col-span-8 flex flex-col">
                <label for="">Infraction</label>
                <select class="h-10 rounded-md">
                    <option>Test</option>
                    <option>Test</option>
                    <option>Test</option>
                    <option>Test</option>
                    <option>Test</option>
                    <option>Test</option>
                </select>
            </div>
            <div class="col-span-2 flex flex-col">
                <label for="">Amende</label>
                <input class="h-10 rounded-md" type="text" disabled>
            </div>
            <div class="col-span-2 flex flex-col items-center">
                <label for="">Payer ?</label>
                <div class="flex justify-center p-2">
                    <input class="h-6 w-6 rounded-md" type="checkbox">
                </div>
            </div>
        </div>

        <div class="pt-4 flex justify-end space-x-4">
            <button @click="this.$emit('close-modal')" class="bg-red-500 p-2 w-24 text-white rounded-md">Annuler</button>
            <button class="bg-blue-500 p-2 w-24 text-white rounded-md">Valider</button>
        </div>
    </div>
</template>
<!--Penser a midifier ou ajouter si data ou pas -->
<script>
export default {
    name: "ArrestForm"
}
</script>

<style scoped>

</style>
