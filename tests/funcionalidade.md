
# 🧪 Testes de Funcionalidade

## Cenários em Gherkin

```gherkin
Funcionalidade: Seleção de Dieta

  Cenário: Usuário escolhe dieta Mediterrânea
    Dado que o usuário seleciona a dieta "Mediterrânea"
    E informa peso "70", altura "170", idade "30" e sexo "Feminino"
    Quando solicita o plano alimentar
    Então o sistema deve sugerir refeições com azeite, peixes e grãos integrais

  Cenário: Usuário escolhe dieta Low Carb
    Dado que o usuário seleciona a dieta "Low Carb"
    E informa peso "80", altura "175", idade "28" e sexo "Masculino"
    Quando solicita o plano alimentar
    Então o sistema deve sugerir refeições com baixo teor de carboidratos

Funcionalidade: Cálculo de IMC

  Cenário: Cálculo de IMC correto
    Dado que o usuário informa peso "70" e altura "170"
    Quando o sistema calcula o IMC
    Então o IMC deve ser "24.22"

Funcionalidade: Cálculo de TMB

  Cenário: Cálculo de TMB para usuário masculino
    Dado que o usuário informa peso "70", altura "170", idade "30" e sexo "Masculino"
    Quando o sistema calcula a TMB
    Então a TMB deve ser "1665"

Funcionalidade: Registro de alergias/intolerâncias

  Cenário: Usuário informa alergia a lactose
    Dado que o usuário informa alergia "Lactose"
    Quando solicita o plano alimentar
    Então o plano deve excluir alimentos com lactose
```

## Template de Registro de Casos de Teste

| ID | Funcionalidade | Pré-Condição | Passos | Dados de Entrada | Resultado Esperado | Resultado Obtido | Status (✅/❌) | Observações |
|-----|-------------------------------|--------------------------|----------------------|----------------------|-----------------------|--------------------|------------------|----------------|
| FT-01 | Seleção de Dieta Mediterrânea | Usuário autenticado e na tela de seleção | 1. Acessar tela 2. Selecionar dieta 3. Preencher dados 4. Solicitar plano | Dieta: Mediterrânea, Peso: 70, Altura: 170, Idade: 30, Sexo: Feminino | Plano com azeite, peixes, grãos integrais | | | |
| FT-02 | Seleção de Dieta Low Carb | Usuário autenticado e na tela de seleção | Mesmos passos do FT-01 | Dieta: Low Carb, Peso: 80, Altura: 175, Idade: 28, Sexo: Masculino | Plano com baixo carboidrato | | | |
| FT-03 | Cálculo de IMC | Usuário autenticado | 1. Informar peso e altura 2. Calcular IMC | Peso: 70, Altura: 170 | IMC = 24.22 | | | |
| FT-04 | Cálculo de TMB | Usuário autenticado | 1. Informar peso, altura, idade, sexo 2. Calcular TMB | Peso: 70, Altura: 170, Idade: 30, Sexo: Masculino | TMB = 1665 | | | |
| FT-05 | Registro de alergias | Usuário autenticado e na tela de seleção | 1. Informar alergia 2. Gerar plano | Alergia: Lactose | Plano sem lactose | | | |

## Template de Registro de Bugs

| ID do Bug | Caso de Teste Relacionado | Descrição do Problema | Severidade | Status | Responsável | Link |
|------------|--------------------------|-----------------------|-------------|---------|--------------|-------|
| BUG-01 | FT-03 | IMC calculado incorretamente para valores extremos | Alta | Aberto | Caio Magalhães | (link da issue) |
| BUG-02 | FT-05 | Alimentos com lactose ainda aparecem no plano | Média | Aberto | Caio Magalhães | (link da issue) |
