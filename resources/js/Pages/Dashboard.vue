<template>
    <admin-layout>
        <template #navTop>
            <NavTop
                @add-profile="openModalProfile"
                :admin="false"
                :user="user"
            />
        </template>

        <template #topSubNav>
            <SearchPrisonInmate
                @update-profile="updateProfile"
            />
        </template>

        <template #subNav>
            <ListPrisonInmate
                v-for="profile in profileInMate"
                :key="profile.id"
                :profile="profile"
                :selected="selectedProfile.id"
                @selected-profile="profileSelected"
            />
        </template>

        <template #main>
            <div v-if="selectedProfile !== null" class="grid grid-cols-12 gap-4 h-full">
                <div class="col-span-4 space-y-4 flex flex-col">
                    <div class="h-80 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                        <ProfileCard
                            :profile="selectedProfile"
                            @open-modal-delete-profile="modalDeleteProfileActive = true"
                        />
                    </div>

                    <div class="flex-1 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                        <CommentsProfile
                            :comments="comments"
                            :profile-id="selectedProfile.id"
                        />
                    </div>
                </div>

                <div class="col-span-8 rounded-lg shadow-md shadow-zinc-300 overflow-hidden border">
                    <ArrestsAndConvictions
                        @active-modal="activeModal"
                        @update-arrest="updateArrest"
                        :profile-id="selectedProfile.id"
                        :arrests="arrests"
                        :convictions="convictionProfile"
                    />
                </div>
            </div>
        </template>
    </admin-layout>

    <div v-if="modalActive" class="top-0 absolute h-screen w-screen bg-black bg-opacity-70">
        <ModalForm
            @close-modal="closeModal"
            @update-arrest="updateArrest"
            :open-modal="targetModal"
            :profile="selectedProfile"
            :convictions="convictions"
            :offenses="offenses"
        />
    </div>

    <div v-if="modalProfileActive" class="top-0 absolute h-screen w-screen bg-black bg-opacity-70">
        <ModalProfileForm
            @update-profile="updateProfile"
            @close-modal-profile="this.modalProfileActive = false"
        />
    </div>

    <div v-if="modalDeleteProfileActive" class="top-0 absolute h-screen w-screen bg-black bg-opacity-70">
        <ModalDeleteProfile
            @close-modal-delete-profile="closeModalProfile"
            @update-profile="updateProfile"
            :profile="selectedProfile"
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
import ModalProfileForm from "@/Pages/Components/ModalProfileForm.vue";
import ModalDeleteProfile from "@/Pages/Components/ModalDeleteProfile.vue";
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
        ModalForm,
        ModalProfileForm,
        ModalDeleteProfile
    },
    props: ['profiles', 'convictions', 'offenses', 'user'],
    data() {
        return {
            modalActive: false,
            modalProfileActive: false,
            modalDeleteProfileActive: false,
            targetModal: null,
            selectedProfile: this.profiles[0] ?? null,
            arrests: this.profiles[0] ? this.profiles[0].arrests : null,
            convictionProfile: null,
            comments: this.profiles[0] ? this.profiles[0].comments : null,
            profileInMate: this.profiles
        }
    },
    mounted() {
        if (this.selectedProfile !== null) {
            this.getConvictions()
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
            this.arrests = profile.arrests
            this.comments = profile.comments
            this.getConvictions()
        },
        updateArrest(data) {
            this.arrests = data.arrests
            this.getConvictions()
        },
        openModalProfile() {
            this.modalProfileActive = true
        },
        updateProfile(profiles) {
            this.profileInMate = profiles
            if (this.selectedProfile === null) {
                this.selectedProfile = this.profileInMate[0]
                this.arrests = this.profileInMate[0].arrests
                this.comments = this.profileInMate[0].comments
            }
        },
        getConvictions() {
            axios.get(route('dashboard.get.convictions'), {
                params: {
                    profile_in_mate_id:  this.selectedProfile.id
                }
            })
            .then(response => {
                this.convictionProfile = response.data.convictions
            })
        },
        closeModalProfile(bool) {
            if (bool) {
                this.selectedProfile = this.profiles[0]
                this.modalDeleteProfileActive = false
            } else {
                this.modalDeleteProfileActive = false
            }
        }
    }
}
</script>

<style scoped>

</style>
