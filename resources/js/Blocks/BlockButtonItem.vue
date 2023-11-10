<template>
    <a 
        :id="configID"
        :class="configClasses"
        :style="buttonCustomStyles"
        :href="buttonLink"
        :target="buttonTarget">
        {{ buttonTitle }}
    </a>
</template>

<script>
    export default {
        props: ['blockData'],
        computed: {
            configID () {
                return (this.blockData.content && this.blockData.content.html_id) ? this.blockData.content.html_id : ''
            },
            configClasses() {
                if (this.blockData.content && this.blockData.content.style_button) {
                    if (this.blockData.content.style_button === 'primary') {
                        return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-button block-button__primary ' + this.blockData.content.html_class : 'block-item block-button block-button__primary'        
                    } else if (this.blockData.content.style_button === 'secondary') {
                        return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-button block-button__secondary ' + this.blockData.content.html_class : 'block-item block-button block-button__secondary'
                    } else if (this.blockData.content && this.blockData.content.style_button === 'custom') {
                        return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-button ' + this.blockData.content.html_class : 'block-item block-button'
                    }
                }
            },
            buttonCustomStyles () {
                let customStyles = ''

                if (this.blockData.content && this.blockData.content.style_button && this.blockData.content.style_button === 'custom') {
                    if (this.blockData.content.bg_color) {
                        customStyles += 'background-color: ' + this.blockData.content.bg_color + ';'
                    }
                    if (this.blockData.content.border) {
                        customStyles += 'border: ' + this.blockData.content.border + ';'
                    }
                    if (this.blockData.content.border_radius) {
                        customStyles += 'border-radius: ' + this.blockData.content.border_radius + 'px;'
                    }
                    if (this.blockData.content.text_color) {
                        customStyles += 'color: ' + this.blockData.content.text_color + ';'
                    }
                }

                return customStyles
            },
            buttonLink () {
                if (this.blockData.content && this.blockData.content.type) {
                    if (this.blockData.content.type === 'page_link') {
                        return (this.blockData.page && this.blockData.page.permalink) ? this.blockData.page.permalink : ''                        
                    } else if (this.blockData.content.type === 'external_link') {
                        return this.blockData.content.external_link
                    }
                }
                return ''
            },
            buttonTarget () {
                if (this.blockData.content && this.blockData.content.type) {
                    if (this.blockData.content.type === 'page_link') {
                        return '_self'
                    } else if (this.blockData.content.type === 'external_link') {
                        return '_blank'
                    }
                }
            },
            buttonTitle () {
                if (this.blockData.content && this.blockData.content.type) {
                    if (this.blockData.content.type === 'page_link') {
                        if (this.blockData.content.text_button) {
                            return this.blockData.content.text_button
                        } else {
                            return (this.blockData.page && this.blockData.page.title) ? this.blockData.page.title : ''
                        }
                    } else if (this.blockData.content.type === 'external_link') {
                        if (this.blockData.content.text_button) {
                            return this.blockData.content.text_button
                        } else {
                            return this.blockData.content.external_link
                        }
                    }
                }
                return ''
            }
        }
    }
</script>