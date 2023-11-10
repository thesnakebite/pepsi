<template>
    <ul :class="footerClasses">
        <li v-for="(menuItem, itemIndex) in footerMenuItems" :key="itemIndex" class="px-1 md:px-2">
            <a v-if="menuItem.type === 'page_link'" :href="menuItem.page.permalink">{{ menuItem.title }}</a>
            <a v-else-if="menuItem.type === 'external_link'" :href="menuItem.link" target="_blank">{{ menuItem.title }}</a>
        </li>
    </ul>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'

    export default {
        mixins: [LayoutMixin],
        computed: {
            footerClasses () {
                if (this.footerTemplateType === 'template-1') {
                    return 'legal flex flex-wrap justify-center sm:justify-end w-full sm:w-auto pt-4 sm:pt-0'
                } else if (this.footerTemplateType === 'template-2') {
                    return 'legal flex flex-wrap sm:flex-nowrap justify-center sm:justify-start'
                } else if (this.footerTemplateType === 'template-3') {
                    return 'legal flex flex-wrap justify-center sm:justify-end w-full sm:w-auto'
                }
            },
            footerMenuItems () {
                return (this.$page.props
                        && this.$page.props.content
                        && this.$page.props.content.menus
                        && this.$page.props.content.menus.footer_menu
                        && this.$page.props.content.menus.footer_menu.length > 0) 
                        ? this.$page.props.content.menus.footer_menu : []
            }
        }
    }
</script>
