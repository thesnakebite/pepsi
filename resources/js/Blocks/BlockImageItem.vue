<template>
    <img 
        v-if="configImageType === 'no_link'"
        :id="configID"
        :class="configClasses"
        :src="imageFile" />
    <a
        v-else-if="configImageType === 'page_link'"
        :href="imageLink"
        target="_self">
        <img 
            :id="configID"
            :class="configClasses"
            :src="imageFile" />
    </a>
    <a 
        v-else-if="configImageType === 'external_link_self'" 
        :href="imageLink"
        target="_self">
        <img
            :id="configID" 
            :class="configClasses"
            :src="imageFile" />
    </a>
    <a 
        v-else-if="configImageType === 'external_link_blank'"
        :href="imageLink"
        target="_blank">
        <img
            :id="configID" 
            :class="configClasses"
            :src="imageFile" />
    </a>
</template>

<script>
    export default {
        props: ['blockData'],
        data () {
            return {
                imageFile: ''
            }
        },
        computed: {
            configID () {
                return (this.blockData.content && this.blockData.content.html_id) ? this.blockData.content.html_id : ''
            },
            configClasses () {
                return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-image ' + this.blockData.content.html_class : 'block-item block-image'
            },
            configImageType () {
                return (this.blockData.content && this.blockData.content.type) ? this.blockData.content.type : ''
            },
            imageLink () {
                if (this.blockData.content && this.blockData.content.type) {
                    if (this.blockData.content.type === 'page_link') {
                        return (this.blockData.page && this.blockData.page.permalink) ? this.blockData.page.permalink : ''                        
                    } else if (this.blockData.content.type === 'external_link_self') {
                        return this.blockData.content.external_link_self
                    } else if (this.blockData.content.type === 'external_link_blank') {
                        return this.blockData.content.external_link_blank
                    } 
                }
                return ''
            },
        },
        mounted () {
            window.addEventListener('resize', this.updateImageFile)
            this.updateImageFile()
        },
        methods: {
            updateImageFile () {
                let imageDesktop = null
                let imageMobile = null

                if (this.blockData.medias && this.blockData.medias.length > 0) {
                    this.blockData.medias.forEach((image) => {
                        if (image.role === 'image_bg_default') {
                            imageDesktop = image.url_raw
                        } else if (image.role === 'image_bg_mobile') {
                            imageMobile = image.url_raw
                        }
                    })

                    if (window.innerWidth >= 1024 && imageDesktop) {
                        this.imageFile = imageDesktop
                    } else if (window.innerWidth < 1024 && !imageMobile) { 
                        this.imageFile = imageDesktop
                    } else if (window.innerWidth < 1024 && imageMobile) {
                        this.imageFile = imageMobile
                    } else {
                        this.imageFile = ''
                    }
                }
            }
        }
    }
</script>