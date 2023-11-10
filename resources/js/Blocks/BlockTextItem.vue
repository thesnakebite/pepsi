<template>
    <div 
        v-if="hasContent" 
        v-html="blockData.content.body"
        :id="configID"
        :class="configClasses">
    </div>
</template>

<script>
    export default {
        props: ['blockData'],
        computed: {
            hasContent () {
                return (this.blockData.content && this.blockData.content.body) ? true : false
            },
            configID () {
                return (this.blockData.content && this.blockData.content.html_id) ? this.blockData.content.html_id : ''
            },
            configClasses () {
                return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-text ' + this.blockData.content.html_class : 'block-item block-text'
            }
        }
    }
</script>
