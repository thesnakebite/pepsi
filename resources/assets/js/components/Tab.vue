<template>
    <div class="tabs__tabpanel" v-show="isActive">
      <slot></slot>
    </div>
</template>

<script>
  export default {
    name: 'A17Tab',
    props: {
      name: {
        required: true
      },
      selected: {
        default: false
      }
    },
    data () {
      return {
        isActive: false
      }
    },
    computed: {
      href () {
        return '#' + this.name.toLowerCase().replace(/ /g, '-')
      }
    },
    methods: {
      test () {}
    },
    mounted () {
      this.isActive = this.selected
    }
  }
</script>
