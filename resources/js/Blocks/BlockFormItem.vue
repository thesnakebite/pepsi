<template>
    <template v-if="!blockData.form">
        <div class="block-item block-text" v-html="blockData.content.publish_end_text"></div>
    </template>
    <template v-else-if="$page.props.flash.status === null || $page.props.flash.status === '' || $page.props.flash.status === 'error_recaptcha'">
        <div 
            v-html="blockData.content.response_default_text"
            class="block-item block-text w-full">
        </div>
        <PromotionForm 
            :formID="configID"
            :formClasses="configClasses"
            :schema="schema"
            :columns="columns"
            :button="button"
            :storeUrl="storeUrl"
        />
        <img :src="imageFileDefault" />
    </template>
    <template v-else-if="$page.props.flash.status == 'saved_winning_participation'">
        <div class="block-item">
            <div class="block-text mb-20" v-html="blockData.content.response_success_text"></div>
            <img class="mx-auto" :src="imageFileSuccess" />
        </div>
    </template>
    <template v-else-if="$page.props.flash.status == 'saved_participation'">
        <div class="block-item">
            <div class="block-text mb-20" v-html="blockData.content.response_error_text"></div>
            <img class="mx-auto" :src="imageFileError" />
        </div>
    </template>
</template>

<script>
    import PromotionForm from '@/PromotionForm/Form'
    export default {
        components: {
            PromotionForm
        },
        props: ['blockData'],
        data () {
            return {
                imageFileDefault: '',
                imageFileSuccess: '',
                imageFileError: ''
            }
        },
        computed: {
            configID () {
                return (this.blockData.content && this.blockData.content.html_id) ? this.blockData.content.html_id : ''
            },
            configClasses () {
                return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-form ' + this.blockData.content.html_class : 'block-item block-form'
            },
            schema () {
                return (this.blockData.form.schema) ? this.blockData.form.schema : ''
            },
            columns () {
                return (this.blockData.form.columns) ? this.blockData.form.columns : ''
            },
            button () {
                return (this.blockData.form.button) ? this.blockData.form.button : ''
            },
            storeUrl () {
                return (this.blockData.form.storeUrl) ? this.blockData.form.storeUrl : ''
            }
        },
        methods: {
            formImageFile () {
                let imageDefaultDefault = null
                let imageDefaultMobile = null
                let imageSuccessDefault = null
                let imageSuccessMobile = null
                let imageErrorDefault = null
                let imageErrorMobile = null

                if (this.blockData.medias && this.blockData.medias.length > 0) {
                    this.blockData.medias.forEach((image) => {
                        if (image.role === 'response_default_image_default') {
                            imageDefaultDefault = image.url_raw
                        } else if (image.role === 'response_default_image_mobile') {
                            imageDefaultMobile = image.url_raw
                        } else if (image.role === 'response_success_image_default') {
                            imageSuccessDefault = image.url_raw
                        } else if (image.role === 'response_success_image_mobile') {
                            imageSuccessMobile = image.url_raw
                        } else if (image.role === 'response_error_image_default') {
                            imageErrorDefault = image.url_raw
                        } else if (image.role === 'response_error_image_mobile') {
                            imageErrorMobile = image.url_raw
                        }
                    })

                    // default images
                    if (window.innerWidth >= 1024 && imageDefaultDefault) {
                        this.imageFileDefault = imageDefaultDefault
                    } else if (window.innerWidth < 1024 && imageDefaultMobile) {
                        this.imageFileDefault = imageDefaultMobile
                    } else {
                        this.imageFileDefault = ''
                    }

                    // success images
                    if (window.innerWidth >= 1024 && imageSuccessDefault) {
                        this.imageFileSuccess = imageSuccessDefault
                    } else if (window.innerWidth < 1024 && imageSuccessMobile) {
                        this.imageFileSuccess = imageSuccessMobile
                    } else {
                        this.imageFileSuccess = ''
                    }

                    // error images
                    if (window.innerWidth >= 1024 && imageErrorDefault) {
                        this.imageFileError = imageErrorDefault
                    } else if (window.innerWidth < 1024 && imageErrorMobile) {
                        this.imageFileError = imageErrorMobile
                    } else {
                        this.imageFileError = ''
                    }
                }
            }
        },
        mounted () {
            window.addEventListener('resize', this.formImageFile)
            this.formImageFile()
        }
    }
</script>
