<template>
    <div class="h-screen relative overflow-hidden">
        <div class="h-20 fixed top-0 left-0 right-0 drop-shadow-lg" :class="primary">
            <slot name="navTop"></slot>
        </div>

        <div class="h-full max-h-full pt-20 grid grid-cols-12">
            <div class="col-span-2 overflow-y-auto shadow-lg shadow-gray-500 relative" :class="tertiary">
                <div class="h-16 sticky top-0" :class="secondary">
                    <slot name="topSubNav"></slot>
                </div>
                <div>
                    <slot name="subNav"></slot>
                </div>
            </div>
            <div class="col-span-10 max-h-full p-6" :class="primary">
                <slot name="main"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminLayout",
    data() {
        return {
            primaryClass: "white",
            secondaryClass: "zinc-700",
            tertiaryClass: "zinc-50",
        };
    },
    computed: {
        primary() {
            return `bg-${this.primaryClass}`;
        },
        secondary() {
            return `bg-${this.secondaryClass}`;
        },
        tertiary() {
            return `bg-${this.tertiaryClass}`;
        }
    },
};
</script>
