<script setup lang="ts">
  defineEmits<{
    (event: 'click'): void;
  }>();

  const props = withDefaults(
    defineProps<{
      type?: '' | 'icon';
      color?: '' | 'danger';
      as?: 'a' | 'button';
    }>(),
    {
      type: '',
      color: '',
      as: 'a',
    }
  );
</script>

<template>
  <component :is="as" data-testid="button" v-bind="$attrs" :class="`button ${type} ${color}`" @click="$emit('click')">
    <slot />
  </component>
</template>

<style scoped lang="scss">
  .button {
    @apply inline-block
    cursor-pointer
    rounded
    bg-purple-500
    px-6
    pb-2
    pt-2.5
    text-xs
    font-medium
    uppercase
    leading-normal
    text-white
    shadow-lg
    transition
    duration-150
    ease-in-out
    hover:bg-purple-600
    hover:shadow-purple-600
    focus:outline-none
    focus:ring-0
    active:scale-95
    active:bg-purple-700;

    &.icon {
      @apply rounded-full p-2;
    }

    &.danger {
      @apply bg-red-500
      hover:bg-red-600
      hover:shadow-red-600
      active:bg-red-700;
    }
  }
</style>
