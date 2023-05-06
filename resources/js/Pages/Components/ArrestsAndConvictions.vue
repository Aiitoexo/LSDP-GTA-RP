<template>
    <div class="h-full w-full flex flex-col">
        <div class="flex-1 px-2 flex justify-between">
            <div class="h-full flex items-center space-x-2">
                <button @click="this.$emit('active-modal', { modal: 'arrest', type: 'add', data: null })" class="px-2 py-1 bg-blue-500 rounded-md text-white">Ajouter une Arrestation</button>
            </div>

<!--            <div class="h-full flex items-center">-->
<!--                <button class="px-2 py-1 bg-zinc-500 rounded-md text-white">Rendu</button>-->
<!--            </div>-->
        </div>

        <div class="h-12 grid grid-cols-2 text-lg divide-x divide-zinc-500">
            <button @click="activeTab('arrests')"
                    :class="active === 'arrests' ? 'bg-zinc-700 text-white' : ' bg-zinc-300 text-zinc-700'"
            >
                Arrestations
            </button>
            <button @click="activeTab('convictions')"
                    :class="active === 'convictions' ? 'bg-zinc-700 text-white' : ' bg-zinc-300 text-zinc-700'"
            >
                Condanations
            </button>
        </div>

        <div class="h-[44rem] flex flex-col overflow-y-auto relative">
            <ArrestsList
                v-if="active === 'arrests'"
                @active-modal="this.$emit('active-modal', $event)"
                @update-arrest="this.$emit('update-arrest', $event)"
                :arrests="arrests"
            />

            <ConvictionsList
                v-if="active === 'convictions'"
                @active-modal="this.$emit('active-modal', $event)"
                @update-arrest="this.$emit('update-arrest', $event)"
                :convictions="convictions"
            />
        </div>
    </div>
</template>

<script>
import ArrestsList from "@/Pages/Components/ArrestsList.vue";
import ConvictionsList from "@/Pages/Components/ConvictionsList.vue";
export default {
    name: "ArrestsAndConvictions",
    components: {
        ArrestsList,
        ConvictionsList
    },
    props: ['arrests', 'profile-id', 'convictions'],
    data() {
        return {
            active: 'arrests',
        }
    },
    methods: {
        activeTab(tab) {
            this.active = tab
        },
    },
}
</script>

<style scoped>

</style>
