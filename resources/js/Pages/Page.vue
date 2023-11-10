<template>
    <app-layout>
        <div v-if="hasRows" class="page-rows">
            <div v-for="row in $page.props.content.rows" :key="'page-row-' + row.id" class="page-row__container">
                <Row :rowData="row" />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { useHead } from '@vueuse/head'
    import AppLayout from '@/Layouts/AppLayout'
    import Row from '@/Components/Row'
    import FitVidsInit from '@/Utils/fitvid'
    import { bootstrap, setOptions } from 'vue-gtag'

    export default {
        components: {
            AppLayout,
            Row
        },

        data (){
            return {
                cookieConsentCheckTimer: null
            }
        },

        computed: {
            hasRows () {
                return (this.$page.props && this.$page.props.content && this.$page.props.content.rows && this.$page.props.content.rows.length > 0) ? true : false
            },
            metaInfoTitle () {
                let siteTitle = ''
                let pageTitle = ''

                if (this.$page.props && this.$page.props.content && this.$page.props.content.settings.general.seo.site_title) {
                    siteTitle = this.$page.props.content.settings.general.seo.site_title
                }

                if (this.$page.props && this.$page.props.content && this.$page.props.content.title) {
                    pageTitle = this.$page.props.content.title
                }

                if (this.$page.url && this.$page.url !== '/') {
                    return pageTitle + ' | ' + siteTitle
                } else {
                    return siteTitle
                }
            },
            metaInfoDescription () {
                return (this.$page.props && this.$page.props.content && this.$page.props.content.description) ? this.$page.props.content.description : ''
            },
            metaInfoSharingImage () {
                return (this.$page.props && this.$page.props.content && this.$page.props.content.settings.general.seo.medias.logo.url_raw) ? this.$page.props.content.settings.general.seo.medias.logo.url_raw : ''
            },
            metaInfoUrl () {
                return window.location.href
            },
            favIcon () {
                return (this.$page.props 
                        && this.$page.props.content.settings.general.medias.favicon 
                        && this.$page.props.content.settings.general.medias.favicon.url_raw) 
                        ? this.$page.props.content.settings.general.medias.favicon.url_raw : ''
            },
            isSettingsData () {
                return (this.$page.props && this.$page.props.content && this.$page.props.content.settings) ? true : false
            },
            googleMarketing () {
                return (this.isSettingsData && this.$page.props.content.settings.api.google_marketing) ? this.$page.props.content.settings.api.google_marketing : false
            }

        },
        created () {
            this.consent()

            useHead({
                title: this.metaInfoTitle,
                meta: [
                    {
                        name: 'description',
                        content: this.metaInfoDescription
                    },
                    {
                        property: 'og:url',
                        content: this.metaInfoUrl
                    },
                    {
                        property: 'og:title',
                        content: this.metaInfoTitle
                    },
                    {
                        property: 'og:description',
                        content: this.metaInfoDescription
                    },
                    {
                        property: 'og:image',
                        content: this.metaInfoSharingImage
                    },
                    {
                        name: 'twitter:card',
                        content: 'summary'
                    }
                ],
                link: [
                    {
                        rel: 'icon',
                        type: 'image/png',
                        href: this.favIcon
                    }
                ]
            })
        },
        mounted () {
            // track analytics
            // if (window.gakey) {
            //     if (this.$page.url && this.$page.url != '') {
            //         this.$ga.page(this.$page.url)
            //     }
            // }

            // page background
            window.addEventListener('resize', this.configPageBg)
            this.configPageBg()

            // fluid video embeds
            FitVidsInit()

            // dynamic CSS styles from CMS configuration
            let generalStylesSettings = {}
            let fontStylesSettings = {}
            let primaryButtonSettings = {}
            let secondaryButtonSettings = {}

            let cssFontColor = null
            let cssFontColorHeader = null
            let cssFontColorFooter = null
            let cssFontParagraphFamily = null
            let cssFontHeadingFamily = null
            let cssHeaderMobileBgColor = null
            let cssPrimaryButton = null
            let cssSecondaryButton = null
            let cssPlaceholderColor = null
            let cssInputColor = null
            let cssInputBorder = null
            let cssSelectOptionSelectedColor = null
            let cssPlayButtonColor = null
            let cssSocialIconColor = null

            // general styles settings
            if (this.$page.props 
                && this.$page.props.content 
                && this.$page.props.content.settings 
                && this.$page.props.content.settings.styles
                && this.$page.props.content.settings.styles.general) {
                    generalStylesSettings = this.$page.props.content.settings.styles.general
            }

            // font styles settings
            if (this.$page.props
                && this.$page.props.content
                && this.$page.props.content.settings
                && this.$page.props.content.settings.styles.fonts) {
                    fontStylesSettings = this.$page.props.content.settings.styles.fonts
            }

            // button styles settings
            if (this.$page.props 
                && this.$page.props.content 
                && this.$page.props.content.settings 
                && this.$page.props.content.settings.styles) {
                    if (this.$page.props.content.settings.styles.primary_button) {
                        primaryButtonSettings = this.$page.props.content.settings.styles.primary_button
                    }
                    if (this.$page.props.content.settings.styles.secondary_button) {
                        secondaryButtonSettings = this.$page.props.content.settings.styles.secondary_button
                    }
            }

            // text color
            if (generalStylesSettings.color) {
                cssFontColor = `color: ` + generalStylesSettings.color + `;`
                cssSelectOptionSelectedColor = generalStylesSettings.color
            }

            // text color (header)
            if (this.$page.props 
                && this.$page.props.content
                && this.$page.props.content.settings
                && this.$page.props.content.settings.styles.header.font_color !== '') {
                cssFontColorHeader = `color: ` + this.$page.props.content.settings.styles.header.font_color + `;`
            } else {
                cssFontColorHeader = cssFontColor
            }

            // text color (footer)
            if (this.$page.props 
                && this.$page.props.content 
                && this.$page.props.content.settings
                && this.$page.props.content.settings.styles.footer.font_color !== '') {
                cssFontColorFooter = `color: ` + this.$page.props.content.settings.styles.footer.font_color + `;`
            } else {
                cssFontColorFooter = cssFontColor
            }

            // headings
            if (fontStylesSettings.pathFileHeaders && fontStylesSettings.pathFileHeaders.length >= 2) {
                cssFontHeadingFamily = `
                    @font-face {
                        font-family: 'CustomHeadingFont';
                        src: url('` + fontStylesSettings.pathFileHeaders[0] + `') format('woff'),
                            url('` + fontStylesSettings.pathFileHeaders[1] + `') format('woff2');
                        font-weight: normal;
                        font-style: normal;
                    }
                `
            }

            // paragraphs
            if (fontStylesSettings.pathFileParagraphs && fontStylesSettings.pathFileParagraphs.length >= 2) {
                cssFontParagraphFamily = `
                    @font-face {
                        font-family: 'CustomParagraphFont';
                        src: url('` + fontStylesSettings.pathFileParagraphs[0] + `') format('woff'),
                            url('` + fontStylesSettings.pathFileParagraphs[1] + `') format('woff2');
                        font-weight: normal;
                        font-style: normal;
                    }
                `
            }

            // header mobile nav
            if (this.$page.props  && this.$page.props.content && this.$page.props.content.settings.styles.header.bg_color !== '') {
                cssHeaderMobileBgColor = this.$page.props.content.settings.styles.header.bg_color;
            } else {
                cssHeaderMobileBgColor = 'transparent'
            }

            // primary button
            if (primaryButtonSettings.bg_color) {
                cssPrimaryButton = `background-color: ` + primaryButtonSettings.bg_color + ';'
            }
            if (primaryButtonSettings.border) {
                cssPrimaryButton += `border: ` + primaryButtonSettings.border + `;`
            }
            if (primaryButtonSettings.border_radius) {
                cssPrimaryButton += `border-radius: ` + primaryButtonSettings.border_radius + `px;`
            }
            if (primaryButtonSettings.text_color) {
                cssPrimaryButton += `color: ` + primaryButtonSettings.text_color + ';'
            }

            // secondary button
            if (secondaryButtonSettings.bg_color) {
                cssSecondaryButton = `background-color: ` + secondaryButtonSettings.bg_color + ';'
            }
            if (secondaryButtonSettings.border) {
                cssSecondaryButton += `border: ` + secondaryButtonSettings.border + `;`
            }
            if (secondaryButtonSettings.border_radius) {
                cssSecondaryButton += `border-radius: ` + secondaryButtonSettings.border_radius + `px;`
            }
            if (secondaryButtonSettings.text_color) {
                cssSecondaryButton += `color: ` + secondaryButtonSettings.text_color + ';'
            }

            // play button color (video)
            if (primaryButtonSettings.bg_color) {
                cssPlayButtonColor = primaryButtonSettings.bg_color;
            }

            // social icons color
            if (this.$page.props 
                && this.$page.props.content 
                && this.$page.props.content.settings
                && this.$page.props.content.settings.styles.footer.font_color !== '') {
                cssSocialIconColor = this.$page.props.content.settings.styles.footer.font_color + `;`
            } else {
                cssSocialIconColor = generalStylesSettings.color
            }

            // input color + border color + placeholder color
            if (generalStylesSettings.color) {
                cssPlaceholderColor = 'color: ' + generalStylesSettings.color + ' !important;'
                cssInputColor = 'color: ' + generalStylesSettings.color + ';'
                cssInputBorder = 'border: 1px solid ' + generalStylesSettings.color + ';'
            }

            // create css styles
            let css = document.createElement('style')
            css.setAttributeNode(document.createAttribute('scopped'))

            if (cssFontColor && cssFontHeadingFamily && cssFontParagraphFamily && cssInputColor && cssInputBorder && cssPlaceholderColor) {
                let css_general_styles = `
                    ` + cssFontHeadingFamily + `
                    ` + cssFontParagraphFamily + `

                    h1, h2, h3, h4, h5, h6 {
                        font-family: 'CustomHeadingFont';
                        ` + cssFontColor + `
                    }

                    header nav {
                        font-family: 'CustomHeadingFont';
                        ` + cssFontColorHeader + `
                    }

                    header .mobile-nav .nav-wrapper {
                        background-color: ` + cssHeaderMobileBgColor + `;
                    }

                    header .mobile-nav button {
                        ` + cssFontColorHeader + `
                    }

                    footer ul {
                        font-family: 'CustomParagraphFont';
                    }

                    footer ul li a {
                        font-family: 'CustomParagraphFont';
                        ` + cssFontColorFooter + `
                    }

                    footer ul.social a svg {
                        fill: ` + cssSocialIconColor + `
                    }
                    
                    footer ul.social a:hover svg {
                        opacity: 0.8;
                    }

                    footer .copyright {
                        font-family: 'CustomParagraphFont';
                        ` + cssFontColorFooter + `
                    }

                    p {
                        font-family: 'CustomParagraphFont';
                        ` + cssFontColor + `
                    }

                    ul li,
                    ol li {
                        font-family: 'CustomParagraphFont';
                        ` + cssFontColor + `
                    }

                    table {
                        font-family: 'CustomParagraphFont';
                        ` + cssFontColor + `
                    }

                    input[type=text],
                    input[type=email]
                    input[type=password],
                    textarea {
                        font-family: 'CustomParagraphFont';
                        ` + cssInputColor + `
                        ` + cssInputBorder + `
                    }

                    input[type=text]:focus,
                    input[type=email]:focus,
                    input[type=password],
                    textarea {
                        ` + cssInputBorder + `
                    }

                    input[type=checkbox] {
                        ` + cssInputBorder + `
                        ` + cssFontColor + `
                    }

                    ::placeholder {
                        ` + cssPlaceholderColor + `
                    }
                    :-ms-input-placeholder {
                        ` + cssPlaceholderColor + `
                    }
                    ::-ms-input-placeholder {
                        ` + cssPlaceholderColor + `
                    }

                    .block-video-playbtn path {
                        fill: ` + cssPlayButtonColor + `;
                    }

                    .block-form span.form-footer {
                        ` + cssFontColor + `
                    }

                    .block-form .el-select .el-select__caret {
                        ` + cssFontColor + `
                    }

                    .block-form .el-select .el-input.is-disabled .el-input__inner {
                        ` + cssInputBorder + `
                    }

                    .el-select-dropdown .el-select-dropdown__item.selected {
                        color: ` + cssSelectOptionSelectedColor + ` !important;
                    }
                `
                css.appendChild(document.createTextNode(css_general_styles))
            }
            
            if (cssPrimaryButton) {
                let css_primary_styles = `
                    .block-button__primary {
                        ` + cssPrimaryButton + `
                    }
                `
                css.appendChild(document.createTextNode(css_primary_styles))
            }

            if (cssSecondaryButton) {
                let css_secondary_styles = `
                    .block-button__secondary {
                        ` + cssSecondaryButton + `
                    }
                `
                css.appendChild(document.createTextNode(css_secondary_styles))
            }

            this.$el.appendChild(css)
        },
        methods: {
            getCookie (name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            },

            consent() {
                this.cookieConsentCheckTimer = setInterval(() => {
                    const cconsentCookie = this.getCookie('cconsent')
                    if (cconsentCookie) {
                        const parsedCconsentCookie = JSON.parse(cconsentCookie)
                        if (parsedCconsentCookie && parsedCconsentCookie.categories.usage.wanted) {
                            if (this.googleMarketing) {
                                console.log('cookie2')
                                setOptions({
                                    config: { id: this.googleMarketing.key }
                                })
                                
                                bootstrap().then((gtag) => {
                                    // console.log('gtag load')
                                })
                            }

                            clearInterval(this.cookieConsentCheckTimer)
                        } else {
                            clearInterval(this.cookieConsentCheckTimer)
                        }
                    }
                }, 100)
            },

            configPageBg () {
                let bgImage = ''
                let bgColor = ''
                let pageBody = document.querySelector('body')
                let pageMain = document.querySelector('main')

                if (this.$page.props.content && this.$page.props.content.styles && this.$page.props.content.styles.bg_color) {
                    bgColor = this.$page.props.content.styles.bg_color
                }

                if (this.$page.props.content.medias && this.$page.props.content.medias.length > 0) {
                    if (window.innerWidth >= 1024 && this.$page.props.content.medias[0]) {
                        bgImage = this.$page.props.content.medias[0].url_raw
                    } else if (window.innerWidth < 1024 && this.$page.props.content.medias[1]) {
                        bgImage = this.$page.props.content.medias[1].url_raw
                    }
                }

                pageBody.style.backgroundColor = bgColor
                pageMain.style.backgroundImage = 'url(' + bgImage + ')'
                pageMain.style.backgroundRepeat = 'no-repeat'
                pageMain.style.backgroundPosition = 'center'
                pageMain.style.backgroundSize = 'cover'
            },

            
        }
    }
</script>
