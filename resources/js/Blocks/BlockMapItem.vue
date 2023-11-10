<template>
    <div
        :id="configID"
        :class="configClasses">
        <div class="flex flex-wrap md:flex-nowrap items-baseline my-5">
            <div>
                <span class="inline-block mb-4 md:mb-0 mr-4 aux-text-color aux-fontfamily-heading text-2xl uppercase">
                    {{ $__('blocks.map.formHeaderTitle') }}
                </span>
            </div>
            <div>
                <input 
                    v-model="zipcodeValue"
                    @keyup="zipcodeValidate"
                    @keyup.enter="filterByZipcode"
                    :ondrop="zipcodeDrop"
                    :onpaste="zipcodePaste"
                    type="text" 
                    placeholder="ej.: 28028"
                    class="mr-4" />
                <button 
                    @click="filterByZipcode"
                    class="block-button block-button__primary uppercase disabled:bg-gray-300 disabled:border-gray-300"
                    :disabled="!zipcodeFilteringEnabled">
                    {{ $__('blocks.map.formSubmitButtonValue') }}
                </button>
                <span :class="[!zipcodeFilteringEnabled ? 'visible' : 'invisible', 'error block basis-full text-sm pt-1']">
                    {{ zipcodeErrorMsg }}
                </span>
            </div>
        </div>
        <div class="map-wrapper">
            <div v-if="mapOverlayVisible" class="map-overlay">
                <p>{{ mapOverlayMessage }}</p>
            </div>
            <div id="map"></div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import gmapsInit from '@/Utils/gmaps'

    export default {
        props: ['blockData'],
        data () {
            return {
                map: null,
                mapOverlayVisible: true,
                mapOverlayMessage: this.$__('blocks.map.mapOverlayInitialMsg'),
                zipcodeValue: '',
                zipcodeErrorMsg: this.$__('blocks.map.formZipcodeValidationMsg'),
                zipcodeFilteringEnabled: false
            }
        },
        computed : {
            configID () {
                return (this.blockData.content && this.blockData.content.html_id) ? this.blockData.content.html_id : ''
            },
            configClasses () {
                return (this.blockData.content && this.blockData.content.html_class) ? 'block-item block-map w-full ' + this.blockData.content.html_class : 'block-item block-map w-full'
            },
            mapApiUrl () {
                return (this.blockData.content && this.blockData.content.api_url) ? this.blockData.content.api_url : ''
            },
            mapCustomMarker () {
                let markerImageSrc = null

                if (this.blockData.medias && this.blockData.medias.length > 0) {
                    this.blockData.medias.forEach((marker) => {
                        if (marker.role === 'image_maker') {
                            markerImageSrc = marker.url_raw
                        }
                    })

                    return markerImageSrc ? markerImageSrc : ''
                }
            }
        },
        mounted () {
            this.loadMap()
        },
        methods: {
            async loadMap () {
                let gmapsID = ''
                if (this.blockData.content && this.blockData.content.google_maps_id) {
                    gmapsID = this.blockData.content.google_maps_id
                }

                const google = await gmapsInit(this.$page.props.content.settings.api.google_maps.key)
                this.map = new google.maps.Map(this.$el.querySelector('#map'), {
                    center: { lat: 40.4378698, lng: -3.819619 },
                    zoom: 6,
                    mapId: gmapsID,
                    mapTypeControl: false,
                    streetViewControl: false,
                    fullscreenControl: false
                })
            },
            zipcodeValidate (e) {
                let zipcodeInputValue = e.target.value
                let reg = new RegExp('^[0-9]+$')
                let isNumericOnly = reg.test(String(zipcodeInputValue))

                if (isNumericOnly && zipcodeInputValue.length === 5) {
                    this.zipcodeFilteringEnabled = true
                } else {
                    this.zipcodeFilteringEnabled = false
                }
            },
            zipcodeDrop () {
                return false
            },
            zipcodePaste () {
                return false
            },
            filterByZipcode () {
                if (!this.zipcodeFilteringEnabled) {
                    return
                }

                // API shops endpoint
                let apiToken = this.$page.props.content.settings.api.artesanosdelsabor.key
                let apiPayload = {
                    params: {
                        postal_code: this.zipcodeValue
                    },
                    headers: {
                        'Authorization': 'Bearer ' + apiToken
                    }
                }
                axios.get(this.mapApiUrl, apiPayload)
                    .then((response) => {
                        if (response.data && response.data.items && response.data.items.length > 0) {
                            // render map markers
                            response.data.items.forEach((shop, shopIndex) => {
                                let map = this.map

                                let infoContent = `
                                    <div><b>${shop.label}</b></div>
                                    <div>${shop.address.address}</div>
                                    <div>${shop.address.postal_code} ${shop.address.city} - ${shop.address.province.label}</div>
                                `
                                let infoWindow = new google.maps.InfoWindow({
                                    content: infoContent
                                })

                                let shopLatLng = new google.maps.LatLng(shop.address.location.lat, shop.address.location.lng)

                                let marker = new google.maps.Marker({
                                    map: map,
                                    position: shopLatLng,
                                    title: 'Tienda ElPozo - ArtesanosDelSabor',
                                    icon: this.mapCustomMarker
                                })

                                marker.addListener('click', () => {
                                    infoWindow.open({
                                        anchor: marker,
                                        map,
                                        shouldFoucs: false
                                    })
                                })
                            })

                            // center map in first map marker
                            let centerMarker = new google.maps.LatLng(response.data.items[0].address.location.lat, response.data.items[0].address.location.lng)
                            this.map.setCenter(centerMarker)
                            this.map.setZoom(15)

                            // disable map overlay
                            this.mapOverlayVisible = false
                        } else {
                            this.mapOverlayVisible = true
                            this.mapOverlayMessage = this.$__('blocks.map.mapOverlayEmptyMsg')
                        }
                    })
                    .catch((error) => {
                        this.mapOverlayVisible = true
                        this.mapOverlayMessage = this.$__('blocks.map.mapOverlayEmptyMsg')
                    })
            }
        }
    }
</script>