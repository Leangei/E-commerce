<template>
  <div class="image-gallery">
    <div class="main-image">
      <img :src="mainImage" alt="Product" />
      <button class="zoom-icon" @click="openZoom">🔍</button>
    </div>

    <div class="thumbnail-strip">
      <button class="nav-btn left" @click="prevThumb" :disabled="thumbStart === 0">←</button>

      <div class="thumbnails">
        <img
          v-for="(thumb, index) in visibleThumbnails"
          :key="index + thumbStart"
          :src="thumb"
          :alt="`Thumbnail ${index + 1}`"
          :class="{ active: index + thumbStart === currentThumb }"
          @click="selectThumb(index + thumbStart)"
        />
      </div>

      <button class="nav-btn right" @click="nextThumb" :disabled="thumbStart + visibleCount >= images.length">→</button>
    </div>

    <div v-if="zoomOpen" class="zoom-overlay" @click="zoomOpen = false">
      <img :src="mainImage" class="zoom-image" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref, computed, watch } from 'vue';

const props = defineProps<{ images: string[] }>();

const currentThumb = ref(0);
const thumbStart = ref(0);
const visibleCount = 4;
const zoomOpen = ref(false);

const mainImage = computed(() => props.images?.[currentThumb.value] || '');
const visibleThumbnails = computed(() => props.images.slice(thumbStart.value, thumbStart.value + visibleCount));

function selectThumb(index: number) {
  currentThumb.value = index;
  if (index < thumbStart.value) thumbStart.value = index;
  if (index >= thumbStart.value + visibleCount) thumbStart.value = index - visibleCount + 1;
}

function prevThumb() {
  if (thumbStart.value > 0) thumbStart.value--;
}

function nextThumb() {
  if (thumbStart.value + visibleCount < props.images.length) thumbStart.value++;
}

function openZoom() {
  zoomOpen.value = true;
}

watch(() => props.images, (newImgs) => {
  if (!newImgs || newImgs.length === 0) {
    currentThumb.value = 0;
    thumbStart.value = 0;
  } else {
    if (currentThumb.value >= newImgs.length) currentThumb.value = 0;
    if (thumbStart.value > currentThumb.value) thumbStart.value = currentThumb.value;
  }
});
</script>

<style scoped>
.image-gallery {
  width: 100%;
  max-width: 520px;
}

.main-image {
  position: relative;
  border: 1px solid #eee;
  padding: 10px;
  border-radius: 8px;
  background: white;
}

.main-image img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 6px;
  object-fit: contain;
}

.zoom-icon {
  position: absolute;
  top: 12px;
  right: 12px;
  background: rgba(255,255,255,0.9);
  border: none;
  border-radius: 50%;
  width: 36px;
  height: 36px;
  cursor: pointer;
}

.thumbnail-strip {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-top: 12px;
}

.nav-btn {
  background: #f0f0f0;
  border: none;
  padding: 6px 10px;
  cursor: pointer;
  border-radius: 6px;
}

.thumbnails {
  display: flex;
  gap: 8px;
  flex-grow: 1;
  overflow: hidden;
}

.thumbnails img {
  width: calc(25% - 6px);
  height: 72px;
  object-fit: cover;
  border-radius: 6px;
  border: 2px solid transparent;
  cursor: pointer;
  transition: transform .12s ease, border-color .12s ease;
}

.thumbnails img:hover {
  transform: scale(1.03);
}

.thumbnails img.active {
  border-color: var(--accent, #ff6600);
  transform: scale(1.06);
}

.zoom-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  display:flex;
  align-items:center;
  justify-content:center;
  z-index:1000;
}

.zoom-image {
  width: 80%;
  max-width: 900px;
  border-radius: 6px;
}
</style>
