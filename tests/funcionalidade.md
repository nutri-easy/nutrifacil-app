
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