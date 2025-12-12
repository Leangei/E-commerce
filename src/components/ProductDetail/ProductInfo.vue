<template>
  <div class="product-info">
    <span :class="['status-badge', product.inStock ? 'in' : 'out']">
      {{ product.inStock ? 'In Stock' : 'Out of Stock' }}
    </span>

    <h1 class="title">{{ product.name }}</h1>

    <div class="rating">
      <span v-for="i in 5" :key="i" :class="{ filled: i <= Math.round(product.rating) }">★</span>
      <span class="rating-text">({{ product.rating }}/5)</span>
    </div>

    <div class="price-section">
      <span class="current-price">${{ product.price }}</span>
      <span v-if="product.originalPrice" class="old-price">${{ product.originalPrice }}</span>

    </div>

    <p class="description">{{ product.description }}</p>

    <div class="vendor-info">
  <p>
    <strong class="label">Vendor:</strong>
    <span class="value">{{ product.vendor }}</span>
  </p>
  <p>
    <strong class="label">SKU:</strong>
    <span class="value">{{ product.sku }}</span>
  </p>
</div>

  </div>
</template>

<script lang="ts" setup>
import { computed } from 'vue';

interface Product {
  name: string;
  price: number;
  originalPrice?: number;
  description: string;
  descriptionLong:string,
  rating: number;
  inStock: boolean;
  vendor: string;
  sku: string;
}

const props = defineProps<{
  product: Product
}>();

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap');

.product-info {
  margin-left: 0;
  color: #2c3e50;
  font-family: 'Quicksand', sans-serif;
}

.status-badge {
  font-size: 12px;
  padding: 5px 10px;
  border-radius: 6px;
  display: inline-block;
  margin-bottom: 10px;
}

.status-badge.in {
  background: #d4f7e8;
  color: var(--accent);
}

.status-badge.out {
  background: #ffeef0;
  color: #d9534f;
}

.title {
  font-size: 36px;
  margin: 6px 0;
  font-weight: 700;
}

.rating {
  display: flex;
  align-items: center;
  gap: 6px;
  color: #ffcc00;
}

.rating .filled {
  color: #ffcc00;
}

.rating-text {
  color: #666;
  font-size: 14px;
  margin-left: 6px;
}

.price-section {
  display: flex;
  align-items: center;
  gap: 12px;
  margin: 14px 0;
}

.current-price {
  font-size: 28px;
  font-weight: 700;
  color: var(--accent);
}

.old-price {
  text-decoration: line-through;
  color: #999;
}

.discount {
  background: #ff4d4d;
  color: #fff;
  padding: 4px 8px;
  border-radius: 6px;
  font-size: 12px;
}

.description {
  color: #555;
  line-height: 1.6;
}

.vendor-info .label {
  color: #000;
  margin-right: 3px ;
}

.vendor-info .value {
  color: #555;
}

.vendor-info {
  margin-top: 16px;
  font-size: 14px;
}
</style>
