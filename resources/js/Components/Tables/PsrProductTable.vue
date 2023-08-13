<script setup lang="ts">
  import PsrButton from '../PsrButton.vue';

  defineProps<{
    items: Product[]
  }>();
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
                  <td class="w-40 text-end space-x-2">
                    <PsrButton type="icon" as="button" class="h-10 w-10">
                      <img src="../../../assets/icons/new.svg"/>
                    </PsrButton>

                    <PsrButton type="icon" color="danger" as="button" class="h-10 w-10">
                      <img src="../../../assets/icons/remove.svg" alt="" />
                    </PsrButton>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <PsrButton class="mt-4 ml-auto">Adicionar</PsrButton>
    </div>
  </div>
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