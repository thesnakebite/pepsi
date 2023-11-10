<template>
  <div class="form__tabs">
    <ul class="tabs__tablist">
      <li
      v-for="(tab, index) in tabs"
      :key="'tab-'+index"
      :class="{ 'is-active': tab.isActive }"
      class="tabs__tab"
      >
        <a href="#" @click.prevent="selectTab(tab)">{{ tab.name }}</a>
      </li>
    </ul>
    <div class="tabs__content">
        <slot></slot>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'A17Tab',
    data () {
      return {
        tabs: []
      }
    },
    created () {
      this.tabs = this.$children
    },
    methods: {
      selectTab (selectedTab) {
        this.tabs.forEach(tab => {
          tab.isActive = (tab.name === selectedTab.name)
        })
      }
    }
  }
</script>

<style lang="scss" scoped>
  .form__tabs {
    margin-top: 20px;
    margin-bottom: 50px;
  }
  .tabs__tablist {
    list-style: none;
    display: flex;
    padding-left: 0;
    border-bottom: 1px solid #e2e2e2;
  }

  .tabs__tab {
    padding: 5px 10px;
    cursor: pointer;
    user-select: none;
    border: 1px solid transparent;
    border-bottom-color: #e2e2e2;
    border-radius: 3px 3px 0 0;
    background-color: white;
    position: relative;
    bottom: -1px;
    &.is-active {
      border-color: #e2e2e2;
      border-bottom-color: transparent;
    }
    a {
      text-decoration: none;
    }
  }
  .tabs__content {
    padding: 0px;
  }

  .fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
