<template>
  <div class="product-card">
    <!-- BADGE -->
    <div v-if="badgeText" class="badge" :class="badgeColor">
      {{ badgeText }}
    </div>

    <!-- IMAGE -->
    <img :src="image" class="product-img" />

    <div class="info">
      <p class="brand">{{ product.group }}</p>
      <h3 class="title">{{ product.name }}</h3>

      <!-- RATING -->
      <div class="rating">
        <i
          v-for="n in 5"
          :key="n"
          :class="['star', n <= product.rating ? 'filled' : 'empty']"
        ></i>
        <span class="rating-number">{{ product.rating }}</span>
      </div>

      <p class="size">{{ product.size }}</p>

      <div class="price-row">
        <span class="new-price">${{ product.price }}</span>

        <span v-if="finalOldPrice" class="old-price">
          ${{ finalOldPrice }}
        </span>

        <button class="btn-add" v-if="qty === 0" @click="increase">
          Add +
        </button>

        <button class="btn-add" v-else>
          <div class="qty-inline">
            <span class="qty-icon" @click.stop="decrease">▾</span>
            <span class="qty-value">{{ qty }}</span>
            <span class="qty-icon" @click.stop="increase">▴</span>
          </div>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";

interface Product {
  id: number;
  name: string;
  group: string;
  price: number;
  size: string;
  rating: number;
  image: string;
  countSold: number;
  promotionAsPercentage?: number;
  oldPrice?: number;
}

const props = defineProps<{ product: Product }>();

const API_BASE_URL = "http://localhost:3000";

function normalizeImagePath(img: string | null) {
  if (!img) return null;
  try {
    const arr = JSON.parse(img);
    return arr[0].replace(/\\/g, "/");
  } catch {
    return img.replace(/\\/g, "/");
  }
}

const image = computed(() => {
  const clean = normalizeImagePath(props.product.image);
  if (!clean) return "https://via.placeholder.com/201x145?text=No+Image";
  if (clean.startsWith("http")) return clean;
  return `${API_BASE_URL}/${clean}`;
});

const isHot = computed(() =>
  props.product.countSold > 10 || props.product.rating >= 5
);

const isSale = computed(() =>
  props.product.countSold === 0 ||
  (!!props.product.promotionAsPercentage && props.product.promotionAsPercentage > 0)
);

const badgeText = computed(() => {
  const promo = Number(props.product.promotionAsPercentage);

  if (promo > 0) {
    return `-${promo}%`;  // show promotion only when > 0
  }

  if (isHot.value) return "Hot";
  if (isSale.value) return "Sale";
  return null;
});



const badgeColor = computed(() => {
  const promo = Number(props.product.promotionAsPercentage);

  if (promo > 0) return "green"; // promotion
  if (isHot.value) return "red"; // hot
  if (isSale.value) return "yellow"; // sale
  return "";
});


const finalOldPrice = computed(() => {
  if (props.product.oldPrice !== undefined && props.product.oldPrice !== null) {
    return props.product.oldPrice;
  }
  const price = props.product.price;
  return (price * 1.116).toFixed(2);
});

const qty = ref(0);
const increase = () => qty.value++;
const decrease = () => { if (qty.value > 0) qty.value--; };
</script>

<style scoped>
.product-card {
  width: 298px;
  height: 402px;
  background-color: #ffffff;
  border: 1px solid #BCE3C9;
  border-radius: 10px;
  padding: 10px;
  position: relative;
  box-sizing: border-box;

}

/* BADGE */
.badge {
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 4px 8px;
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  border-radius: 4px;
}
.badge.green { background-color: green; }
.badge.red { background-color: red; }
.badge.yellow { background-color: yellow; }

/* IMAGE */
.product-img {
  width: 230px;
  height: auto;
  position: absolute;
  top: 50px;
  left: 37.11px;
  object-fit: cover;
  border-radius: 8px;
}

/* INFO */
.info {
  position: absolute;
  top: 220px;
  left: 10px;
  right: 10px;
  bottom: 10px;
  display: flex;
  flex-direction: column;
}

/* FONT STYLING */
.brand {
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  margin: 0;
}

.title {
  font-family: 'Quicksand', sans-serif;
  font-size: 12px;
  font-weight: bold;
  margin: 2px 0 5px 0;
}

/* RATING */
.rating {
  display: flex;
  align-items: center;
  gap: 2px;
  font-size: 14px;
}

.rating-number {
  margin-left: 4px;
}

/* STAR ICONS */
.star {
  display: inline-block;
  width: 14px;
  height: 14px;
  background-size: contain;
  background-repeat: no-repeat;
}

.star.filled {
  background-image: url('data:image/svg+xml;utf8,<svg fill="gold" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568L24 9.423l-6 5.84L19.335 24 12 20.201 4.665 24 6 15.263 0 9.423l8.332-1.268z"/></svg>');
}

.star.empty {
  background-image: url('data:image/svg+xml;utf8,<svg fill="lightgray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568L24 9.423l-6 5.84L19.335 24 12 20.201 4.665 24 6 15.263 0 9.423l8.332-1.268z"/></svg>');
}

/* SIZE */
.size {
  font-size: 12px;
  margin: 5px 0;
}

/* PRICE + QTY */
.price-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: auto;
}

.new-price {
  font-weight: bold;
  font-size: 14px;
}

.old-price {
  text-decoration: line-through;
  font-size: 12px;
  color: #999;
}

.btn-add {
  background-color: #BCE3C9;
  border: none;
  padding: 4px 8px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 12px;
}

.qty-inline {
  display: flex;
  align-items: center;
  gap: 4px;
}

.qty-icon {
  cursor: pointer;
  font-size: 12px;
}

.qty-value {
  font-size: 12px;
}
</style>
