<!-- src/components/ProductDetail/ProductActions.vue -->
<template>
  <div class="product-actions">
    <div class="quantity-selector">
      <button @click="decrement">-</button>
      <input type="number" v-model.number="quantity" min="1" max="99" />
      <button @click="increment">+</button>
    </div>

    <button class="add-to-cart" @click="onAddToCart">
      🛒 Add To Cart ({{ quantity }})
    </button>

   <button class="wishlist" title="Wishlist">
  <img src="/icons/heart.png" alt="Wishlist" />
</button>

<button class="compare" title="Compare">
  <img src="/icons/arrow.png" alt="Compare" />
</button>

  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';

const quantity = ref(1);
const emit = defineEmits<{
  (e: 'add-to-cart', qty: number): void;
}>();

const increment = () => { if (quantity.value < 99) quantity.value++; };
const decrement = () => { if (quantity.value > 1) quantity.value--; };

const onAddToCart = () => {
  emit('add-to-cart', quantity.value);
};
</script>

<style scoped>
.product-actions {
   display:flex;
   align-items:center;
   gap:12px;
   margin-top:16px;
   flex-wrap:wrap;}
.quantity-selector {
  display:flex;
  gap:6px;
  align-items:center;
  border:1px solid #eee;
  padding:4px;
  border-radius:8px; }
.quantity-selector button {
  width:32px;
  height:32px;
  border:none;
  background:#f5f5f5;
  cursor:pointer;
  border-radius:6px; }
.quantity-selector input {
  width:56px;
  text-align:center;
  border:none;
  outline:none;
  padding:6px;
  border-radius:6px;}
.add-to-cart {
  background:var(--accent);
  background-color: green;
  color:white;
  border:none;
  padding:10px 14px;
  border-radius:8px;
  cursor:pointer;
  font-weight:600;}
.wishlist, .compare {
  background:#f9f9f9;
  border:1px solid #eee;
  width:38px; height:38px;
  border-radius:8px;
  cursor:pointer;}
</style>
