<template>
  <div class="product-tabs">
    <div class="tab-nav">
      <button
        v-for="tab in tabs"
        :key="tab.id"
        :class="{ active: activeTab === tab.id }"
        @click="activeTab = tab.id"
      >
        {{ tab.label }}
      </button>
    </div>

    <div class="tab-content">
      <div v-if="activeTab === 'description'">
        <p
          v-for="(p, idx) in formattedDescription"
          :key="idx"
          class="content-paragraph"
        >
          {{ p }}
        </p>
      </div>

      <div v-else-if="activeTab === 'additional'">
        <table class="additional-info-table">
          <tbody>
            <tr v-for="(v, k) in product.additionalInfo" :key="k">
              <td class="attribute-name">{{ formatAttributeName(k) }}</td>
              <td class="attribute-value">{{ v }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div v-else-if="activeTab === 'reviews'">
        <div class="no-reviews">No reviews yet.</div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref, computed } from 'vue';

interface Product {
  descriptionLong?: string;
  additionalInfo: Record<string, string | number>;
}

const props = defineProps<{
  product: Product;
}>();

const activeTab = ref<'description' | 'additional' | 'reviews'>('description');

const tabs = [
  { id: 'description', label: 'Description' },
  { id: 'additional', label: 'Additional Information' },
  { id: 'reviews', label: 'Customer Reviews' }
] as const;

const formattedDescription = computed(() => {
  if (!props.product.descriptionLong) return ['No description available.'];
  return props.product.descriptionLong.split('\n\n').filter(Boolean);
});

const formatAttributeName = (key: string | number) =>
  String(key).replace(/([A-Z])/g, ' $1').replace(/^./, s => s.toUpperCase());
</script>

<style scoped>
.product-tabs {
  margin-top: 28px;
}

.tab-nav {
  display: flex;
  gap: 12px;
  border-bottom: 1px solid #eee;
  padding-bottom: 8px;
}

.tab-nav button {
  background: none;
  border: none;
  padding: 10px 14px;
  cursor: pointer;
  color: #666;
  font-weight: 500;
}

.tab-nav button.active {
  color: var(--accent);
  border-bottom: 2px solid var(--accent);
}

.tab-content {
  margin-top: 16px;
  min-height: 120px;
}

.content-paragraph {
  margin: 0 0 12px 0;
  color: #444;
  line-height: 1.6;
}

.additional-info-table td {
  padding: 10px 0;
  border-bottom: 1px solid #f6f6f6;
}

.attribute-name {
  width: 30%;
  font-weight: 600;
  color: #2c3e50;
}

.attribute-value {
  color: #555;
}

.no-reviews {
  color: #888;
  font-style: italic;
}
</style>
