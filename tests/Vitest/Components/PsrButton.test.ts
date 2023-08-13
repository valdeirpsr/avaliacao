import { mount } from '@vue/test-utils';
import { describe,expect, it } from 'vitest';
import PsrButton from '../../../resources/js/Components/PsrButton.vue';

describe('Testa a renderização do componente', () => {
  const selectorButton = '[data-testid="button"]';

  it('O botão sem tipo e sem color não deve possuir classes adicionais', () => {
    const wrapper = mount(PsrButton);

    expect(wrapper.find(selectorButton).classes().length).toEqual(1);
    expect(wrapper.find(selectorButton).classes()).toContainEqual('button');
  });

  it('O botão do tipo ícone deve possuir a classe icon', () => {
    const wrapper = mount(PsrButton, {
      props: {
        type: 'icon',
      },
    });

    expect(wrapper.find(selectorButton).classes()).toContain('icon');
  });

  it('O botão da cor danger deve possuir a classe danger', () => {
    const wrapper = mount(PsrButton, {
      props: {
        color: 'danger',
      },
    });

    expect(wrapper.find(selectorButton).classes()).toContain('danger');
  });

  it('Ao clicar no botão, ele deve disparar o evento click', async () => {
    const wrapper = mount(PsrButton);

    await wrapper.get(selectorButton).trigger('click');

    expect(wrapper.emitted()).toHaveProperty('click');
  });
});

describe('Verifica snapshot do componente', () => {
  it('Botão padrão', () => {
    const wrapper = mount(PsrButton);
    expect(wrapper.html()).toMatchSnapshot();
  });

  it('Botão do tipo ícone', () => {
    const wrapper = mount(PsrButton, { props: { type: 'icon' } });
    expect(wrapper.html()).toMatchSnapshot();
  });

  it('Botão da cor danger', () => {
    const wrapper = mount(PsrButton, { props: { color: 'danger' } });
    expect(wrapper.html()).toMatchSnapshot();
  });
});
