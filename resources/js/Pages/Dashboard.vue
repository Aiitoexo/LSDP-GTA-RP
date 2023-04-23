<template>
    <admin-layout>
        <template #navTop>
            <NavTop/>
        </template>

        <template #topSubNav>
            <SearchPrisonInmate/>
        </template>

        <template #subNav>
            <ListPrisonInmate
                v-for="p in 20"
            />
        </template>

        <template #main>
            <div class="grid grid-cols-12 gap-4 h-full">
                <div class="col-span-4 space-y-4 flex flex-col">
                    <div class="h-80 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                        <ProfileCard/>
                    </div>

                    <div class="flex-1 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                        <CommentsProfile/>
                    </div>
                </div>

                <div class="col-span-8 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                    <ArrestsAndConvictions
                        @active-modal="activeModal"
                    />
                </div>
            </div>
        </template>
    </admin-layout>

    <div v-if="modalActive" class="top-0 absolute h-screen w-screen bg-black bg-opacity-70">
        <ModalAddArrest v-if="targetModal === 'add-arrest'"/>
        <ModalUpdateArrest v-if="targetModal === 'update-arrest'"/>
        <ModalAddConviction v-if="targetModal === 'add-conviction'"/>
        <ModalUpdateConviction v-if="targetModal === 'update-conviction'"/>
    </div>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import SearchPrisonInmate from "@/Pages/Components/SearchPrisonInmate.vue";
import ListPrisonInmate from "@/Pages/Components/ListPrisonInmate.vue";
import NavTop from "@/Pages/Components/NavTop.vue";
import ProfileCard from "@/Pages/Components/ProfileCard.vue";
import CommentsProfile from "@/Pages/Components/CommentsProfile.vue";
import ArrestsAndConvictions from "@/Pages/Components/ArrestsAndConvictions.vue";
import ModalAddArrest from "@/Pages/Components/ModalAddArrest.vue";
import ModalAddConviction from "@/Pages/Components/ModalAddConviction.vue";
import ModalUpdateArrest from "@/Pages/Components/ModalUpdateArrest.vue";
import ModalUpdateConviction from "@/Pages/Components/ModalUpdateConviction.vue";
export default {
    name: "Dashboard",
    components: {
        AdminLayout,
        SearchPrisonInmate,
        ListPrisonInmate,
        NavTop,
        ProfileCard,
        CommentsProfile,
        ArrestsAndConvictions,
        ModalAddArrest,
        ModalAddConviction,
        ModalUpdateArrest,
        ModalUpdateConviction
    },
    data() {
        return {
            modalActive: false,
            targetModal: null
        }
    },
    methods: {
        activeModal(target) {
            this.modalActive = !this.modalActive
            this.targetModal = target
        }
    }
}
</script>

<style scoped>

</style>
