<template>
    <!-- HEADER template #1 -->
    <header 
        v-if="headerTemplateType === 'template-1' && (headerLayoutType === 'standard' || headerLayoutType === 'full-width')" 
        :class="headerClasses" 
        :style="headerStyles">
        <HeaderLogo />
        <NavDesktop />
        <NavMobile />
    </header>
    <header 
        v-else-if="headerTemplateType === 'template-1' && headerLayoutType === 'full-boxed'"
        :style="headerStyles">
        <div :class="headerClasses" :style="headerStyles">
            <HeaderLogo />
            <NavDesktop />
            <NavMobile />
        </div>
    </header>

    <!-- HEADER template #2 -->
    <header
        v-if="headerTemplateType === 'template-2' && (headerLayoutType === 'standard' || headerLayoutType === 'full-width')"
        :class="headerClasses"
        :style="headerStyles">
        <HeaderLogo />
        <NavDesktop />
        <NavMobile />
    </header>
    <header
        v-else-if="headerTemplateType === 'template-2' && headerLayoutType === 'full-boxed'"
        :style="headerStyles">
        <div :class="headerClasses" :style="headerStyles">
            <HeaderLogo />
            <NavDesktop />
            <NavMobile />
        </div>
    </header>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'
    import HeaderLogo from '@/Components/HeaderLogo'
    import NavDesktop from '@/Components/NavDesktop'
    import NavMobile from '@/Components/NavMobile'

    export default {
        mixins: [LayoutMixin],
        components: {
            HeaderLogo,
            NavDesktop,
            NavMobile
        },
        computed: {
            headerClasses () {
                if (this.headerTemplateType === 'template-1') {
                    if (this.headerLayoutType === 'standard' || this.headerLayoutType === 'full-boxed') {
                        return 'container mx-auto flex flex-wrap justify-between px-5 xl:px-10 py-4'
                    } else if (this.headerLayoutType === 'full-width') {
                        return 'flex flex-wrap justify-between px-5 xl:px-10 py-4'
                    }
                } else if (this.headerTemplateType === 'template-2') {
                    if (this.headerLayoutType === 'standard' || this.headerLayoutType === 'full-boxed') {
                        return 'container mx-auto text-center px-5 xl:px-10 py-4'
                    } else if (this.headerLayoutType === 'full-width') {
                        return 'text-center px-5 xl:px-10 py-4'
                    }
                }
            },
            headerStyles () {
                let styles = ''

                if (this.$page.props  && this.$page.props.content && this.$page.props.content.settings.styles.header.bg_color !== '') {
                    styles += 'background-color: ' + this.$page.props.content.settings.styles.header.bg_color + ';'
                }

                return styles
            }
        }
    }
</script>
