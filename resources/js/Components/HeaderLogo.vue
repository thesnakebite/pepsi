<template>
    <a href="/" class="inline-block">
        <img :src="configLogo" class="w-32 sm:w-40" />
    </a>
</template>

<script>
    export default {
        computed: {
            configLogo () {
                return (this.$page.props 
                        && this.$page.props.content 
                        && this.$page.props.content.settings.general.medias.logo.url_raw)
                        ? this.$page.props.content.settings.general.medias.logo.url_raw : ''
            }
        }
    }
</script>
