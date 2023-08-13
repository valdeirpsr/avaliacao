import { mount } from '@vue/test-utils';
import { describe, expect, it } from 'vitest';
import PsrTextarea from '../../../resources/js/Components/PsrTextarea.vue';

describe('Testa iteração com o componente', () => {
  it('O modelValue deve ser atualizado', async () => {
    const wrapper = mount(PsrTextarea, {
      props: {
        modelValue: '',
        /** @ts-ignore */
        'onUpdate:modelValue': (value: string) => wrapper.setProps({ modelValue: value }),
      },
    });

    await wrapper.find('[data-testid="textarea"]').setValue('Teste');
    expect(wrapper.props('modelValue')).toBe('Teste')
  });
});
