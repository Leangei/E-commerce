<template>
  <nav class="main-nav">
    <button class="browse-btn">
      <img src="/icons/browser.png" class="icon" />
      Browse All Categories ▾
    </button>

    <ul class="menu">
      <router-link :to="{ path: '/contact' }" class="banner-link">
        <li>🔥 Hot Detail</li>
      </router-link>

      <li>Home</li>
      <li>Food ▾</li>
      <li>Vegetables ▾</li>
      <li>Drink</li>
      <li>Cookies</li>
      <li>Meat & Seafood ▾</li>
      <li>Bakery</li>

      <div class="phone">
        ☎ 099 777 888
        <small>24/7 Support Center</small>
      </div>
    </ul>
  </nav>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap');

.main-nav {
  width: 100%;
  display: flex;
  align-items: center;
  margin-top: 15px;
}

.browse-btn {
  background: #3cab62;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 5px;
  margin-right: 50px;
  font-family: "Quicksand", sans-serif;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
  cursor: pointer;
}

.browse-btn .icon {
  width: 16px;
  height: 16px;
  object-fit: contain;
}

.menu {
  display: flex;
  list-style: none;
  gap: 20px;
  align-items: center;
}

.menu li {
  cursor: pointer;
  font-family: "Quicksand", sans-serif;
  font-size: 14px;
  font-weight: 600;
}


.phone {
  margin-left: 100px;
  display: flex;
  flex-direction: column;
  font-weight: bold;
  color: #3cab62;
  font-family: "Quicksand", sans-serif;
}

.phone small {
  font-size: 10px;
  color: gray;
}
</style>
