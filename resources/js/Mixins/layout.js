export default {
    computed: {
        headerMenuItems() {
            return (this.$page.props
                && this.$page.props.content
                && this.$page.props.content.menus
                && this.$page.props.content.menus.main_menu
                && this.$page.props.content.menus.main_menu.length > 0)
                ? this.$page.props.content.menus.main_menu : []
        },
        headerLayoutType() {
            return (this.$page.props
                && this.$page.props.content
                && this.$page.props.content.settings.styles.header.layout !== '')
                ? this.$page.props.content.settings.styles.header.layout : ''
        },
        headerTemplateType() {
            return (this.$page.props
                && this.$page.props.content
                && this.$page.props.content.settings.styles.header.template !== '')
                ? this.$page.props.content.settings.styles.header.template : ''
        },
        footerLayoutType() {
            return (this.$page.props
                && this.$page.props.content
                && this.$page.props.content.settings.styles.footer.layout !== '')
                ? this.$page.props.content.settings.styles.footer.layout : ''
        },
        footerTemplateType() {
            return (this.$page.props
                && this.$page.props.content
                && this.$page.props.content.settings.styles.footer.template !== '')
                ? this.$page.props.content.settings.styles.footer.template : ''
        },
    }
}