<script setup lang="ts">
  defineEmits<{
    (event: 'update:modelValue');
  }>();

  defineProps<{
    modelValue: string;
  }>();
</script>

<template>
  <input
    type="text"
    data-testid="input"
    aria-label="Filtra produtos com base no nome"
    :value="modelValue"
    @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
  />
</template>

<style scoped>
  input {
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
