<template>
    <form
        :id="formID"
        :class="formClasses"
        @submit.prevent="">
        <div :class="`grid grid-cols-${columns.field} gap-x-0 gap-y-${columns.gap} sm:gap-x-${columns.gap} sm:gap-y-${columns.gap}`">
            <template
                v-for="(field, name) in schema"
                :key="'form-field-'+ name">
                <div :class="`col-span-12 col-start-0 sm:col-span-${field.columns ?? columns.field} sm:col-start-${field.columnsStart ?? 0}`">
                   <template v-if="field.type === 'checkbox'">
                        <div class="flex flex-wrap items-center">
                            <label class="flex items-center">
                                <promotion-checkbox-field v-if="field.parent" :name="name" v-model:checked="form[field.parent][name]"/>
                                <promotion-checkbox-field v-else :name="name" v-model:checked="form[name]"/>
                                <span v-html="field.label"></span>
                            </label>
                            <span class="error pl-6 w-full" v-if="field.parent">{{ $page.props.errors[field.parent + '.' + name] }}</span>
                            <span class="error pl-6 w-full" v-else>{{ $page.props.errors[name] }}</span>
                        </div>
                    </template>
                    <template v-else>
                        <field v-if="field.parent" :field="field" :name="name" :form="form" v-model="form[field.parent][name]"/>
                        <field v-else :field="field" :name="name" :form="form" v-model="form[name]"/>
                    </template>
                </div>
            </template>
            <span class="form-footer block-item block-text col-span-12">Los campos marcados con asterisco (*) son de obligatoria cumplimentación para poder participar en la presente promoción.</span>
            <div class="col-span-12 flex justify-center">
                <promotion-button @click="recaptcha" type="submit">{{button.label}}</promotion-button>
            </div>
        </div>
    </form>
</template>

<script>

    import { Inertia } from '@inertiajs/inertia'
    import { ElNotification } from 'element-plus'

    import Field from './Field.vue'
    import PromotionCheckboxField from './Checkbox.vue'
    import PromotionButton from './Button.vue'

    export default {
        components: {
            Field,
            PromotionCheckboxField,
            PromotionButton
        },

        props: [
            'schema',
            'columns',
            'button',
            'storeUrl',
            'formID',
            'formClasses'
        ],

        data() {
            return {
                form: {},
            }
        },

        created () {
            for (let field in this.schema){
                if ('parent' in this.schema[field]) {
                    const parentField = this.schema[field].parent
                    if (this.form[parentField] === undefined) {
                        this.form[parentField] = {}
                    }

                    if (this.schema[field].type == 'checkbox') {
                        this.form[parentField][field] = this.schema[field].default ?? false
                    } else {
                        this.form[parentField][field] = this.schema[field].default ?? ''
                    }

                } else {
                    if (this.schema[field].type == 'checkbox') {
                        this.form[field] = this.schema[field].default ?? false
                    } else {
                        this.form[field] = ''
                    }
                }
            }
        },

        methods: {
            searchFieldFile (fields) {
                for (const field in fields) {
                    if (fields[field].constructor.name === 'File') {
                        return true;
                    }

                    if (typeof fields[field] === 'object') {
                       return this.searchFieldFile(fields[field])
                    }
                }

                return false
            },

            getFlatFormData (formData) {
                const flatFormData = {...formData}
                Object.entries(this.schema).forEach(([key, value]) => {
                    if (value.type === 'multiselect') {
                        flatFormData[key] = flatFormData[key].join()
                    }
                })
                return flatFormData
            },

            async recaptcha () {
                const hasFieldFile = this.searchFieldFile(this.form)

                // recaptcha key not provided
                if (!window.grcptch || window.grcptch === '') {
                    Inertia.post(this.storeUrl, this.getFlatFormData(this.form), {
                        preserveState: true,
                        preserveScroll: true,
                        forceFormData: hasFieldFile
                    })
                    return
                }

                // (optional) wait until recaptcha has been loaded
                await this.$recaptchaLoaded()

                // execute recaptcha with action 'participation'
                const token = await this.$recaptcha(this.formID)
                const formData = {...this.form}

                // do stuff with received token
                formData.recaptcha_response  = token
                Inertia.visit(this.storeUrl, {
                    method: 'post',
                    preserveState: true,
                    preserveScroll: true,
                    data: formData,
                    forceFormData: hasFieldFile,
                    onSuccess: (res) => {
                        if (res.props.flash.status === 'error_recaptcha') {
                            ElNotification({
                                title: 'Error',
                                message: 'Hemos detectado que tu actividad es sospechosa de spam. Si crees que se trata de un error ponte en contacto con nosotros.',
                                type: 'error',
                                duration: 0,
                            })
                        }
                    }
                })
            }
        }
    }
</script>
