<template>
    <div class="h-full w-full flex justify-center items-center">
        <div class="bg-white rounded-md overflow-hidden w-[50rem]">
            <div class="bg-zinc-700 text-white h-16 flex justify-center items-center text-lg">Ajouter un Profile</div>
            <form @submit.prevent="submitForm" class="p-4 space-y-2">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1 flex flex-col">
                        <label for="">Prenom</label>
                        <input v-model="form.firstname" class="h-10 rounded-md" type="text">
                    </div>

                    <div class="col-span-1 flex flex-col">
                        <label for="">Nom</label>
                        <input v-model="form.lastname" class="h-10 rounded-md" type="text">
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-4 flex flex-col">
                        <label for="">N Identiter</label>
                        <input v-model="form.identity_number" class="h-10 rounded-md" type="text">
                    </div>

                    <div class="col-span-8 grid grid-cols-12 gap-4">
                        <div class="col-span-2 flex flex-col">
                            <label for="">Sexe</label>
                            <select v-model="form.gender" class="h-10 rounded-md">
                                <option :value="0">M</option>
                                <option :value="1">F</option>
                            </select>
                        </div>
                        <div class="col-span-3 flex flex-col">
                            <label for="">Jour</label>
                            <select v-model="day" class="h-10 rounded-md">
                                <option :value="n" v-for="n in 31">
                                    {{ n }}
                                </option>
                            </select>
                        </div>
                        <div class="col-span-4 flex flex-col">
                            <label for="">mois</label>
                            <select v-model="month" class="h-10 rounded-md">
                                <option :value="month.value" v-for="month in months">
                                    {{ month.label }}
                                </option>
                            </select>
                        </div>
                        <div class="col-span-3 flex flex-col">
                            <label for="">Annee</label>
                            <select v-model="year" class="h-10 rounded-md">
                                <option :value="year" v-for="year in years">
                                    {{ year }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="">Adresse</label>
                    <input v-model="form.address" type="text">
                </div>

                <div class="grid grid-cols-12">
                    <div class="col-span-6 flex flex-col">
                        <label for="">Photo</label>
                        <input type="file" ref="fileInput" @change="setFile" />
                    </div>

                    <div class="col-span-6 flex justify-end items-end gap-4">
                        <button @click="this.$emit('close-modal-profile')" class="bg-red-500 p-2 w-24 text-white rounded-md">Annuler</button>
                        <button type="submit" class="bg-blue-500 p-2 h-10 w-24 text-white rounded-md">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalProfileForm",
    mounted() {
        const startYear = 2023;
        const endYear = 1940;
        for (let year = startYear; year >= endYear; year--) {
            this.years.push(year);
        }
    },
    data() {
        return {
            form: {
                identity_number: null,
                firstname: null,
                lastname: null,
                gender: null,
                birthday: null,
                address: null,
                file: null,
            },
            day: null,
            month: null,
            year: null,
            months: [
                { value: '01', label: 'Janvier' },
                { value: '02', label: 'Février' },
                { value: '03', label: 'Mars' },
                { value: '04', label: 'Avril' },
                { value: '05', label: 'Mai' },
                { value: '06', label: 'Juin' },
                { value: '07', label: 'Juillet' },
                { value: '08', label: 'Août' },
                { value: '09', label: 'Septembre' },
                { value: '10', label: 'Octobre' },
                { value: '11', label: 'Novembre' },
                { value: '12', label: 'Décembre' },
            ],
            years: []
        }
    },
    computed: {
        birthday() {
            if (this.day && this.month && this.year) {
                let date = [this.day, this.month, this.year].join('/');
                return date;
            } else {
                return '';
            }
        },
    },
    methods: {
        setFile(event) {
            this.form.file = event.target.files[0];
        },
        submitForm() {
            const formData = new FormData();
            formData.append("identity_number", this.form.identity_number);
            formData.append("firstname", this.form.firstname);
            formData.append("lastname", this.form.lastname);
            formData.append("gender", this.form.gender);
            formData.append("birthday", this.birthday);
            formData.append("address", this.form.address);
            formData.append("file", this.form.file);

            axios.post(route('dashboard.add.profile'), formData)
                .then(response => {
                    this.$emit('update-profile', response.data)
                    this.resetForm()
                    this.$emit('close-modal-profile')
                })
        },
        resetForm() {
            this.form = {
                identity_number: null,
                firstname: null,
                lastname: null,
                gender: null,
                birthday: null,
                address: null,
                file: null,
            };

            this.day = null
            this.month = null
            this.year = null

            this.$refs.fileInput.value = null;
        },
    }
}
</script>

<style scoped>

</style>
