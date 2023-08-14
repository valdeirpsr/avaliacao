<script setup lang="ts">
  import PsrButton from './PsrButton.vue';

  defineEmits<{
    (event: 'dismiss'): void;
    (event: 'confirm'): void;
  }>();
</script>

<template>
  <div class="fixed inset-0 z-10 flex place-content-center items-center bg-black bg-opacity-70 backdrop-blur">
    <div class="max-w-[90vw] scale-0 animate-scale-up rounded-lg bg-white p-10">
      <p class="text-2xl font-bold">Atenção!</p>

      <p class="my-8">Esta ação não poderá ser desfeita. Deseja continuar?</p>

      <p class="flex justify-between space-x-2 text-right">
        <PsrButton data-testid="button-no" @click="$emit('dismiss')">Não</PsrButton>
        <PsrButton color="danger" data-testid="button-yes" @click="$emit('confirm')">Sim</PsrButton>
      </p>
    </div>
  </div>
</template>
