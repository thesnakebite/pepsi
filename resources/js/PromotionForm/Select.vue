<template>
    <el-select 
        class="w-full" 
        v-model="value" 
        placeholder="Selecciona" 
        :loading-text="'Buscando tiendas...'"
        :no-data-text="'No hay tiendas disponibles'" 
        :no-match-text="'No hay tiendas disponibles'">
    <el-option
        v-for="item in data.options"
        :key="item.value"
        :label="item.label"
        :value="item.value"
    >
    </el-option>
  </el-select>
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
        }
    })
  
</script>
