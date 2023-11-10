<template>
    <RadioGroup v-model="selected">
        <div class="grid grid-cols-2 gap-2">
            <RadioGroupOption as="template" v-for="option in data.options" :key="option.value" :value="option.value" v-slot="{ active, checked }">
                <div :style="[checked ? 'background-color: #ffffff;' : 'background-color: #e36386;', 'border: 1px solid #e36386;']" class="relative flex cursor-pointer px-4 py-4 focus:outline-none">
                    <div class="flex w-full items-center justify-between">
                        <div class="flex items-center">
                            <div class="text-sm">
                                <RadioGroupLabel as="p" :style="checked ? 'color: #e36386;' : 'color: #ffffff;'" class="font-medium">
                                    {{ option.label }}
                                </RadioGroupLabel>
                            </div>
                        </div>
                        <div class="shrink-0">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="12" fill="#e36386" fill-opacity="0.2" />
                                <path d="M7 13l3 3 7-7" stroke="#e36386" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </RadioGroupOption>
        </div>
    </RadioGroup>
    <input 
        ref="input"
        class="w-full px-4 py-2 mt-2 focus:outline-none"
        style="border: 1px solid #e36386; background-color: #e36386; color: #ffffff; font-family: 'CustomParagraphFont'; font-size: 14px !important;"
        type="text"
        placeholder="O cuéntanoslo aquí..."
        @input="updateFreeInput" />
    <input type="hidden" :value="modelValue" />
</template>

<style scoped>
    input::-webkit-input-placeholder { color: #fff !important; }
    input:-moz-placeholder { color: #fff !important; }
    input::-moz-placeholder { color: #fff !important; }
    input:-ms-input-placeholder { color: #fff !important; }
</style>

<script setup>
    import { onMounted, ref, watch } from 'vue'
    import { RadioGroup, RadioGroupLabel, RadioGroupDescription, RadioGroupOption } from '@headlessui/vue'

    const props = defineProps({
        data: Object,
        modelValue: String
    })

    const emit = defineEmits(['update:modelValue'])

    defineExpose({ focus: () => input.value.focus() })

    const input = ref(null)
    const selected = ref(null)

    onMounted(() => {
        if (input.value.hasAttribute('autofocus')) {
            input.value.focus()
        }
    })

    watch(selected, (newSelectedRadio, oldSelectedRadio) => {
        if (newSelectedRadio) {
            emit('update:modelValue', newSelectedRadio)
            input.value.value = ''
        }
    })

    const updateFreeInput = (event) => {
        emit('update:modelValue', event.target.value)
        selected.value = null
    }
</script>
