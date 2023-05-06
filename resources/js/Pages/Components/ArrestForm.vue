<template>
    <div v-if="type === 'add'" class="bg-zinc-700 text-white h-16 flex justify-center items-center text-lg">Ajouter une Arrestation</div>
    <div v-else class="bg-zinc-700 text-white h-16 flex justify-center items-center text-lg">Modifier une Arrestation</div>

    <div class="p-4 space-y-2 divide-y-2">
        <div class="grid grid-cols-6">
            <div class="col-span-2">Prenom: {{ profile.firstname }}</div>
            <div class="col-span-2">Nom: {{ profile.lastname }}</div>
            <div class="col-span-2">N identiter: {{ profile.identity_number }}</div>
        </div>

        <div class="grid grid-cols-12 pt-4 space-x-4 pb-2">
            <div class="col-span-8 flex flex-col">
                <label for="">Infraction</label>
                <select class="h-10 rounded-md" v-model="form.offense_id" @change="updateOffense">
                    <option v-for="offense in offenses" :key="offense.id" :value="offense.id">
                        {{ offense.content }}
                    </option>
                </select>
            </div>
            <div class="col-span-2 flex flex-col">
                <label for="">Amende</label>
                <input class="h-10 rounded-md" v-model="form.fine" type="text" disabled>
            </div>
            <div class="col-span-2 flex flex-col items-center">
                <label for="">Payer ?</label>
                <div class="flex justify-center p-2">
                    <input class="h-6 w-6 rounded-md" v-model="form.payed" type="checkbox">
                </div>
            </div>
        </div>

        <div class="pt-4 flex justify-end space-x-4">
            <button v-if="data && !data.has_conviction" @click="cancelArrest" class="bg-zinc-700 p-2 w-24 text-white rounded-md">Annuler l'arrestation</button>
            <button @click="this.$emit('close-modal')" class="bg-red-500 p-2 w-24 text-white rounded-md">Annuler</button>
            <button v-if="type === 'add'" @click="addArrest" class="bg-blue-500 p-2 w-24 text-white rounded-md">Ajouter</button>
            <button v-else @click="updateArrest" class="bg-blue-500 p-2 w-24 text-white rounded-md">Valider</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ArrestForm",
    props: ['offenses', 'data', 'type', 'profile'],
    data() {
        if (this.type === 'update') {
            return {
                form: {
                    arrest_id: this.data.id,
                    offense_id: this.data.offense.id,
                    fine: this.data.offense.fine,
                    payed: this.data.payed == 1 ? true : false,
                    profile_in_mate_id: this.profile.id
                }
            }
        } else {
            return {
                form: {
                    offense_id: null,
                    fine: null,
                    payed: false,
                    profile_in_mate_id: this.profile.id
                }
            }
        }
    },
    methods: {
        updateOffense() {
            this.form.fine = this.offenses.find(f => f.id === this.form.offense_id).fine
        },
        addArrest() {
            axios.post(route('dashboard.add.arrest'), this.form)
                .then(response => {
                    this.$emit('update-arrest', response.data)
                    this.$emit('close-modal')
                })
        },
        updateArrest() {
            axios.post(route('dashboard.update.arrest'), this.form)
                .then(response => {
                    this.$emit('update-arrest', response.data)
                    this.$emit('close-modal')
                })
        },
        cancelArrest() {
            axios.post(route('dashboard.update.arrest.canceled'), this.form)
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
