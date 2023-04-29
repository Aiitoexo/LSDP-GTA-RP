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
                v-for="profile in profiles"
                :key="profile.id"
                :profile="profile"
                :selected="selectedProfile.id"
                @selected-profile="profileSelected"
            />
        </template>

        <template #main>
            <div class="grid grid-cols-12 gap-4 h-full">
                <div class="col-span-4 space-y-4 flex flex-col">
                    <div class="h-80 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                        <ProfileCard
                            :profile="selectedProfile"
                        />
                    </div>

                    <div class="flex-1 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                        <CommentsProfile
                            :comments="selectedProfile.comments"
                        />
                    </div>
                </div>

                <div class="col-span-8 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                    <ArrestsAndConvictions
                        @active-modal="activeModal"
                        :arrests="selectedProfile.arrests"
                        :convictions="selectedProfile.convictions"
                    />
                </div>
            </div>
        </template>
    </admin-layout>

    <div v-if="modalActive" class="top-0 absolute h-screen w-screen bg-black bg-opacity-70">
        <ModalForm
            @close-modal="closeModal"
            :open-modal="targetModal"
            :profile="selectedProfile"
            :convictions="convictions"
            :offenses="offenses"
        />
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
import ModalForm from "@/Pages/Components/ModalForm.vue";
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
        ModalForm
    },
    props: ['profiles', 'convictions', 'offenses'],
    data() {
        return {
            modalActive: false,
            targetModal: null,
            selectedProfile: this.profiles[0],
        }
    },
    methods: {
        activeModal(target) {
            this.modalActive = true
            this.targetModal = target
        },
        closeModal() {
            this.modalActive = false
        },
        profileSelected(profile) {
            this.selectedProfile = profile
        }
    }
}
</script>

<style scoped>

</style>
