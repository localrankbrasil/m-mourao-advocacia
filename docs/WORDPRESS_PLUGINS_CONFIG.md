# Configuração de Plugins WordPress — M. Mourão Advocacia

**Data:** 2026-06-13  
**Site:** mmouraoadvocacia.com.br  
**Admin:** https://mmouraoadvocacia.com.br/wp-admin

---

## ✅ Status dos Plugins

| Plugin | Status | Versão |
|--------|--------|--------|
| **LiteSpeed Cache** | ✅ Ativado | 7.8.1+ |
| **Really Simple Security (SSL)** | ✅ Ativado | Latest |
| **WordFence Security** | ✅ Ativado | Latest |
| **Wordfence Activator** | ✅ Ativado | Helper |

---

## 🔧 Configurações Recomendadas

### 1. LiteSpeed Cache — Performance & Caching

**Objetivo:** Acelerar o site e melhorar Core Web Vitals

**Acesso:** WordPress Admin → LiteSpeed Cache

#### Configurações Essenciais:

**Cache Settings:**
- ✅ Cache Enabled
- ✅ Enable Object Cache
- ✅ Enable Browser Cache
- Cache TTL: 2592000 segundos (30 dias)

**Image Optimization:**
- ✅ Image Optimization: ON
- WebP Conversion: ON (melhora performance de imagens)
- Lazy Load: ON (carrega imagens sob demanda)

**Critical CSS:**
- ✅ Enable Critical CSS
- Generate on-the-fly para melhor performance

**Database Optimization:**
- Run Database Cleaner
- Remove transientes expirados
- Otimizar tabelas

**CDN (opcional se usar):**
- Se usar CDN (Cloudflare, etc), ativar integração
- Cache purge automático em updates

---

### 2. Really Simple Security (SSL) — Segurança Básica

**Objetivo:** Certificado SSL, redirecionamento seguro, proteção básica

**Acesso:** WordPress Admin → SSL → Settings

#### Configurações Essenciais:

**SSL/HTTPS:**
- ✅ Enable HTTPS: ON
- ✅ Redirect HTTP to HTTPS: ON
- ✅ HSTS Header: ON (força HTTPS permanentemente)
- HSTS Max Age: 31536000 segundos (1 ano)

**Security Headers:**
- ✅ X-Frame-Options: SAMEORIGIN (previne clickjacking)
- ✅ X-Content-Type-Options: nosniff
- ✅ X-XSS-Protection: ON

**No-Index & No-Follow (Admin):**
- ✅ Proteger áreas admin de indexação
- ✅ Block wp-admin acess para não-autenticados

**Certificado SSL:**
- Verificar se certificado está válido
- Auto-renew: ON (Let's Encrypt automático)

---

### 3. WordFence Security — Firewall & Proteção Avançada

**Objetivo:** Firewall real-time, detecção de malware, brute-force protection

**Acesso:** WordPress Admin → Wordfence → Dashboard

#### Configurações Essenciais:

**Firewall (Block Malicious Traffic):**
- ✅ Firewall: ON
- ✅ Block known attackers: ON
- ✅ Aggressive blocking: MEDIUM (balancear performance vs segurança)
- ✅ Protect xmlrpc.php: ON (previne ataques de força bruta)

**Brute Force Protection:**
- ✅ Brute Force Protection: ON
- Failed login limit: 5 tentativas em 10 minutos
- Lockout duration: 60 minutos
- ✅ CAPTCHA on login: ON (após falhas)

**Two-Factor Authentication:**
- ✅ Two-Factor Auth: Enabled para admin
- Require 2FA: Apenas para admin (contato@localrankbrasil.com)
- Método: Authenticator app (Google Authenticator, Authy)

**Malware Scanning:**
- ✅ Enable Malware Scanning: ON
- Scan Schedule: Daily (scan nocturno)
- Action on detection: Quarantine & Alert

**Live Traffic:**
- ✅ Enable Live Traffic Log: ON
- Keep logs for: 30 dias
- Monitorar atividades suspeitas

**Backup & Recovery:**
- ✅ Enable Backup: ON (se disponível no plano)
- Backup Schedule: Daily
- Retention: 14 dias

**Security Alerts:**
- ✅ Email Alerts: ON
- Alert on login: Yes
- Alert on file changes: Yes
- Send alerts to: contato@localrankbrasil.com

---

## 📊 Monitoramento & Manutenção

### Checklist Semanal:
- [ ] Verificar WordFence Dashboard
- [ ] Revisar erros/alertas de segurança
- [ ] Verificar Live Traffic suspeito
- [ ] Cache hit rate no LiteSpeed

### Checklist Mensal:
- [ ] Executar scan de malware (WordFence)
- [ ] Revisar logs e alertas
- [ ] Limpar cache e banco de dados (LiteSpeed)
- [ ] Verificar uptime e performance
- [ ] Revisar certificado SSL (renovação automática)

### Checklist Trimestral:
- [ ] Audit completo de segurança
- [ ] Review de acessos (Really Simple Security)
- [ ] Update de plugins e WordPress core
- [ ] Teste de restore (backup)

---

## 🚨 Resposta a Incidentes

### Se detectado malware:
1. WordFence irá alertar automaticamente
2. Colocar site em Maintenance Mode (LiteSpeed)
3. Executar scan completo (WordFence)
4. Revisar compromised files
5. Restaurar backup se necessário
6. Notificar admin/proprietário

### Se detectado ataque DDoS:
1. WordFence irá bloquear IPs suspeitos
2. Aumentar "Aggressive Blocking" temporariamente
3. Analisar padrões de ataque
4. Considerar CDN (Cloudflare) para proteção adicional

### Se site ficar lento:
1. Verificar cache hit rate (LiteSpeed)
2. Revisar database size e fazer limpeza
3. Analisar Live Traffic suspeito
4. Considerar upgrade se tráfego legítimo alto

---

## 📱 Contatos & Suporte

| Serviço | Contato |
|---------|---------|
| **LiteSpeed** | https://www.litespeedtech.com/support |
| **Really Simple SSL** | https://www.really-simple-ssl.com/support |
| **WordFence** | https://www.wordfence.com/support |
| **Admin WordPress** | contato@localrankbrasil.com |
| **Cliente** | advocacia@mariomourao.adv.br |

---

## 🔐 Senhas & Acesso

⚠️ **Credenciais armazenadas com segurança:**
- Email: contato@localrankbrasil.com
- Senha: [Salva em .env gitignored]
- 2FA WordFence: Habilitado

### Recovery Codes (WordFence 2FA):
- Guardar em local seguro (password manager)
- Fazer backup em segurança física

---

## 📈 Performance Targets

| Métrica | Target | Status |
|---------|--------|--------|
| **LCP (Largest Contentful Paint)** | < 2.5s | Monitor |
| **FID (First Input Delay)** | < 100ms | Monitor |
| **CLS (Cumulative Layout Shift)** | < 0.1 | Monitor |
| **Cache Hit Rate** | > 80% | Monitor |
| **Uptime** | > 99.5% | Target |

---

## 🎯 Próximos Passos

1. ✅ Plugins instalados e ativados
2. ⏳ **Configurar cada plugin** (conforme acima)
3. ⏳ **Testar 2FA** do WordFence
4. ⏳ **Executar first scan** (malware)
5. ⏳ **Criar backup** inicial
6. ⏳ **Monitorar** por 7 dias
7. ⏳ **Documentar** alertas/incidentes

---

**Documento criado:** 2026-06-13  
**Último atualizado:** 2026-06-13  
**Responsável:** Lucas Mourão / Local Rank Brasil
