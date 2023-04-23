<template>
    <div class="sticky top-0 flex-1 grid grid-cols-12 divide-x bg-zinc-500 text-white shadow-lg shadow-gray-500">
        <div class="col-span-1 flex justify-center items-center">Date</div>
        <div class="col-span-1 flex justify-center items-center">Arrestation</div>
        <div class="col-span-5 flex justify-center items-center">Action</div>
        <div class="col-span-1 flex justify-center items-center">GAV</div>
        <div class="col-span-1 flex justify-center items-center">Fouille</div>
        <div class="col-span-1 flex justify-center items-center">Fédérale</div>
        <div class="col-span-2 flex justify-center items-center">Edit/Supprimer</div>
    </div>

    <div class="h-[42rem]">
        <div v-for="a in 40" class="h-12 grid grid-cols-12 border-b divide-x">
            <Conviction @active-modal="this.$emit('active-modal', $event)"/>
        </div>
    </div>
</template>

<script>
import Conviction from "@/Pages/Components/Conviction.vue";
export default {
    name: "Convictions",
    components: {
        Conviction
    }
}
</script>

<style scoped>

</style>
