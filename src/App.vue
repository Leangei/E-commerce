<template>
  <div id="app">
        <HeaderCom />
    <router-view />
  </div>
</template>

<script lang="ts">
import HeaderCom from './components/HeaderCom.vue';

export default {
  name: 'App',
  components: {
    HeaderCom
  }
};
</script>

<style>
#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
</style>
