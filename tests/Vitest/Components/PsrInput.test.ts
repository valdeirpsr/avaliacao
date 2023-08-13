import { mount } from '@vue/test-utils';
import { describe, expect, it } from 'vitest';
import PsrInput from '../../../resources/js/Components/PsrInput.vue';

describe('Testa iteração com o componente', () => {
  it('O modelValue deve ser atualizado', async () => {
    const wrapper = mount(PsrInput, {
      props: {
        modelValue: '',
        /** @ts-ignore */
        'onUpdate:modelValue': (value: string) => wrapper.setProps({ modelValue: value }),
      },
    });

    await wrapper.find('[data-testid="input"]').setValue('Teste');
    expect(wrapper.props('modelValue')).toBe('Teste')
  });
});
