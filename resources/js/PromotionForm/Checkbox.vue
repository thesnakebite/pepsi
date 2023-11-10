<template>
    <input type="checkbox" :value="value" v-model="proxyChecked" class="mt-1 mr-2">
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            checked: {
                type: [Array, Boolean],
                default: false,
            },
            value: {
                default: null,
            },
        },

        emits: ['update:checked'],

        computed: {
        proxyChecked: {
                get() {
                    return this.checked;
                },

                set(val) {
                    this.$emit("update:checked", val);
                },
            },
        },
    })
</script>
