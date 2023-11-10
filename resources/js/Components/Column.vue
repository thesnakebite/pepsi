<template>
    <component
        v-for="block in columnData.blocks"
        :key="'block-' + block.id"
        :is="nameComponent(block)"
        :blockData="block"
        :class="blockClasses(block)"
    />
</template>

<script>
    import BlockTextItem from '@/Blocks/BlockTextItem'
    import BlockButtonItem from '@/Blocks/BlockButtonItem'
    import BlockImageItem from '@/Blocks/BlockImageItem'
    import BlockVideoItem from '@/Blocks/BlockVideoItem'
    import BlockMapItem from '@/Blocks/BlockMapItem'
    import BlockFormItem from '@/Blocks/BlockFormItem'

    export default {
        props: ['columnData'],
        components: {
            BlockTextItem,
            BlockButtonItem,
            BlockImageItem,
            BlockVideoItem,
            BlockMapItem,
            BlockFormItem
        },
        methods: {
            nameComponent (block) {
                // snake to title naming convention: 'block_name' to 'BlockName'
                let blockName = (block.type).split('_').map(function (item) {
                    return item.charAt(0).toUpperCase() + item.substring(1)
                }).join('')
                return blockName
            },
            
            blockClasses (block) {
                let classes = ''

                if (block.content && block.content.hide_desktop) {
                    classes += ' hide-desktop'
                }

                if (block.content && block.content.hide_mobile) {
                    classes += ' hide-mobile'
                }

                return classes
            }
        }
    }
</script>
