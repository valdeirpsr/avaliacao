<script setup lang="ts">
  defineEmits<{
    (event: 'update:modelValue');
  }>();

  defineProps<{
    modelValue: string;
    items: SelectManufacturer[];
  }>();
</script>

<template>
  <select
    data-testid="select"
    aria-label="Filtra produtos com base no nome"
    @change="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
  >
    <option v-for="option in items" :key="`option-${option.value}`" :value="option.value" :selected="option.value === modelValue">
      {{ option.text ?? option.value }}
    </option>
  </select>
</template>

<style scoped>
  select {
    @apply w-full rounded
    border
    border-neutral-300
    px-3
    py-[0.25rem]
    text-base
    font-normal
    leading-[1.6]
    text-neutral-900
    outline-none
    transition
    duration-200
    ease-in-out
    focus:border-gray-400
    focus:shadow-lg
    focus:outline-none;
  }
</style>
