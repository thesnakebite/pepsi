<template>
    <el-radio-group v-model="value">
     <el-radio
        v-for="item in data.options"
        :key="item.value"
        :label="item.value">{{item.label}}</el-radio>
    </el-radio-group>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: [
            'modelValue',
            'data'
        ],

        computed: {
            value: {
                get() {
                    return this.modelValue
                },
                set(value) {
                    this.$emit('update:modelValue', value)
                }
            }
        },
    })
</script>
