<template>
  <div class="actions">
    <div class="item">
      <img src="/icons/account.png" class="icon" />
      <span class="label">Account</span>
    </div>

    <div class="item">
      <img src="/icons/compare.png" class="icon" />
      <span class="label">Compare</span>
    </div>

    <div class="item">
      <img src="/icons/wishlist.png" class="icon" />
      <span class="label">Wishlist</span>
    </div>

    <div class="item">
      <img src="/icons/cart.png" class="icon" />
      <span class="label">Cart</span>
    </div>

  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap');

.actions {
  display: flex;
  align-items: center;
  gap: 20px;
}

.item {
  display: flex;
  align-items: center;
  gap: 6px;
}


.icon {
  width: 18px;
  height: 18px;
  object-fit: contain;
  filter: brightness(0) saturate(100%) invert(45%) sepia(5%) saturate(0%) hue-rotate(180deg) brightness(95%) contrast(85%);

}


.label {
  font-family: "Lato", sans-serif;
  font-size: 14px;
  color: #7E7E7E;
}


.phone {
  margin-left: 20px;
  display: flex;
  flex-direction: column;
  font-weight: bold;
  color: #3cab62;
  font-family: "Lato", sans-serif;
}


</style>
