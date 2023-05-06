<template>
    <div class="col-span-1 flex justify-center items-center">{{ conviction.created_at_conviction }}</div>
    <div class="col-span-1 flex justify-center items-center">
        <button @click="this.$emit('active-modal', info)"
                class="text-white bg-blue-500 p-2 rounded-md"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13.5H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </button>
    </div>
    <div class="col-span-5 flex justify-center items-center">{{ conviction.offense.action.content }}</div>
    <div class="col-span-1 flex justify-center items-center">{{ formattedGav }}</div>
    <div class="col-span-1 flex justify-center items-center">{{ conviction.offense.action.post_search }}</div>
    <div class="col-span-1 flex justify-center items-center">{{ formattedFederal }}</div>
    <div class="col-span-2 flex justify-around items-center">
        <button @click="deleteConviction" class="text-white bg-red-500 p-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    name: "Conviction",
    props: ['conviction'],
    data() {
        return {
            info: {
                modal: 'conviction',
                type: 'info',
                data: this.conviction
            }
        }
    },
    computed: {
        formattedGav() {
            return this.formatTime(this.conviction.offense.action.gav)
        },
        formattedFederal() {
            return this.formatTime(this.conviction.offense.action.federal)
        }
    },
    methods: {
        formatTime(data) {
            let hours = Math.floor(data / 60);
            let remainingMinutes = data % 60;
            let hoursString = hours < 10 ? "0" + hours : hours;
            let minutesString = remainingMinutes < 10 ? "0" + remainingMinutes : remainingMinutes;
            return `${hoursString}h${minutesString}`;
        },
        deleteConviction() {
            axios.post(route('dashboard.destroy.conviction'), {
                arrest_id: this.info.data.id,
                profile_in_mate_id: this.info.data.profile_in_mate_id
            })
            .then(response => {
                this.$emit('update-arrest', response.data)
                this.$emit('get-conviction')
            })
        }
    }

}
</script>

<style scoped>

</style>
