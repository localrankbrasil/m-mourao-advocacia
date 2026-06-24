# Guia de Assinatura de Email — M. Mourão Advocacia

**Cliente:** Mario Mourão  
**Email:** advocacia@mariomourao.adv.br  
**Data:** 2026-06-13

---

## 📧 Arquivos Disponíveis

| Arquivo | Tipo | Uso |
|---------|------|-----|
| `email-signature.html` | HTML | Clientes modernos (Outlook, Gmail web, etc) |
| `email-signature.txt` | Texto puro | Clientes básicos, fallback |

---

## 🔧 Como Usar em Diferentes Clientes

### 1. **Gmail (Web)**

#### Método A: Colar HTML diretamente
1. Acesse Gmail → Configurações (⚙️) → Ver todas as configurações
2. Aba "Geral" → Role até "Assinatura"
3. Clique em "Criar nova"
4. Cole o conteúdo do `email-signature.html`
5. Salve as alterações

#### Método B: Importar HTML
1. Abra `email-signature.html` em um navegador
2. Selecione toda a assinatura visível (Ctrl+A)
3. Copie (Ctrl+C)
4. Cole em Gmail → Configurações → Assinatura

---

### 2. **Outlook Desktop (Windows/Mac)**

#### Para Outlook 2019+:
1. Abra Outlook
2. Arquivo → Opções → Correio → Assinaturas
3. Clique "Nova"
4. Dê um nome: "M. Mourão Advocacia"
5. Na caixa de edição:
   - Clique em "Inserir" → "Arquivo" (se disponível) ou
   - Cole o conteúdo do `email-signature.html` como texto

#### Nota importante:
Outlook pode não renderizar HTML perfeitamente. Se necessário:
1. Use a versão texto (`email-signature.txt`)
2. Ou crie a assinatura manualmente no Outlook com formatação similar

---

### 3. **Outlook Web (OWA)**

1. Abra Outlook Web → Configurações (⚙️)
2. Correio → Composição e resposta
3. Assinaturas de email
4. Crie uma nova assinatura
5. Cole o conteúdo do `email-signature.txt`
6. Salve

**Nota:** OWA não suporta bem HTML importado. Use texto puro.

---

### 4. **Apple Mail (macOS/iOS)**

#### macOS:
1. Abra Mail → Preferências
2. Contas → Conta@domain.com → Assinatura
3. Clique "+"
4. Digite um nome para a assinatura
5. Cole o conteúdo do `email-signature.txt`
6. Salve

#### iOS:
Mail do iOS não suporta assinaturas personalizadas avançadas. Use a versão texto.

---

### 5. **Thunderbird**

1. Editar → Configurações → Contas de correio
2. Selecione a conta
3. Assinatura → "Usar assinatura de texto"
4. Cole o conteúdo do `email-signature.txt`
5. OK

---

### 6. **ProtonMail**

1. Acesse ProtonMail → Configurações
2. Geral → Assinatura
3. Ative "Mostrar assinatura"
4. Cole o conteúdo do `email-signature.txt`
5. Salve

---

### 7. **Zoho Mail**

1. Acesse Zoho Mail → Configurações
2. Preferências → Assinatura
3. Clique "Adicionar assinatura"
4. Cole o conteúdo do `email-signature.txt`
5. Salve

---

## 📱 Versão Mobile

Para clientes de email mobile (smartphone), use sempre a versão **texto puro** (`email-signature.txt`):

```
Mario Mourão
M. Mourão Advocacia

Av. Paulista, nº 1636, 7º andar
São Paulo/SP

Tel: (11) 3197-4564
Cel: (11) 99709-6369
Email: advocacia@mariomourao.adv.br
```

---

## 🎨 Customização

Se precisar customizar cores, fontes ou layout:

### Editar cores:
No arquivo `email-signature.html`, procure por:
```css
color: #0066cc;  /* Azul - mude para outra cor se desejar */
color: #1a1a1a;  /* Preto para nome */
```

### Adicionar links sociais:
No HTML, encontre a seção `social-links` e adicione:
```html
<a href="https://www.instagram.com/username/" target="_blank">Instagram</a>
```

### Alterar tamanho de fonte:
Procure por `font-size:` e ajuste os valores (em `px`).

---

## ✅ Checklist de Implementação

- [ ] Escolher cliente de email
- [ ] Seguir instruções acima
- [ ] Testar envio de email
- [ ] Verificar se logo aparece corretamente
- [ ] Verificar se links funcionam
- [ ] Testar em mobile (se aplicável)
- [ ] Comunicar equipe sobre nova assinatura

---

## 🔗 Links Importantes

- **Website:** https://mmouraoadvocacia.com.br
- **LinkedIn:** https://www.linkedin.com/in/mario-mourao/
- **Email:** advocacia@mariomourao.adv.br
- **Telefone:** (11) 3197-4564 / (11) 99709-6369

---

## 📝 Notas Técnicas

### Por que HTML?
- ✅ Melhor aparência visual
- ✅ Logo hospedado na web (não precisa anexar)
- ✅ Links clicáveis
- ✅ Formatação profissional

### Problemas comuns e soluções:

| Problema | Solução |
|----------|---------|
| Logo não aparece | Verificar URL do logo ou usar texto puro |
| Texto desalinhado | Usar versão texto puro |
| Cores estranhas | Cliente não suporta HTML; usar texto |
| Links não funcionam | Copiar/colar novamente; verificar URL |

---

## 🔄 Atualizações Futuras

Se precisar atualizar a assinatura (telefone, email, etc):

1. Edite os arquivos:
   - `assets/email-signature.html`
   - `assets/email-signature.txt`
2. Commit e push no git
3. Re-implemente nos clientes de email
4. Notifique a equipe

---

**Criado em:** 2026-06-13  
**Versão:** 1.0  
**Status:** Pronto para uso
