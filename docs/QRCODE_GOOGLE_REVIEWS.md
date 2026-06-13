# QR Code Google Reviews — M. Mourão Advocacia

## 📱 Informações Gerais

**URL de Destino:** https://g.page/M-Mourao-Advocacia/review  
**Função:** Direciona clientes para deixar avaliações no Google  
**Local dos Arquivos:** `/assets/qrcode-*.png`

---

## 📦 Versões Disponíveis

| Versão | Tamanho | Uso Recomendado |
|--------|---------|-----------------|
| **qrcode-small.png** | 300×300px | Cartões de visita, assinatura de email |
| **qrcode-medium.png** | 500×500px | Posts em redes sociais, WhatsApp |
| **qrcode-large.png** | 1000×1000px | Impressão de papel A4, poster pequeno |
| **qrcode-xlarge.png** | 2000×2000px | Banner grande, parede do escritório |
| **qrcode-google-reviews.png** | 1000×1080px | Versão com texto (pronto para usar) |

---

## 🎯 Casos de Uso

### 1. **Cartão de Visita** 📇
- Use: `qrcode-small.png` (300×300px)
- Coloque no verso ou lateral do cartão
- Tamanho físico: ~3cm × 3cm
- Texto: "Deixe uma avaliação"

### 2. **Assinatura de Email** 📧
- Use: `qrcode-small.png` ou `qrcode-medium.png`
- Insira na assinatura HTML
- Tamanho: 200-300px
- Com texto: "Avalie nosso trabalho no Google"

### 3. **Redes Sociais & WhatsApp** 📲
- Use: `qrcode-medium.png` (500×500px)
- Poste nos Stories (Instagram, WhatsApp Status)
- Texto do caption: "Clientes satisfeitos? Deixe uma avaliação! 👍"
- Ideal para Stories com call-to-action

### 4. **Documentos e Contratos** 📄
- Use: `qrcode-large.png` (1000×1000px)
- Insira na última página de contratos
- Faça os clientes deixarem review após assinatura
- Inclua: "Sua avaliação nos ajuda!"

### 5. **Impressão para Escritório** 🖨️
- Use: `qrcode-large.png` ou `qrcode-xlarge.png`
- Imprima em papel A4 (21×29.7cm)
- Coloque na recepção, muro, ou parede
- Frame bonito com a identidade visual

### 6. **Materiais de Marketing** 📣
- Use: `qrcode-large.png` ou `qrcode-xlarge.png`
- Imprima em adesivos
- Aplique em:
  - Automóvel da marca
  - Materiais promocionais
  - Envelopes
  - Sacolas personalizadas

---

## 🎨 Integração com Marca

### Personalização Recomendada

Se quiser adicionar a marca/logo do cliente:
1. Use a versão sem texto (`qrcode-*.png`)
2. Adicione logo no centro (máx 20% do tamanho do QR)
3. Mantenha alta resolução do logo

### Exemplos de Layout

**Opção 1: QR com texto abaixo**
```
[    QR CODE    ]
  Deixe uma avaliação
    M. Mourão Advocacia
```

**Opção 2: QR com logo no centro**
```
[  QR CODE  ]
  (logo inside)
```

**Opção 3: QR em layout horizontal**
```
[QR]  Avalie-nos no Google!
      Código ao lado direciona para
      nossa página de avaliações.
```

---

## 📥 Como Usar em Diferentes Plataformas

### Google Meu Negócio (GMB)
1. Vá para https://business.google.com
2. Selecione o negócio "M. Mourão Advocacia"
3. Vá para "Clientes" → "Avaliações"
4. Use o botão "Copiar link" para compartilhamento
5. O QR acima já aponta para o link correto

### WordPress (Se usar site WordPress)
```html
<!-- Insira o HTML abaixo na página de contato -->
<div class="qrcode-reviews">
  <img src="/assets/qrcode-medium.png" alt="Deixe uma avaliação" width="300">
  <p>Aponte sua câmera para deixar uma avaliação</p>
</div>
```

### Email
```html
<!-- HTML para assinatura de email -->
<table>
  <tr>
    <td style="text-align: center;">
      <img src="qrcode-small.png" width="200" alt="Google Reviews">
      <p style="font-size: 12px; color: #666;">Deixe uma avaliação</p>
    </td>
  </tr>
</table>
```

### WhatsApp Business
1. Salve a imagem `qrcode-medium.png`
2. Use em broadcasts e mensagens templates
3. Texto sugerido: "Clientes satisfeitos? Avalie nosso trabalho! 📱"

### Instagram Stories
1. Upload de `qrcode-medium.png`
2. Adicione sticker/link com call-to-action
3. Caption: "Deixe sua avaliação nos comentários abaixo 👇"

---

## ✅ Checklist de Implementação

- [ ] **Cartões de visita** — Imprimir com qrcode-small.png
- [ ] **Assinatura de email** — Adicionar qrcode-small.png ao footer
- [ ] **WhatsApp Business** — Salvar imagem e usar em broadcasts
- [ ] **Google Meu Negócio** — Compartilhar URL em descrição
- [ ] **Site** — Adicionar QR code na página de contato
- [ ] **LinkedIn** — Postar imagem com instrução
- [ ] **Instagram/Facebook** — Stories com QR code
- [ ] **Contratos** — Imprimir QR code última página
- [ ] **Escritório** — Imprimir para parede/recepção

---

## 🔄 Como Atualizar o QR Code

Se precisar mudar a URL no futuro:

1. Gerar novo QR code:
```python
import qrcode
qr = qrcode.QRCode()
qr.add_data("https://nova-url.com")
qr.make()
img = qr.make_image()
img.save("qrcode-novo.png")
```

2. Atualizar os arquivos em `/assets/`
3. Notificar todos os pontos de distribuição (cartão, email, etc.)

---

## 📊 Métricas & Monitoramento

Para acompanhar o desempenho:

1. **Google Meu Negócio Dashboard:**
   - Vá em https://business.google.com
   - Acompanhe "Avaliações" e "Interações"
   - Veja de onde vêm os clientes

2. **Google Analytics (se site tiver):**
   - Adicione parâmetro UTM:
   - URL: `https://g.page/M-Mourao-Advocacia/review?utm_source=qrcode&utm_medium=print&utm_campaign=reviews`

3. **Conversas no WhatsApp:**
   - Veja quantos acessam o link

---

## 📞 Contato & Suporte

Se precisar regenerar ou personalizar o QR code:
- Email: advocacia@mariomourao.adv.br
- WhatsApp: (11) 997096369

---

**Criado em:** 2026-06-13  
**Versão:** 1.0  
**Status:** ✅ Pronto para Uso
