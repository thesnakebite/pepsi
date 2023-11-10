<template>
    <input 
        class="w-1 h-1 opacity-0 overflow-hidden absolute -z-10" 
        @change="fileSelected" 
        type="file" 
        name="formfile" 
        id="formfile" />
    <label 
        class="formfileinput bg-black focus:bg-cyan-500 hover:bg-cyan-500 cursor-pointer flex items-center px-4 py-2" 
        for="formfile">
        <div class="w-4 mr-2">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                <g>
                    <path d="m153.7,171.5l81.9-88.1v265.3c0,11.3 9.1,20.4 20.4,20.4 11.3,0 20.4-9.1 20.4-20.4v-265.3l81.9,88.1c7.7,8.3 20.6,8.7 28.9,1.1 8.3-7.7 8.7-20.6 1.1-28.9l-117.3-126.2c-11.5-11.6-25.6-5.2-29.9,0l-117.3,126.2c-7.7,8.3-7.2,21.2 1.1,28.9 8.2,7.6 21.1,7.2 28.8-1.1z"/>
                    <path d="M480.6,341.2c-11.3,0-20.4,9.1-20.4,20.4V460H51.8v-98.4c0-11.3-9.1-20.4-20.4-20.4S11,350.4,11,361.6v118.8    c0,11.3,9.1,20.4,20.4,20.4h449.2c11.3,0,20.4-9.1,20.4-20.4V361.6C501,350.4,491.9,341.2,480.6,341.2z"/>
                </g>
            </svg>
        </div>
        <span>{{ fileText }}</span>
    </label>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        emits: ['update:modelValue'],
        props: [
            'modelValue',
            'data',
            'conditions'
        ],
        data () {
            return {
                fileText: this.data.label ?? '',
            }
        },
        methods: {
            focus () {
                this.$refs.input.focus()
            },
            fileSelected: function (e) {
                if (e.target.files && e.target.files.length) {
                    this.fileText = e.target.files[0].name
                    this.$emit('update:modelValue', e.target.files[0])
                }
            },
        },
    })
</script>