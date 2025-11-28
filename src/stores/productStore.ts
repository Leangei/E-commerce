// src/stores/productStore.ts
import { defineStore } from "pinia";
import axios from "axios";

// Define types
interface Group {
  id: number;
  name: string;
}

interface Category {
  id: number;
  name: string;
  group: string; // must match the group's name
}

interface Promotion {
  id: number;
  title: string;
}

export interface Product {
  id: number;
  name: string;
  brand: string;
  price: number;
  image: string;
  group: string;
  categoryId: number;
  countSold: number;

  size?: string;   // optional
  rating?: number; // optional
  promotionAsPercentage?: number;
  oldPrice?: number;
}



export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [] as Group[],
    promotions: [] as Promotion[],
    categories: [] as Category[],
    products: [] as Product[]
  }),

  getters: {
    getCategoriesByGroup: (state) => (groupName: string) =>
      state.categories.filter((category) => category.group === groupName),

    getProductsByGroup: (state) => (groupName: string) =>
      state.products.filter((product) => product.group === groupName),

    getProductsByCategory: (state) => (categoryId: number) =>
      state.products.filter((product) => product.categoryId === categoryId),

    getPopularProducts: (state) =>
      state.products.filter((product) => product.countSold > 10)
  },

  actions: {
    async loadAllData() {
      try {
        const base = "http://localhost:3000/api";
        const [catRes, promoRes, groupRes, prodRes] = await Promise.all([
          axios.get<Category[]>(`${base}/categories`),
          axios.get<Promotion[]>(`${base}/promotions`),
          axios.get<Group[]>(`${base}/groups`),
          axios.get<Product[]>(`${base}/products`)
        ]);

        this.categories = catRes.data;
        this.promotions = promoRes.data;
        this.groups = groupRes.data;
        this.products = prodRes.data;
      } catch (err) {
        console.error("Failed loading API:", err);
      }
    }
  }
});
