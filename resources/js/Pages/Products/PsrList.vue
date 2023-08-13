<script setup lang="ts">
  import { computed, ref } from 'vue';
  import PsrTable from '../../Components/Tables/PsrProductTable.vue';
  import PsrHeader from '../../Components/PsrHeader.vue';
  import PsrInput from '../../Components/PsrInput.vue';

  const props = defineProps<{
    products: Product[];
  }>();

  const filter = ref('');

  const products = computed(() => {
    return props.products.filter((p) => p.name.indexOf(filter.value) !== -1);
  });
</script>

<template>
  <PsrHeader />


  <div class="container mt-8 pb-32">
    <div v-if="$page.props.flash.success" class="p-4 bg-green-200 text-green-900">{{ $page.props.flash.success }}</div>
    <div v-if="$page.props.flash.failed" class="p-4 bg-red-200 text-red-900">{{ $page.props.flash.failed }}</div>

    <div class="flex w-full flex-col mt-8">
      <PsrInput v-model="filter" type="search" placeholder="Filtrar Produtos" />

      <PsrTable :items="products" />
    </div>
  </div>
</template>

<style></style>
