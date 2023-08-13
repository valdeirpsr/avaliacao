import { mount } from '@vue/test-utils';
import { describe, expect, it } from 'vitest';
import PsrSelect from '../../../resources/js/Components/PsrSelect.vue';

describe('Testa iteração com o componente', () => {
  it('O modelValue deve ser atualizado', async () => {
    const wrapper = mount(PsrSelect, {
      props: {
        modelValue: '',
        items: [{ value: 'Teste' }],
        /** @ts-ignore */
        'onUpdate:modelValue': (value: string) => wrapper.setProps({ modelValue: value }),
      },
    });

    await wrapper.find('[data-testid="select"]').setValue('Teste');
    expect(wrapper.props('modelValue')).toBe('Teste')
  });
});
