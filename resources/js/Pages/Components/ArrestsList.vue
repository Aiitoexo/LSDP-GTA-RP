<template>
    <div class="sticky top-0 flex-1 grid grid-cols-12 divide-x bg-zinc-500 text-white shadow-lg shadow-gray-500">
        <div class="col-span-1 flex justify-center items-center">Date</div>
        <div class="col-span-5 flex justify-center items-center">Infraction</div>
        <div class="col-span-1 flex justify-center items-center">Amende</div>
        <div class="col-span-1 flex justify-center items-center">Payer</div>
        <div class="col-span-2 flex justify-center items-center">Condamnation</div>
        <div class="col-span-2 flex justify-center items-center">Edit/Supprimer</div>
    </div>

    <div class="h-[42rem]">
        <div v-for="a in 40" class="h-12 grid grid-cols-12 border-b divide-x">
            <Arrest @active-modal="this.$emit('active-modal', $event)"/>
        </div>
    </div>
</template>

<script>
import Arrest from "@/Pages/Components/Arrest.vue";
export default {
    name: "Arrests",
    components: {
        Arrest
    }
}
</script>

<style scoped>

</style>
