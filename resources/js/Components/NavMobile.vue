<template>
    <div class="mobile-nav block sm:hidden">
        <button class="w-10 h-10 mt-2 sm:mt-5 mr-5 absolute top-0 right-0 z-10 focus:outline-none bg-transparent" @click="toggleMobileNav">
            <div class="block w-5 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': mobileNavOpen,' -translate-y-1.5': !mobileNavOpen }"></span>
                <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'opacity-0': mobileNavOpen } "></span>
                <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': mobileNavOpen, ' translate-y-1.5': !mobileNavOpen}"></span>
            </div>
        </button>

        <div 
            class="nav-wrapper flex items-center justify-center px-5 transition-transform duration-300 ease-in-out"
            :style="mobileNavDrawerStyle">
            <nav class="list-none text-center">
                <li v-for="(menuItem, itemIndex) in headerMenuItems" :key="itemIndex">
                    <div v-if="menuItem.type === 'page_link'">
                        <a :href="menuItem.page.permalink">{{ menuItem.title }}</a>
                    </div>
                    <div v-else-if="menuItem.type === 'external_link'">
                        <a :href="menuItem.link">{{ menuItem.title }}</a>
                    </div>
                </li>
            </nav>
        </div>
    </div>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'

    export default {
        mixins: [LayoutMixin],
        data () {
            return {
                mobileNavOpen: false,
                mobileNavDrawerStyle: ''
            }
        },
        methods: {
            resetMobileNav () {
                let bodyEl = document.querySelector('body')

                bodyEl.classList.remove('locked')
                this.setMobileNavDrawerStyle('hide')
                this.mobileNavOpen = false
            },
            toggleMobileNav () {
                let bodyEl = document.querySelector('body')

                if (!this.mobileNavOpen) {
                    bodyEl.classList.add('locked')
                    this.setMobileNavDrawerStyle('show')
                } else {
                    bodyEl.classList.remove('locked')
                    this.setMobileNavDrawerStyle('hide')
                }

                this.mobileNavOpen = !this.mobileNavOpen
            },
            setMobileNavDrawerStyle (translateType) {
                let styles = ''
                let headerEl = null
                let drawerWidth = 0

                headerEl = document.querySelector('header')
                if (headerEl) {
                    drawerWidth = 1 * ((window.innerWidth - headerEl.offsetWidth) / 2)
                }

                styles += 'width: ' + window.innerWidth + 'px;'

                if (translateType === 'show') {
                    styles += 'transform: translateX(' + drawerWidth + 'px);'
                } else if (translateType === 'hide') {
                    styles += 'transform: translateX(' + (2 * window.innerWidth) + 'px);'
                }

                this.mobileNavDrawerStyle = styles
            }
        },
        mounted () {
            window.addEventListener('resize', this.resetMobileNav)
            this.setMobileNavDrawerStyle('hide')
        }
    }
</script>
