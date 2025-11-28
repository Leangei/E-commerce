<template>


  <div id="app">
      <section >
      <div class="featured">
      <MenuCom title="Featured Categories"/>
      </div>
      <div class="category-list">
      <CategoryCom
        v-for="(cat, index) in categories"
        :key="index"
        :image="getImageUrl(cat.image)"
        :name="cat.name"
        :productCount="cat.productCount"
        :color="cat.color"
      />
      </div>
    </section>
    <div></div>
    <section class="promo-list">
      <PromotionCom
        v-for="(promo, index) in promotions"
        :key="index"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :buttonLabel="promo.buttonText"
        :buttonColor="promo.buttonColor"
        :backgroundColor="promo.color"
      />
    </section>

    <div></div>
    <div class="featured">
      <MenuCom title="Popular Products"/>
    </div>

     <section class="groups">
      <div
        class="group-card"
        v-for="grp in productStore.groups"
        :key="grp.id"
      >
        <h3>{{ grp.name }}</h3>
      </div>
    </section>

    <!-- 6. PRODUCT GRID (uses ProductCard.vue) -->
    <section class="products">
      <ProductCard
        v-for="prod in productStore.products"
        :key="prod.id"
        :product="prod"
      />
    </section>


  </div>
</template>

<script lang="ts" setup>

import CategoryCom from './components/CategoryCom.vue'
import PromotionCom from './components/PromotionCom.vue'
import MenuCom from './components/MenuCom.vue'
import ProductCard from './components/ProductCom.vue'

// Import product store (corrected)
import { useProductStore } from './stores/productStore'
import { ref, onMounted } from 'vue'
import axios from 'axios'

const productStore = useProductStore()
const categories = ref<Category[]>([])
const promotions = ref<Promotion[]>([])

const API_BASE_URL = 'http://localhost:3000'

const getImageUrl = (imagePath: string | undefined) => {
  if (!imagePath) {
    return 'https://via.placeholder.com/300x200?text=No+Image'
  }
  if (imagePath.startsWith('http')) {
    return imagePath
  }
  return `${API_BASE_URL}${imagePath.startsWith('/') ? '' : '/'}${imagePath}`
}

const fetchCategories = async () => {
  try {
    const response = await axios.get<Category[]>(`${API_BASE_URL}/api/categories`)
    categories.value = response.data
  } catch (error) {
    console.error('Error fetching categories:', error)
  }
}

const fetchPromotions = async () => {
  try {
    const response = await axios.get<Promotion[]>(`${API_BASE_URL}/api/promotions`)
    promotions.value = response.data
  } catch (error) {
    console.error('Error fetching promotions:', error)
  }
}

onMounted(() => {
  fetchCategories()
  fetchPromotions()
  productStore.loadAllData()
})
interface Category {
  id?: number
  name: string
  url?: string
  productCount: number
  color?: string
  image: string
}

interface Promotion {
  id?: number
  title: string
  color?: string
  image: string
  url?: string
  buttonText: string
  buttonColor: string
}


</script>

<style>
#app {
  padding: 20px;
  font-family: Arial, sans-serif;
  margin-bottom: 10px;
}

h2 {
  margin-bottom: 10px;
  color: #333;
}

.category-list {
  display: flex;
  gap: 15px;
  margin-top: px;
  margin-bottom: 20px;
}

.promo-list {
  display: flex;
  gap: 15px;
  margin-top: 20px;
  margin-bottom: 20px;
}
.featured {
  display: flex;
  margin-top: 20px;
  margin-bottom: 20px;


}
.products {
  display: flexbox;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 20px;
  margin-bottom: 40px;
}


</style>



