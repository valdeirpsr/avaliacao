<script setup lang="ts">
  import PsrButton from './PsrButton.vue';

  defineEmits<{
    (event: 'dismiss'): void;
    (event: 'confirm'): void;
  }>();
</script>

<template>
  <div class="fixed inset-0 z-10 flex place-content-center items-center bg-black bg-opacity-70 backdrop-blur">
    <div class="animate-scale-up max-w-[90vw] scale-0 rounded-lg bg-white p-10">
      <p class="text-2xl font-bold">Atenção!</p>

      <p class="my-8">Esta ação não poderá ser desfeita. Deseja continuar?</p>

      <p class="flex justify-between space-x-2 text-right">
        <PsrButton @click="$emit('dismiss')" data-testid="button-no">Não</PsrButton>
        <PsrButton color="danger" @click="$emit('confirm')" data-testid="button-yes">Sim</PsrButton>
      </p>
    </div>
  </div>
</template>
