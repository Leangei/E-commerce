<template>
  <div class="search-container">
    <select class="category-select">
      <option>All Categories</option>
    </select>

    <input type="text" placeholder="Search for items" class="search-input" />

    <button class="search-btn">🔍</button>
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap');


.search-container {
  display: flex;
  border: 2px solid #BCE3C9;
  border-radius: 8px;
  overflow: hidden;
  background: white;
  height: 48px;
  width: 500px;
  margin-right: 100px;
}


.category-select {
  padding: 0 12px;
  border: 0;
  background: #f6f6f6;
  font-family: "Quicksand", sans-serif;
  font-size: 14px;
  font-weight: 700;
  color: #000;
  outline: none;
  border-right: 1px solid #BCE3C9;
}


.search-input {
  flex: 1;
  padding: 0 12px;
  border: 0;
  outline: none;
  font-size: 16px;
}


.search-input::placeholder {
  font-size: 14px;
  color: #999;
}


.search-btn {
  padding: 0 5px;
  background: white;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 14px;
}
</style>
