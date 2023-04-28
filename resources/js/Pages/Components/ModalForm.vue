<template>
    <div class="h-full w-full flex justify-center items-center">
        <div class="bg-white rounded-md overflow-hidden w-[50rem]">
            <ArrestForm v-if="open === 'arrest'" @close-modal="this.$emit('close-modal')"/>
            <ConvictionForm v-if="open === 'conviction'" @close-modal="this.$emit('close-modal')"/>
        </div>
    </div>
</template>

<script>
import ArrestForm from "@/Pages/Components/ArrestForm.vue";
import ConvictionForm from "@/Pages/Components/ConvictionForm.vue";
export default {
    name: "ModalForm",
    components: {
        ArrestForm,
        ConvictionForm
    },
    props: [
        'open'
    ]
}
</script>

<style scoped>

</style>
