<template>
    <el-select
        class="w-full" 
        v-model="value"  
        :disabled="finalDisabled"
        filterable
        remote
        :remote-method="remoteMethod"
        clearable
        :options="options"
        :loading="loading"
        placeholder="Selecciona"
        :loading-text="'Buscando tiendas...'"
        :no-data-text="'No hay tiendas disponibles'" 
        :no-match-text="'No hay tiendas disponibles'">
         <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.value">
        </el-option>
    </el-select>
</template>

<script>

    import { defineComponent } from 'vue'
 
    export default defineComponent({
        props: [
            'modelValue',
            'data',
            'defaultDisabled',
            'conditions',
            'filters',
            'form'
        ],

        created () {
            this.remoteMethod()
        },
 
        data () {
            return {
                disabled: this.defaultDisabled ?? false,
                query: {},
                loading: false,
                options: [],
                optionsUnmutable: []
            }
        },

         watch: {
            form: {
                handler: function (newVal) {
                    this.conditions.forEach(element => {
                        if (element[0] in newVal) {
                            if (newVal[element[0]] !== '') {
                                this.disabled = false
                            }
                        }
                    });

                    this.filters.forEach(element => {
                        if (element[0] in newVal) {
                            this.query[element[0]+'s'] = [newVal[element[0]]]
                            this.remoteMethod()
                        }
                    });
                },
                deep: true
            }
        },

        computed: {
            value: {
                get() {
                    return this.modelValue
                },
                set(value) {
                    this.$emit('update:modelValue', value)
                }
            },
            finalDisabled () {
                return this.disabled || this.optionsUnmutable.length <= 0
            }
        },

        methods: {
            remoteMethod(search) {
                this.loading = true
               
                if (search) {
                    this.query['search'] = search
                } else {
                    this.query['search'] = ''
                }

                axios.get(this.data.source, {
                    params: this.query,
                    headers: { Authorization: `Bearer ${this.data.token}` }
                }).then(response => {
                    this.loading = false
                    if (response.data.success) {
                        this.options = response.data.items
                        this.options = this.options.concat(this.data.options)
                        if (!search) {
                            this.optionsUnmutable = response.data.items
                            this.optionsUnmutable = this.optionsUnmutable.concat(this.data.options)
                        }
                    } 
                })
            }
        },
    })
  
</script>
