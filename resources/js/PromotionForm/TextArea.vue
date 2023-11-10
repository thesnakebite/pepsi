<template>
        <textarea
            :row="row"
            class="w-full"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
        >
        </textarea>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        emits: ['update:modelValue'],
        props: [
            'modelValue',
            'data',
            'row'
        ],

        methods: {
            focus() {
                this.$refs.input.focus()
            },
        },

    })
</script>
