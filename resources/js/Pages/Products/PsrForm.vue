<script setup lang="ts">
  import { useForm } from '@inertiajs/vue3';
  import PsrHeader from '../../Components/PsrHeader.vue';
  import PsrInput from '../../Components/PsrInput.vue';
  import PsrSelect from '../../Components/PsrSelect.vue';
  import PsrTextarea from '../../Components/PsrTextarea.vue';
  import PsrButton from '../../Components/PsrButton.vue';

  const props = withDefaults(defineProps<{
    product: Product|undefined
  }>(), {
    product: undefined
  });

  const form = useForm({
    name: props.product?.name ?? '',
    voltage: props.product?.voltage ?? '',
    manufacturer: props.product?.manufacturer ?? '',
    description: props.product?.description ?? '',
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
    const formUrl = props.product ? `/edit/${props.product.id}` : '/new';

    form.clearErrors();
    form.post(formUrl);
  }
</script>

<template>
  <PsrHeader />

  <div class="container mt-8 pb-32">
    <div class="rounded-lg">
      <h1 class="text-2xl font-bold w-full">
        <span v-if="!product">Criar Produto</span>
        <span v-else>Editar o produto <span class="text-purple-500">{{ product.name }}</span></span>
      </h1>

      <div class="mt-8 flex flex-col md:flex-row justify-evenly">
        <div class="space-y-8">
          <div class="w-full space-y-2">
            <label for="input-name">Nome</label>
            <PsrInput id="input-name" v-model="form.name" placeholder="Informe o nome do produto" />
            <p v-if="form.errors.name" class="text-red-500">Informe o nome do produto</p>
          </div>

          <div class="w-full space-y-2">
            <label for="input-voltage">Tensão (apenas números)</label>
            <PsrInput id="input-voltage" v-model="form.voltage" type="number" placeholder="Informe a tensão do produto" />
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
            <PsrTextarea id="input-description" v-model="form.description" />
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
