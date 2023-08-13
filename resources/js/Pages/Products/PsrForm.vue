<script setup lang="ts">
  import { useForm } from '@inertiajs/vue3';
  import PsrHeader from '../../Components/PsrHeader.vue';
  import PsrInput from '../../Components/PsrInput.vue';
  import PsrSelect from '../../Components/PsrSelect.vue';
  import PsrTextarea from '../../Components/PsrTextarea.vue';
  import PsrButton from '../../Components/PsrButton.vue';

  const form = useForm({
    name: '',
    voltage: '',
    manufacturer: '',
    description: '',
  });

  const manufactureres: SelectManufacturer[] = [
    { value: '', text: 'Selecione' },
    { value: 'Electrolux' },
    { value: 'Brastemp' },
    { value: 'Fischer' },
    { value: 'Samsung' },
    { value: 'LG' },
  ];

  function submit() {
    form.clearErrors();
    form.post('/new');
  }
</script>

<template>
  <PsrHeader />

  <div class="container mt-8 pb-32">
    <div class="rounded-lg">
      <h1 class="text-2xl font-bold w-full">Criar Produto</h1>

      <div class="mt-8 flex flex-col md:flex-row justify-evenly">
        <div class="space-y-8">
          <div class="w-full space-y-2">
            <label for="input-name">Nome</label>
            <PsrInput v-model="form.name" id="input-name" placeholder="Informe o nome do produto" />
            <p v-if="form.errors.name" class="text-red-500">Informe o nome do produto</p>
          </div>

          <div class="w-full space-y-2">
            <label for="input-voltage">Tensão</label>
            <PsrInput v-model="form.voltage" id="input-voltage" type="number" placeholder="Informe a tensão do produto" />
            <p v-if="form.errors.voltage" class="text-red-500">Informe a tensão do produto (Apenas números)</p>
          </div>

          <div class="w-full space-y-2">
            <label for="input-manufacturer">Fabricante</label>
            <PsrSelect v-model="form.manufacturer" :items="manufactureres" />
            <p v-if="form.errors.manufacturer" class="text-red-500">Informe a fabricante do produto</p>
          </div>
        </div>

        <div>
          <div class="w-full space-y-2">
            <label for="input-description">Descrição</label>
            <PsrTextarea v-model="form.description" id="input-description" />
            <p v-if="form.errors.description" class="text-red-500">Informe a descrição</p>
          </div>

          <div class="w-full">
            <PsrButton class="w-full text-center" @click="submit">Salvar</PsrButton>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
