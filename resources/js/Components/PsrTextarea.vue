<script setup lang="ts">
  defineEmits<{
    (event: 'update:modelValue');
  }>();

  defineProps<{
    modelValue: string;
  }>();
</script>

<template>
  <textarea
    type="text"
    data-testid="textarea"
    @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
    >{{ modelValue }}</textarea
  >
</template>

<style scoped>
  textarea {
    @apply h-48 w-full
    rounded
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
