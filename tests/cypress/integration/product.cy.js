describe("Gerenciamento de um produto", () => {
  it("Cria um novo produto", () => {
    cy.visit("/");
    cy.get("[data-testid='btn-new']").click();

    cy.location("href").should("eq", "http://localhost/new");

    cy.get("div:nth-of-type(1) > [data-testid='input']").type("Produto 1");
    cy.get("div:nth-of-type(2) > [data-testid='input']").type("123");
    cy.get("[data-testid='select']").select("Electrolux");
    cy.get("[data-testid='textarea']").type("Descrição de teste");
    cy.get("[data-testid='button']").click();

    cy.contains('Produto cadastrado com sucesso');
  });

  it("Atualiza um produto", () => {
    cy.visit(`/edit/1`);
    cy.contains('Editar o produto Produto 1');

    cy.get("div:nth-of-type(1) > [data-testid='input']").clear().type("Produto 2");
    cy.get("[data-testid='button']").click();

    cy.contains('Produto 2');
    cy.contains('Produto atualizado com sucesso');
  });

  it("Remove um produto", () => {
    cy.visit("/");

    cy.get("div:nth-of-type(1) > [data-test=\"btn-remove\"]").click();
    cy.get("[data-testid='button-yes']").click();

    cy.contains('Produto removido com sucesso');
  });
});
