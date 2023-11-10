<template>
    <div :class="configClasses">
        <div
            class="block-video-cover flex items-center justify-center absolute z-10 top-0 left-0 w-full h-full cursor-pointer"
            v-if="videoCoverShown"
            :style="videoCoverStyle"
            @click="hideVideoCover">
            <svg 
                version="1.1" 
                xmlns="http://www.w3.org/2000/svg" 
                xmlns:xlink="http://www.w3.org/1999/xlink" 
                x="0px" 
                y="0px"
	            viewBox="0 0 60 60" 
                xml:space="preserve"
                class="block-video-playbtn w-1/6">
                <g>
                    <path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30
                        c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15
                        C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/>
                    <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30
                        S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/>
                </g>
            </svg>
        </div>
        <video :id="configID" controls>
            <source :src="videoSourceUrl" />
        </video>
    </div>
</template>

<script>
    export default {
        props: ['blockData'],
        data () {
            return {
                videoCoverShown: true
            }
        },
        computed: {
            configID () {
                return (this.blockData.content && this.blockData.content.html_id) ? this.blockData.content.html_id : ''
            },
            configClasses () {
                return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-video relative ' + this.blockData.content.html_class : 'block-item block-video relative'
            },
            videoSourceUrl () {
                return (this.blockData.content && this.blockData.content.external_link) ? this.blockData.content.external_link : ''
            },
            videoPosterUrl () {
                return (this.blockData.medias && this.blockData.medias.length > 0) ? this.blockData.medias[0].url_raw : ''
            },
            videoCoverStyle () {
                return (this.videoPosterUrl) ? 'background: url("' + this.videoPosterUrl + '") center center / cover no-repeat;' : ''
            }
        },
        methods: {
            hideVideoCover () {
                const videoEl = this.$el.querySelector('video')

                if (videoEl && this.videoCoverShown) {
                    videoEl.play()
                    this.videoCoverShown = false
                }
            }
        }
    }
</script>
