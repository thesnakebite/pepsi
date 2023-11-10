<template>
    <!-- FOOTER template #1 -->
    <footer 
        v-if="footerTemplateType === 'template-1' && (footerLayoutType === 'standard' || footerLayoutType === 'full-width')"
        :class="footerClasses"
        :style="footerStyles">
        <FooterLogo />
        <NavFooterLegal />
        <FooterCopyright />
    </footer>
    <footer
        v-else-if="footerTemplateType === 'template-1' && footerLayoutType === 'full-boxed'"
        :style="footerStyles">
        <div :class="footerClasses" :style="footerStyles">
            <FooterLogo />
            <NavFooterLegal />
            <FooterCopyright />
        </div>
    </footer>

    <!-- FOOTER template #2 -->
    <footer 
        v-if="footerTemplateType === 'template-2' && (footerLayoutType === 'standard' || footerLayoutType === 'full-width')"
        :class="footerClasses"
        :style="footerStyles">
        <div class="flex flex-wrap justify-center sm:justify-between items-center basis-full">
            <FooterLogo />
            <NavFooterSocial />
        </div>
        <div class="flex flex-wrap justify-center sm:justify-between items-center basis-full pt-4">
            <NavFooterLegal />
            <FooterCopyright />
        </div>
    </footer>
    <footer 
        v-else-if="footerTemplateType === 'template-2' && footerLayoutType === 'full-boxed'"
        :style="footerStyles">
        <div :class="footerClasses" :style="footerStyles">
            <div class="flex flex-wrap justify-center sm:justify-between items-center basis-full">
                <FooterLogo />
                <NavFooterSocial />
            </div>
            <div class="flex flex-wrap justify-center sm:justify-between items-center basis-full pt-4">
                <NavFooterLegal />
                <FooterCopyright />
            </div>
        </div>
    </footer>

    <!-- FOOTER template #3 -->
    <footer 
        v-if="footerTemplateType === 'template-3' && (footerLayoutType === 'standard' || footerLayoutType === 'full-width')"
        :class="footerClasses"
        :style="footerStyles">
        <NavFooterLegal />
        <NavFooterSocial />
        <FooterCopyright />
    </footer>
    <footer 
        v-else-if="footerTemplateType === 'template-3' && footerLayoutType === 'full-boxed'"
        :style="footerStyles">
        <div :class="footerClasses" :style="footerStyles">
            <NavFooterLegal />
            <NavFooterSocial />
            <FooterCopyright />
        </div>
    </footer>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'
    import FooterLogo from '@/Components/FooterLogo'
    import NavFooterLegal from '@/Components/NavFooterLegal'
    import NavFooterSocial from '@/Components/NavFooterSocial'
    import FooterCopyright from '@/Components/FooterCopyright'

    export default {
        mixins: [LayoutMixin],
        components: {
            FooterLogo,
            NavFooterLegal,
            NavFooterSocial,
            FooterCopyright
        },
        computed: {
            footerClasses () {
                if (this.footerLayoutType === 'standard' || this.footerLayoutType === 'full-boxed') {
                    return 'container mx-auto flex flex-wrap justify-center sm:justify-between items-center px-5 xl:px-10 py-4'
                } else if (this.footerLayoutType === 'full-width') {
                    return 'flex flex-wrap justify-center sm:justify-between items-center px-5 xl:px-10 py-4'
                }
            },
            footerStyles () {
                let styles = ''

                if (this.$page.props && this.$page.props.content && this.$page.props.content.settings.styles.footer.bg_color) {
                    styles += 'background-color: ' + this.$page.props.content.settings.styles.footer.bg_color + ';'
                }

                return styles
            }
        }
    }
</script>
