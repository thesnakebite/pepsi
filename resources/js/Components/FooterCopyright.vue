<template>
    <div :class="footerClasses" v-if="footerCopyright !== ''" v-html="footerCopyright"></div>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'

    export default {
        mixins: [LayoutMixin],
        computed: {
            footerCopyright () {
                return (this.$page.props 
                        && this.$page.props.content 
                        && this.$page.props.content.settings.styles.footer.copyright !== '') 
                        ? this.$page.props.content.settings.styles.footer.copyright : ''
            },
            footerClasses () {
                if (this.footerTemplateType === 'template-1' || this.footerTemplateType === 'template-3') {
                    return 'copyright w-full text-center pt-4'
                } else if (this.footerTemplateType === 'template-2') {
                    return 'copyright text-center pt-4 sm:pt-0 w-full sm:w-auto'
                }
            }
        }
    }
</script>