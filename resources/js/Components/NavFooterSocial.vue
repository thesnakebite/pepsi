<template>
    <ul :class="footerClasses" v-if="hasSocialProfiles">
        <li v-if="socialProfileFB">
            <a :href="socialProfileFB" target="_blank">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="90px" height="90px">
                    <path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"/>
                </svg>
            </a>
        </li>
        <li v-if="socialProfileIG">
            <a :href="socialProfileIG" target="_blank">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="90px" height="90px">
                    <path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z"/>
                </svg>
            </a>
        </li>
        <li v-if="socialProfileTW">
            <a :href="socialProfileTW" target="_blank">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="90px" height="90px">
                    <path d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z"/>
                </svg>
            </a>
        </li>
        <li v-if="socialProfileYT">
            <a :href="socialProfileYT" target="_blank">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="90px" height="90px">
                    <path d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z"/>
                </svg>
            </a>
        </li>
        <li v-if="socialProfileLI">
            <a :href="socialProfileLI" target="_blank">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="-143 145 512 512" width="90px" height="90px">
                    <path d="M-143,145v512h512V145H-143z M41.4,508.1H-8.5V348.4h49.9V508.1z M15.1,328.4h-0.4c-18.1,0-29.8-12.2-29.8-27.7 c0-15.8,12.1-27.7,30.5-27.7c18.4,0,29.7,11.9,30.1,27.7C45.6,316.1,33.9,328.4,15.1,328.4z M241,508.1h-56.6v-82.6 c0-21.6-8.8-36.4-28.3-36.4c-14.9,0-23.2,10-27,19.6c-1.4,3.4-1.2,8.2-1.2,13.1v86.3H71.8c0,0,0.7-146.4,0-159.7h56.1v25.1 c3.3-11,21.2-26.6,49.8-26.6c35.5,0,63.3,23,63.3,72.4V508.1z" />
                </svg>
            </a>
        </li>
        <li v-if="socialProfileTK">
            <a :href="socialProfileTK" target="_blank">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="90px" height="90px">
                    <path d="M16.656 1.029c1.637-0.025 3.262-0.012 4.886-0.025 0.054 2.031 0.878 3.859 2.189 5.213l-0.002-0.002c1.411 1.271 3.247 2.095 5.271 2.235l0.028 0.002v5.036c-1.912-0.048-3.71-0.489-5.331-1.247l0.082 0.034c-0.784-0.377-1.447-0.764-2.077-1.196l0.052 0.034c-0.012 3.649 0.012 7.298-0.025 10.934-0.103 1.853-0.719 3.543-1.707 4.954l0.020-0.031c-1.652 2.366-4.328 3.919-7.371 4.011l-0.014 0c-0.123 0.006-0.268 0.009-0.414 0.009-1.73 0-3.347-0.482-4.725-1.319l0.040 0.023c-2.508-1.509-4.238-4.091-4.558-7.094l-0.004-0.041c-0.025-0.625-0.037-1.25-0.012-1.862 0.49-4.779 4.494-8.476 9.361-8.476 0.547 0 1.083 0.047 1.604 0.136l-0.056-0.008c0.025 1.849-0.050 3.699-0.050 5.548-0.423-0.153-0.911-0.242-1.42-0.242-1.868 0-3.457 1.194-4.045 2.861l-0.009 0.030c-0.133 0.427-0.21 0.918-0.21 1.426 0 0.206 0.013 0.41 0.037 0.61l-0.002-0.024c0.332 2.046 2.086 3.59 4.201 3.59 0.061 0 0.121-0.001 0.181-0.004l-0.009 0c1.463-0.044 2.733-0.831 3.451-1.994l0.010-0.018c0.267-0.372 0.45-0.822 0.511-1.311l0.001-0.014c0.125-2.237 0.075-4.461 0.087-6.698 0.012-5.036-0.012-10.060 0.025-15.083z" />
                </svg>
            </a>
        </li>
    </ul>
</template>

<script>
    import LayoutMixin from '@/Mixins/layout'

    export default {
        mixins: [LayoutMixin],
        computed: {
            hasSocialProfiles () {
                return ((this.$page.props  
                        && this.$page.props.content 
                        && this.$page.props.content.settings.socials) 
                        && (this.$page.props.content.settings.socials.facebook.url !== '' 
                            || this.$page.props.content.settings.socials.instagram.url !== '' 
                            || this.$page.props.content.settings.socials.twitter.url !== ''
                            || this.$page.props.content.settings.socials.youtube.url !== '')) 
                        ? true : false
            },
            socialProfileFB () {
                return (this.$page.props 
                        && this.$page.props.content 
                        && this.$page.props.content.settings.socials.facebook.url !== '')
                        ? this.$page.props.content.settings.socials.facebook.url : false
            },
            socialProfileIG () {
                return (this.$page.props 
                        && this.$page.props.content 
                        && this.$page.props.content.settings.socials.instagram.url !== '')
                        ? this.$page.props.content.settings.socials.instagram.url : false
            },
            socialProfileTW () {
                return (this.$page.props 
                        && this.$page.props.content 
                        && this.$page.props.content.settings.socials.twitter.url !== '')
                        ? this.$page.props.content.settings.socials.twitter.url : false
            },
            socialProfileYT () {
                return (this.$page.props 
                        && this.$page.props.content 
                        && this.$page.props.content.settings.socials.youtube.url !== '')
                        ? this.$page.props.content.settings.socials.youtube.url : false
            },
            socialProfileLI () {
                return (this.$page.props
                        && this.$page.props.content
                        && this.$page.props.content.settings.socials.linkedin.url !== '')
                        ? this.$page.props.content.settings.socials.linkedin.url : false
            },
            socialProfileTK () {
                return (this.$page.props
                        && this.$page.props.content
                        && this.$page.props.content.settings.socials.tiktok.url !== '')
                        ? this.$page.props.content.settings.socials.tiktok.url : false
            },
            footerClasses () {
                if (this.footerTemplateType === 'template-1' || this.footerTemplateType === 'template-3') {
                    return 'social flex justify-center sm:justify-end w-full sm:w-auto pt-4 sm:pt-0'
                } else if (this.footerTemplateType === 'template-2') {
                    return 'social flex justify-center sm:justify-start w-full sm:w-auto pt-4 sm:pt-0'
                }
            }
        }
    }
</script>
