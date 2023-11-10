<template>
    <div>
        <promotion-label v-if="field.labelType === 'show'" :for="field.type" :value="field.label" />
        <component
            v-if="!hidden"
            :is="'Promotion'+transformToSnake(field.type)+'Field'"
            :data="field"
            :defaultDisabled="field.disabled ?? false"
            :conditions="field.conditions ?? null"
            :filters="field.filters ?? null"
            :schema="field.schema ?? null"
            :form="{}"
            :rows="field.rows ?? '5'"
            :type="field.type === 'text' || field.type === 'textarea' ?  'text' : field.type"
            :ref="field.type"
            :placeholder="field.placeholder ?? ''"
            v-model="localValue"
        ></component>
        <template v-if="!hidden">
            <span v-if="field.parent" class="error">{{ $page.props.errors[field.parent + '.' + name] }}</span>
            <span v-else class="error">{{ $page.props.errors[name] }}</span>
        </template>
    </div>
</template>


 <script>
    import PromotionTextField from './Input.vue'
    import PromotionSelectField from './Select.vue'
    import PromotionMultiselectField from './Multiselect.vue'
    import PromotionBrowserField from './Browser.vue'
    import PromotionLabel from './Label.vue'
    import PromotionButton from './Button.vue'
    import PromotionRadiosField from './Radios.vue'
    import PromotionTextareaField from './TextArea.vue'
    import PromotionFilesField from './Files.vue'
    import PromotionClockField from './Clock.vue'
    import PromotionInputRadiosField from './InputRadios.vue'

    import { defineComponent } from 'vue'

    export default defineComponent({
        emits: ['update:modelValue'],
        components: {
            PromotionTextField,
            PromotionSelectField,
            PromotionMultiselectField,
            PromotionBrowserField,
            PromotionRadiosField,
            PromotionTextareaField,
            PromotionFilesField,
            PromotionClockField,
            PromotionInputRadiosField,
            PromotionLabel,
            PromotionButton
        },

        props: [
            'modelValue',
            'field',
            'name',
            'form'
        ],

        data() {
            return {
                hidden: false,
                localValue: this.modelValue
            }
        },

        watch: {
            localValue (newValue) {
                this.$emit('update:modelValue', newValue)
            },

            modelValue (newValue) {
                this.localValue = newValue
            },

            form: {
                handler: function (newVal) {
                    this.makeConditions(newVal)
                },
                deep: true
            }
        },

        methods: {
            transformToSnake(str) {
                return str.split('_').map(function (item) {
                    return item.charAt(0).toUpperCase() + item.substring(1)
                }).join('')
            },

            index (t, path) {
                return path.split(".").reduce((r, k) => r?.[k], t)
            },

            makeConditions (newVal) {
                for (const key in this.field.conditions) {
                    this.hidden = this.index(newVal,key) !== this.field.conditions[key]
                }
            },

        },

        mounted() {
            if (this.field.conditions) {
                this.makeConditions(this.form)
            }
        }

    })
 </script>
