<script setup lang="ts">
  import { computed, ref } from 'vue';
  import PsrTable from '../../Components/Tables/PsrProductTable.vue';
  import PsrHeader from '../../Components/PsrHeader.vue';
  import PsrInput from '../../Components/PsrInput.vue';

  const props = defineProps<{
    products: Product[];
  }>();

  const cols: ProductCols = [
    { id: 'name', text: 'Nome' },
    { id: 'description', text: 'Descrição' },
    { id: 'voltage', text: 'Tensão' },
    { id: 'manufacturer', text: 'Fabricante' },
  ];

  const filter = ref('');

  const products = computed(() => {
    return props.products.filter((p) => p.name.indexOf(filter.value) !== -1);
  });
</script>

<template>
  <PsrHeader />

  <div class="container mt-8 pb-32">
    <div class="flex w-full flex-col">
      <PsrInput v-model="filter" type="search" />

      <PsrTable :cols="cols" :items="products" />
    </div>
  </div>
</template>

<style></style>
