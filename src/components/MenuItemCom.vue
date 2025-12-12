<template>
  <nav class="nav-bar">
    <button class="category-btn">Browse All Categories</button>

    <span class="nav-item">Hot Deals</span>
    <span class="nav-item">Home</span>
    <span class="nav-item">Food</span>
    <span class="nav-item">Vegetables</span>
    <span class="nav-item">Drink</span>
    <span class="nav-item">Cookies</span>
    <span class="nav-item">Meat & Seafood</span>
    <span class="nav-item">Bakery</span>

    <span class="phone-number">099 777 888</span>
  </nav>
</template>

<script lang="ts" setup></script>

<style scoped>
/* Wrapper Navigation Bar */
.nav-bar {
  display: flex;
  align-items: center;
  gap: 20px;
  padding: 16px 40px;
  border-bottom: 1px solid #ddd;
  color: #555;
  font-size: 16px;
}

/* Browse Categories Button */
.category-btn {
  background-color: #28a745;
  color: white;
  padding: 8px 16px;
  border-radius: 6px;
  border: none;
  cursor: pointer;
  font-size: 15px;
}

.category-btn:hover {
  background-color: #1f8739;
}

/* Navigation Items */
.nav-item {
  cursor: pointer;
}

.nav-item:hover {
  color: #28a745;
}

/* Phone number aligned to the right */
.phone-number {
  margin-left: auto;
  color: #28a745;
  font-weight: bold;
}
</style>
