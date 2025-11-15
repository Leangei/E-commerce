<template>
  <div id="app">
    <h2></h2>

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

    <h2></h2>

    <div class="promo-list">
      <PromotionCom
        v-for="(promo, index) in promotions"
        :key="index"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :buttonLabel="promo.buttonText"
        :buttonColor="promo.buttonColor"
        :backgroundColor="promo.color"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import CategoryCom from './components/CategoryCom.vue'
import PromotionCom from './components/PromotionCom.vue'
import { useProductStore } from './stores/productStore'
// STORE
const productStore = useProductStore()

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
    console.log('Categories API Response:', response.data)
    categories.value = response.data
  } catch (error) {
    console.error('Error fetching categories:', error)
  }
}

const fetchPromotions = async () => {
  try {
    const response = await axios.get<Promotion[]>(`${API_BASE_URL}/api/promotions`)
    console.log('Promotions API Response:', response.data)
    promotions.value = response.data
  } catch (error) {
    console.error('Error fetching promotions:', error)
  }
}

onMounted(() => {
  fetchCategories()
  fetchPromotions()
})
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
  margin-bottom: 40px;
}

.promo-list {
  display: flex;
  gap: 15px;
  margin-top: 40px;
}
</style>
