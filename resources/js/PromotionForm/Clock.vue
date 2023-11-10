<template>
    <div id="timepicker"></div>
    <button v-show="!pickerManualInput" @click="pickerToggleInput" class="input-clock-button bg-white text-xs border px-4 py-2 mx-auto block">Introduce la hora manualmente</button>
    <div v-show="pickerManualInput" class="input-clock w-full">
        <label for="picker-time" class="block">Introduce la hora manualmente*:</label>
        <input @input="pickerSetManualInput" ref="pickerTime" name="picker-time" type="text" placeholder="p.e.: 13:30" class="bg-white text-sm border w-full" />
        <button @click="pickerToggleInput" class="bg-white text-xs border px-4 py-2 mt-4 w-full block">Poner el reloj en hora</button>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import Timepicker from '@/Utils/timepicker'

    export default defineComponent({
        props: [
            'modelValue',
            'data'
        ],

        data () {
            return {
                picker: null,
                pickerElm: null,
                pickerManualInput: false
            }
        },

        mounted () {
            try {
                if (this.$page.props
                    && this.$page.props.content
                    && this.$page.props.content.settings
                    && this.$page.props.content.settings.styles.fonts
                    && this.$page.props.content.settings.styles.fonts.pathFileParagraphs
                    && this.$page.props.content.settings.styles.fonts.pathFileParagraphs[0]) {

                    const customParagraphFont = this.$page.props.content.settings.styles.fonts.pathFileParagraphs[0]
                    const clockFont = new FontFace('CustomClockFont', 'url(' + customParagraphFont + ')')
                    clockFont.load().then((font) => {
                        document.fonts.add(font)
                        this.loadAnalogClock()
                    })
                } else {
                    this.loadAnalogClock()
                }
            } catch (error) {
                console.error('Error loading custom font:', error)
                this.loadAnalogClock()
            }
        },
        
        methods: {
            loadAnalogClock () {
                this.picker = new Timepicker(false, true, true, null, null)
                this.pickerElm = this.picker.getElement()

                const container = document.getElementById('timepicker')
                container.appendChild(this.pickerElm)

                const timeDisplay = document.getElementById('timedisplay')
                timeDisplay.textContent = 'Mueve las agujas para marcar la hora'
                timeDisplay.style.visibility = 'visible'
                this.picker.show()

                this.picker.onPicked = () => {
                    this.$emit('update:modelValue', this.picker.getTimeString())
                }
            },
            pickerToggleInput () {
                // data
                this.$refs.pickerTime.value = this.picker.getTimeString()
                this.$emit('update:modelValue', this.picker.getTimeString())
                // ui
                const timeDisplay = document.getElementById('timedisplay')
                timeDisplay.textContent = this.picker.getTimeString()
                !this.pickerManualInput ? this.picker.hide() : this.picker.show()
                this.pickerManualInput = !this.pickerManualInput
            },
            pickerSetManualInput (ev) {
                const manualTime = ev.target.value.split(':')
                if (manualTime.length == 2 && (manualTime[0] >= 0 && manualTime[0] <= 24) && (manualTime[1] >= 0 && manualTime[1] <= 59)) {
                    this.picker.setHours(manualTime[0])
                    this.picker.setMinutes(manualTime[1])
                }
                this.$emit('update:modelValue', ev.target.value)
            }
        }
    })

</script>
