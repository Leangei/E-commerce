<template>
  <section class="banner-section">
    <h1 class="banner-title">{{ title }}</h1>
    <p class="banner-path">Home › Categories › {{ title }}</p>
  </section>
</template>

<script lang="ts" setup>
defineProps({
  title: String
})
</script>

<style scoped>
.banner-section {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  background-color: #3BB77E33;
  padding: 20px;
  padding-left: 50px;
  border-radius: 8px;
  min-height: 0;
  width: 100%;
}

.banner-title {
  font-family: 'Quicksand', sans-serif;
  font-size: 32px;
  font-weight: bold;
  margin: 0;
  color: black;
}

.banner-path {
  margin-top: 10px;
  font-size: 14px;
  color: black;
  font-family: 'Lato', sans-serif;
}
</style>
