<template>
    <div class="h-full w-full flex justify-center items-center">
        <div class="bg-white rounded-md overflow-hidden w-[50rem]">
            <ArrestForm
                :data="openModal.data"
                :type="openModal.type"
                :profile="profile"
                :offenses="offenses"
                v-if="openModal.modal === 'arrest'"
                @close-modal="this.$emit('close-modal')"
                @update-arrest="this.$emit('update-arrest', $event)"
            />

            <ConvictionForm
                :data="openModal.data"
                :type="openModal.type"
                :profile="profile"
                :convictions="convictions"
                v-if="openModal.modal === 'conviction'"
                @close-modal="this.$emit('close-modal')"
                @update-arrest="this.$emit('update-arrest', $event)"
            />
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
        'open-modal',
        'profile',
        'convictions',
        'offenses'
    ]
}
</script>

<style scoped>

</style>
