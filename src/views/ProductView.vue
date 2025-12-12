<template>
  <div class="product-detail-page">
    <div class="breadcrumb">
      Home > Vegetables & tubers > {{ product.name }}
    </div>

    <div class="product-layout">
      <ProductImageGallery :images="product.images" />
      <div class="info-section">
        <ProductInfo :product="product" />
        <ProductActions @add-to-cart="handleAddToCart" />
      </div>
    </div>

    <ProductTabs :product="product" />
  </div>
</template>

<script lang="ts" setup>
import ProductImageGallery from '@/components/ProductDetail/ProductImageGallery.vue';
import ProductInfo from '@/components/ProductDetail/ProductInfo.vue';
import ProductActions from '@/components/ProductDetail/ProductActions.vue';
import ProductTabs from '@/components/ProductDetail/ProductTabs.vue';

const product = {
  name: 'Seeds of Change Organic',
  rating: 4.5,
  price: 38,
  originalPrice: 42,
  description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!',
  descriptionLong: 'Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.\n\nSpluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because.',
  vendor: "NestMart",
  sku: 'FWM15VKT',
  images: [
    '/asset/mango.png',
    '/asset/orange.png',
    '/asset/banana.png',
    '/asset/apple.png'
  ],
  inStock: true,
  additionalInfo: {
    weight: '500g',
    brand: 'Seeds of Change',
    origin: 'Peru',
    shelfLife: '12 months',
    packaging: 'Recyclable bag',
    certifications: 'USDA Organic, Non-GMO Project Verified'
  }
};

const handleAddToCart = (qty: number) => {
  alert(`Added ${qty} item(s) of "${product.name}" to cart (static demo).`);
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap');

.product-detail-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  font-family: 'Quicksand', sans-serif;
}

.breadcrumb {
  margin-bottom: 15px;
  font-size: 14px;
  color: #666;
}

.product-layout {
  display: flex;
  gap: 30px;
  margin-bottom: 40px;
  align-items: flex-start;
}

.info-section {
  flex: 1;
  min-width: 300px;
}


</style>
