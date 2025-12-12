<template>
  <div class="logo-section">
    <img src="/forNav/logo.png" alt="logo" class="logo" />

    <div class="brand">
      <div class="title">Melon</div>
      <div class="subtitle">Mart & Grocery</div>
    </div>
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Montserrat:wght@400&display=swap');

.logo-section {
  display: flex;
  align-items: center;
  margin-right: 130px;
}

.logo {
  width: 60px;
  height: 50.93px;
  margin-right: 12px;
}

.brand .title {
  font-family: 'Quicksand', sans-serif;
  font-size: 36px;
  font-weight: 700;
  color: #3BB77E;
  line-height: 1;
}

.subtitle {
  font-family: 'Montserrat', sans-serif;
  font-size: 12px;
  color: black;
  line-height: 1.25;
  margin-top: -4px;
  margin-left: 3px;
}
</style>
