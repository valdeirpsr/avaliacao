import { mount } from '@vue/test-utils';
import { describe, expect, it } from 'vitest';
import PsrModalConfirm from '../../../resources/js/Components/PsrModalConfirm.vue';

describe('Testa interação do componente PsrModalConfirm', () => {
  it('Quando o usúario clicar o botão Não, o evento dismiss deve ser disparado', async () => {
    const wrapper = mount(PsrModalConfirm);

    await wrapper.get('[data-testid="button-no"]').trigger('click');
    expect(wrapper.emitted()).toHaveProperty('dismiss');
  });

  it('Quando o usúario clicar o botão Sim, o evento confirm deve ser disparado', async () => {
    const wrapper = mount(PsrModalConfirm);

    await wrapper.get('[data-testid="button-yes"]').trigger('click');
    expect(wrapper.emitted()).toHaveProperty('confirm');
  });
});
