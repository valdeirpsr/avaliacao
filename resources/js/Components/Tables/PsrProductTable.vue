<script setup lang="ts">
  import { ref } from 'vue';
  import PsrModalConfirm from '../PsrModalConfirm.vue';
  import PsrButton from '../PsrButton.vue';
  import { useForm } from '@inertiajs/vue3';

  defineProps<{
    items: Product[]
  }>();

  const confirmOpened = ref(false);
  const productSelected = ref<Product['id']>();

  function remove(): void {
    useForm({}).delete(`/delete/${productSelected.value}`);

    return;
  }

  function openConfirm(productId: Product['id']) {
    confirmOpened.value = true;
    productSelected.value = productId;
  }
</script>

<template>
  <div class="w-full bg-white">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full text-left text-sm font-light">
              <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Tensão</th>
                  <th scope="col">Fabricante</th>
                  <th scope="col" class="text-right">Ação</th>
                </tr>
              </thead>

              <tbody>
                <tr
                  v-for="item, idx in items"
                  :key="`item-${idx}`"
                  class="border-b dark:border-neutral-500"
                >
                  <td>{{ item.name }}</td>
                  <td class="max-w-[40px] truncate overflow-hidden">{{ item.description }}</td>
                  <td>{{ item.voltage }}</td>
                  <td class="w-5">{{ item.manufacturer }}</td>
                  <td class="w-40 text-end">
                    <div class="space-x-2 flex justify-end">
                      <PsrButton type="icon" class="h-10 w-10" :href="item.edit">
                        <img src="../../../assets/icons/new.svg"/>
                      </PsrButton>

                      <PsrButton type="icon" color="danger" as="button" class="h-10 w-10" @click="openConfirm(item.id)">
                        <img src="../../../assets/icons/remove.svg" alt="" />
                      </PsrButton>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <PsrButton class="mt-4 ml-auto" href="/new" data-testid="btn-new">Adicionar</PsrButton>
    </div>
  </div>

  <PsrModalConfirm v-show="confirmOpened" @dismiss="confirmOpened = false" @confirm="remove()" />
</template>

<style scoped lang="scss">
table {
  thead th {
    @apply px-6 py-4;
  }

  tbody td {
    @apply whitespace-nowrap px-6 py-4;
  }
}
</style>
