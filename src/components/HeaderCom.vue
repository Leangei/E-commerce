<template>
  <header class="header">
    <div class="top-row">
      <LogoSection />
      <SearchSection />
      <UserActions />
    </div>
    <MainNavbar />
  </header>
</template>

<script lang="ts" setup>
import LogoSection from './Header/LogoSection.vue'
import SearchSection from './Header/SearchSection.vue'
import UserActions from './Header/UserActions.vue'
import MainNavbar from './Header/MainNavbar.vue'
</script>

<style scoped>
.header {
  position: relative; /* change to fixed if you want sticky header */
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  padding: 10px 20px;
  background: #ffffff;
  border-bottom: 1px solid #eee;
}
.top-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
</style>
