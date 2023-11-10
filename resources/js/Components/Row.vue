<template>
    <div v-if="hasCols() && rowLayoutType() === 'row-layout__simple'" :ref="'row-' + rowData.id" :id="configRowID()" :class="rowClasses()" :style="rowStyles()">
        <div v-for="col in rowData.columns" :key="'page-col-' + col.id" :ref="'col-' + col.id" :id="configColID(col)" :class="colClasses(col)" :style="colStyles(col)">
            <Column :columnData="col" />
        </div>
    </div>
    <div v-else-if="hasCols() && rowLayoutType() === 'row-layout__wrapped'" :ref="'row' + rowData.id" :class="'page-row__wrapper'" :style="rowStyles()">
        <div :id="configRowID()" :class="rowClasses()" :style="rowWrappedBgColor()">
            <div v-for="col in rowData.columns" :key="'page-col-' + col.id" :ref="'col-' + col.id" :id="configColID(col)" :class="colClasses(col)" :style="colStyles(col)">
                <Column :columnData="col" />
            </div>
        </div>
    </div>
</template>

<script>
    import Column from '@/Components/Column'

    export default {
        props: ['rowData'],
        components: {
            Column
        },
        methods: {
            // cols
            hasCols () {
                return (this.rowData.columns && this.rowData.columns.length > 0) ? true : false
            },
            configColID (col) {
                return (col.content && col.content.html_id) ? col.content.html_id : ''
            },
            colClasses (col) {
                // default column classes
                let classes = 'page-col flex px-5 xl:px-10'

                // convert column widths to flex-basis
                if (col.content && col.content.width_column) {
                    switch (col.content.width_column) {
                        case 'col-25':
                            classes += ' basis-full lg:basis-1/4'
                            break;
                        case 'col-33':
                            classes += ' basis-full lg:basis-1/3'
                            break;
                        case 'col-50':
                            classes += ' basis-full lg:basis-1/2'
                            break;
                        case 'col-66':
                            classes += ' basis-full lg:basis-2/3'
                            break;
                        case 'col-75':
                            classes += ' basis-full lg:basis-3/4'
                            break;
                        case 'col-100':
                            classes += ' basis-full lg:basis-full'
                            break;
                    }
                }

                // convert column vertical alignment
                if (col.content && col.content.vertical_alignment_mobile) {
                    if (col.content.vertical_alignment_mobile === 'top') {
                        classes += ' items-start'
                    } else if (col.content.vertical_alignment_mobile === 'middle') {
                        classes += ' items-center'
                    } else if (col.content.vertical_alignment_mobile === 'bottom') {
                        classes += ' items-end'
                    }
                }
                if (col.content && col.content.vertical_alignment) {
                    if (col.content.vertical_alignment === 'top') {
                        classes += ' lg:items-start'
                    } else if (col.content.vertical_alignment === 'middle') {
                        classes += ' lg:items-center'
                    } else if (col.content.vertical_alignment === 'bottom') {
                        classes += ' lg:items-end'
                    }
                }

                // convert column horizontal alignment
                if (col.content && col.content.horizontal_alignment_mobile) {
                    if (col.content.horizontal_alignment_mobile === 'left') {
                        classes += ' justify-start'
                    } else if (col.content.horizontal_alignment_mobile === 'center') {
                        classes += ' justify-center'
                    } else if (col.content.horizontal_alignment_mobile === 'right') {
                        classes += ' justify-end'
                    }
                }
                if (col.content && col.content.horizontal_alignment) {
                    if (col.content.horizontal_alignment === 'left') {
                        classes += ' lg:justify-start'
                    } else if (col.content.horizontal_alignment === 'center') {
                        classes += ' lg:justify-center'
                    } else if (col.content.horizontal_alignment === 'right') {
                        classes += ' lg:justify-end'
                    }
                }

                // convert column vertical blocks force / break flex
                if (col.content && col.content.vertical_blocks) {
                    classes += ' flex-wrap'
                }

                // convert hide desktop / mobile
                if (col.content && col.content.hide_desktop) {
                    classes += ' hide-desktop'
                }
                if (col.content && col.content.hide_mobile) {
                    classes += ' hide-mobile'
                }

                // get config classes
                if (col.content && col.content.html_class) {
                    classes += (' ' + col.content.html_class)
                }

                return classes
            },
            colStyles (col) {
                let styles = ''

                // background color
                if (col.content && col.content.bg_color) {
                    styles += 'background-color: ' + col.content.bg_color + ';'
                }

                // background image
                let bgDesktop = null
                let bgMobile = null

                if (col.medias && col.medias.length > 0) {
                    col.medias.forEach((image) => {
                        if (image.role === 'image_bg_default') {
                            bgDesktop = image.url_raw
                        } else if (image.role === 'image_bg_mobile') {
                            bgMobile = image.url_raw
                        }

                        if (window.innerWidth >= 1024 && bgDesktop) {
                            styles += 'background-image: url("' + bgDesktop + '"); background-repeat: no-repeat; background-position: center; background-size: cover;'
                        } else if (window.innerWidth < 1024 && !bgMobile) {
                            styles += 'background-image: url("' + bgDesktop + '"); background-repeat: no-repeat; background-position: center; background-size: cover;'
                        } else if (window.innerWidth < 1024 && bgMobile) {
                            styles += 'background-image: url("' + bgMobile + '"); background-repeat: no-repeat; background-position: center; background-size: cover;'
                        }
                    })
                }

                return styles
            },
            updateColStyles () {
                if (this.hasCols()) {
                    this.rowData.columns.forEach((col) => {
                        this.$refs['col-' + col.id][0].style = this.colStyles(col)
                    })
                }
            },
            // rows
            configRowID () {
                return (this.rowData.content && this.rowData.content.html_id) ? this.rowData.content.html_id : ''
            },
            rowClasses () {
                let classes = ''

                if (this.rowData.content && (this.rowData.content.type === 'standard' || this.rowData.content.type === 'full-boxed')) {
                    classes += 'container mx-auto '
                }

                if (this.rowData.content && this.rowData.content.html_class) {
                    classes += 'page-row flex flex-wrap lg:flex-nowrap ' + this.rowData.content.html_class
                } else {
                    classes += 'page-row flex flex-wrap lg:flex-nowrap'
                }

                return classes
            },
            rowWrappedBgColor () {
                // background color
                if (this.rowData.content && this.rowData.content.bg_color) {
                    return 'background-color: ' + this.rowData.content.bg_color + ';'
                }
            },
            rowStyles () {
                let styles = ''

                // background color
                if (this.rowData.content && this.rowData.content.bg_color) {
                    styles += 'background-color: ' + this.rowData.content.bg_color + ';'
                }

                // background image
                let bgDesktop = null
                let bgMobile = null

                if (this.rowData.medias && this.rowData.medias.length > 0) {
                    this.rowData.medias.forEach((image) => {
                        if (image.role === 'image_bg_default') {
                            bgDesktop = image.url_raw
                        } else if (image.role === 'image_bg_mobile') {
                            bgMobile = image.url_raw
                        }
                    })

                    if (window.innerWidth >= 1024 && bgDesktop) {
                        styles += 'background-image: url("' + bgDesktop + '"); background-repeat: no-repeat; background-position: center; background-size: cover;'
                    } else if (window.innerWidth < 1024 && !bgMobile) {
                        styles += 'background-image: url("' + bgDesktop + '"); background-repeat: no-repeat; background-position: center; background-size: cover;'
                    } else if (window.innerWidth < 1024 && bgMobile) {
                        styles += 'background-image: url("' + bgMobile + '"); background-repeat: no-repeat; background-position: center; background-size: cover;'
                    }
                }

                return styles
            },
            updateRowStyles () {
                this.$refs['row-' + this.rowData.id].style = this.rowStyles()
            },
            rowLayoutType () {
                if (this.rowData.content && (this.rowData.content.type === 'standard' || this.rowData.content.type === 'full-width')) {
                    return 'row-layout__simple'
                } else if (this.rowData.content && this.rowData.content.type === 'full-boxed') {
                    return 'row-layout__wrapped'
                }
            }
        },
        mounted () {
            window.addEventListener('resize', this.updateColStyles)
            window.addEventListener('resize', this.updateRowStyles)
        }
    }
</script>
