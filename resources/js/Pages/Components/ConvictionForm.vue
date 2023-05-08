<template>
    <div v-if="type === 'info'" class="bg-zinc-700 text-white h-16 flex justify-center items-center text-lg">Info Condamnation</div>
    <div v-else class="bg-zinc-700 text-white h-16 flex justify-center items-center text-lg">Ajouter une Condamnation</div>

    <div class="p-4 space-y-2 divide-y-2">
        <div class="grid grid-cols-6">
            <div class="col-span-2">Prénom: {{ profile.firstname }}</div>
            <div class="col-span-2">Nom: {{ profile.lastname }}</div>
            <div class="col-span-2">N d'identité: {{ profile.identity_number }}</div>
        </div>

        <div class="pt-4 pb-2 space-y-2">
            <span class="font-semibold text-lg underline">Information Arrestation</span>
            <div class="grid grid-cols-12 space-x-4 ">
                <div class="col-span-8 flex flex-col">
                    <label for="">Infraction</label>
                    <input class="h-10 rounded-md" type="text" :value="arrest.offense" disabled>
                </div>
                <div class="col-span-2 flex flex-col">
                    <label for="">Amende</label>
                    <input class="h-10 rounded-md" type="text" :value="arrest.fine"  disabled>
                </div>
                <div class="col-span-2 flex flex-col items-center">
                    <label for="">Payer ?</label>
                    <div class="flex justify-center p-2">
                        <input class="h-6 w-6 rounded-md" type="checkbox" :checked="arrest.payed" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 pb-2">
            <div class="grid grid-cols-12 space-x-4 ">
                <div class="col-span-7 flex flex-col">
                    <label for="">Action</label>
                    <input class="h-10 rounded-md" type="text" :value="conviction.action" disabled>
                </div>
                <div class="col-span-2 flex flex-col">
                    <label for="">GAV</label>
                    <input class="h-10 rounded-md" type="text" :value="conviction.gav" disabled>
                </div>

                <div class="col-span-1 flex flex-col items-center">
                    <label for="">Fouille</label>
                    <div class="flex justify-center p-2">
                        <input class="h-6 w-6 rounded-md" type="checkbox" :checked="conviction.post_search" disabled>
                    </div>
                </div>
                <div class="col-span-2 flex flex-col">
                    <label for="">Federal</label>
                    <input class="h-10 rounded-md" type="text" :value="conviction.federal" disabled>
                </div>
            </div>
        </div>

        <div v-if="type === 'info'" class="pt-4 flex justify-end space-x-4">
            <button @click="this.$emit('close-modal')" class="bg-zinc-500 p-2 w-24 text-white rounded-md">Fermer</button>
        </div>

        <div v-else class="pt-4 flex justify-end space-x-4">
            <button @click="this.$emit('close-modal')" class="bg-red-500 p-2 w-24 text-white rounded-md">Annuler</button>
            <button v-if="type === 'add'" @click="addConviction" class="bg-blue-500 p-2 w-24 text-white rounded-md">Ajouter</button>
            <button v-else class="bg-blue-500 p-2 w-24 text-white rounded-md">Valider</button>
        </div>
    </div>
</template>

<script>

export default {
    name: "ConvictionForm",
    props: ['data', 'type', 'profile', 'convictions'],
    data() {
        if (this.type === 'info') {
            return {
                arrest: {
                    offense: this.data.offense.content,
                    fine: this.data.offense.fine,
                    payed: this.data.payed
                },
                conviction: {
                    action: this.data.offense.action.content === '' ? 'Aucune' : this.data.offense.action.content,
                    gav: this.data.offense.action.gav,
                    post_search: this.data.offense.action.post_search,
                    federal: this.data.offense.action.federal,
                }
            }
        } else {
            return {
                arrest: {
                    offense: this.data.offense.content,
                    fine: this.data.offense.fine,
                    payed: this.data.payed
                },
                conviction: {
                    action: null,
                    gav:  null,
                    post_search:  null,
                    federal:  null,
                }
            }
        }
    },
    mounted() {
        if (this.type === 'add') {
            let temp = this.convictions.find(c => c.offense_id === this.data.offense.id)
            this.conviction.action = temp.content === '' ? 'Aucune' : temp.content
            this.conviction.gav = temp.gav
            this.conviction.post_search = temp.post_search
            this.conviction.federal = temp.federal
        }
    },
    methods: {
        addConviction() {
            axios.post(route('dashboard.add.conviction'), {
                arrest_id: this.data.id,
                profile_in_mate_id: this.data.profile_in_mate_id
            })
                .then(response => {
                    this.$emit('update-arrest', response.data)
                    this.$emit('close-modal')
                })
        }
    }
}
</script>

<style scoped>

</style>
