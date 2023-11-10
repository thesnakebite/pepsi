<template>
    <nav class="desktop-nav list-none hidden sm:flex items-center justify-center">
        <li v-for="(menuItem, itemIndex) in headerMenuItems" :key="itemIndex">
            <div v-if="menuItem.type === 'page_link'">
                <a :href="menuItem.page.permalink">{{ menuItem.title }}</a>
                <span v-if="itemIndex < (headerMenuItems.length - 1)">&nbsp;|&nbsp;</span>
            </div>
            <div v-else-if="menuItem.type === 'external_link'">
                <a :href="menuItem.link">{{ menuItem.title }}</a>
                <span v-if="itemIndex < (headerMenuItems.length - 1)">&nbsp;|&nbsp;</span>
            </div>
        </li>
    </nav>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'

    export default {
        mixins: [LayoutMixin]
    }
</script>
