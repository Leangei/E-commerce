<template>
  <router-link :to="`/categories/${categoryId}`" class="category-item-link">
    <div class="category-item" :style="{ backgroundColor: color }">
      <img :src="image" :alt="name" class="category-image" />
      <h4>{{ name }}</h4>
      <p>{{ productCount }} items</p>
    </div>
  </router-link>
</template>

<script lang="ts">
export default {
  name: 'CategoryCom',
  props: {
    categoryId: {
      type: [String, Number],
      required: true,
    },
    image: String,
    name: String,
    productCount: Number,
    color: {
      type: String,
      default: '#f2fce4',
    },
  },
}
</script>

<style scoped>
/* Make the whole card clickable */
.category-item-link {
  display: block;
  text-decoration: none;
  color: inherit;
}

/* CATEGORY CARD */
.category-item {
  width: 136px;
  height: 177px;
  text-align: center;
  padding: 5px;

  border: 1px solid green;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
}

.category-item:hover {
  transform: translateY(-3px);
}

/* IMAGE */
.category-image {
  width: 100px;
  height: 100px;
  object-fit: cover;
  margin-bottom: 5px;
}

/* TITLE */
.category-item h4 {
  margin: 5px 0 3px 0;
  font-size: 16px;
  font-family: Georgia, 'Times New Roman', Times, serif;
  font-weight: bold;
}

/* PRODUCT COUNT */
.category-item p {
  margin: 0;
  color: #666;
  font-size: 12px;
  font-family:
    'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana,
    sans-serif;
}
</style>
