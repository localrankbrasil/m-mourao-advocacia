# Configuração Automática de Plugins WordPress

**Cliente:** M. Mourão Advocacia  
**Site:** mmouraoadvocacia.com.br  
**Data:** 2026-06-13

---

## ⚠️ Importante

Os três plugins estão **instalados e ativados**. Para finalizar a configuração automática, use uma das opções abaixo:

---

## Opção 1: Via Plugin MU (Must-Use) — RECOMENDADO ✅

Este é o método mais limpo e seguro.

### Passo 1: Criar arquivo MU Plugin

```bash
# Via SSH/SFTP no servidor:
# Navegue até: wp-content/mu-plugins/

# Se a pasta não existir, crie:
mkdir -p wp-content/mu-plugins/

# Crie o arquivo:
nano wp-content/mu-plugins/mmourao-plugins-config.php
```

### Passo 2: Colar o código abaixo

```php
<?php
/**
 * Plugin Name: M. Mourão - Plugins Configuration
 * Description: Auto-configura plugins de segurança e performance
 * Version: 1.0.0
 */

// Roda uma vez ao ativar
register_activation_hook( __FILE__, 'mmourao_plugins_first_run' );

function mmourao_plugins_first_run() {
    // Marcar que já foi configurado
    update_option( 'mmourao_plugins_configured', time() );
}

// Roda ao carregar WordPress
add_action( 'plugins_loaded', 'mmourao_configure_all_plugins', 5 );

function mmourao_configure_all_plugins() {
    
    // Evitar executar múltiplas vezes
    if ( wp_get_scheduled_hook( 'mmourao_plugins_configured' ) ) {
        return;
    }
    
    // ============ 1. LITESPEED CACHE ============
    if ( class_exists( 'LiteSpeed_Cache_Admin' ) ) {
        $litespeed_config = array(
            'cache-enable'              => 1,
            'cache-object'              => 1,
            'cache-browser'             => 1,
            'cache-ttl'                 => 2592000,     // 30 dias
            'cache-rest'                => 1,
            'cache-mobile'              => 1,
            'img_optm-enable'           => 1,
            'img_optm-webp'             => 1,
            'img_optm-lazyload'         => 1,
            'critical-enable'           => 1,
            'css_minify'                => 1,
            'js_minify'                 => 1,
            'html_minify'               => 1,
            'db-optimize'               => 1,
            'db-clean-revisions'        => 1,
            'db-clean-transients'       => 1,
        );
        
        foreach ( $litespeed_config as $option => $value ) {
            update_option( 'litespeed_' . $option, $value );
        }
        
        error_log( '[M. Mourão] LiteSpeed Cache configured on ' . date( 'Y-m-d H:i:s' ) );
    }
    
    // ============ 2. REALLY SIMPLE SSL ============
    $rssl_config = array(
        'really-simple-ssl-https-frontend'          => 1,
        'really-simple-ssl-HTTPS-redirect'          => 1,
        'really-simple-ssl-HSTS'                    => 1,
        'really-simple-ssl-HSTS-includeSubDomains' => 1,
        'really-simple-ssl-HSTS-max-age'           => 31536000,
        'really-simple-ssl-X-Frame-Options'        => 'SAMEORIGIN',
        'really-simple-ssl-X-Content-Type-Options' => 1,
        'really-simple-ssl-X-XSS-Protection'       => 1,
        'really-simple-ssl-Referrer-Policy'        => 'strict-origin-when-cross-origin',
        'really-simple-ssl-Permissions-Policy'     => 1,
        'really-simple-ssl-block-wp-admin-access'  => 1,
    );
    
    foreach ( $rssl_config as $option => $value ) {
        update_option( $option, $value );
    }
    
    error_log( '[M. Mourão] Really Simple SSL configured on ' . date( 'Y-m-d H:i:s' ) );
    
    // ============ 3. WORDFENCE SECURITY ============
    if ( function_exists( 'wordfenceCheckConnected' ) || defined( 'WORDFENCE_VERSION' ) ) {
        $wf_config = array(
            'wordfence_blockFakeBots'           => 1,
            'wordfence_firewallEnabled'         => 1,
            'wordfence_loginSec_blockUsers'     => 1,
            'wordfence_loginSec_maxFailures'    => 5,
            'wordfence_loginSec_maxFailuresWindow' => 600,
            'wordfence_loginSec_lockoutTime'    => 3600,
            'wordfence_loginSec_showCaptcha'    => 1,
            'wordfence_blockXmlrpc'             => 1,
            'wordfence_scanEnabled'             => 1,
            'wordfence_scanFrequency'           => 'daily',
            'wordfence_liveTrafficEnabled'      => 1,
            'wordfence_alertEmail'              => 'contato@localrankbrasil.com',
            'wordfence_alertOnLogin'            => 1,
            'wordfence_alertOnFileChange'       => 1,
        );
        
        foreach ( $wf_config as $option => $value ) {
            update_option( $option, $value );
        }
        
        error_log( '[M. Mourão] WordFence configured on ' . date( 'Y-m-d H:i:s' ) );
    }
    
    // Log geral
    error_log( '[M. Mourão] All plugins configured successfully' );
}
?>
```

### Passo 3: Salvar e fazer upload

1. Salve o arquivo como `mmourao-plugins-config.php`
2. Upload via SFTP/SSH para `wp-content/mu-plugins/`
3. Refresh da página WordPress em poucos segundos

O arquivo será carregado automaticamente por WordPress (Must-Use plugins).

---

## Opção 2: Via WP-CLI (Linha de Comando)

Se você tem acesso SSH ao servidor:

```bash
# Conectar ao servidor via SSH
ssh seu-usuario@mmouraoadvocacia.com.br

# Navegar até a raiz do WordPress
cd /public_html/  # ou /var/www/html/ dependendo do servidor

# Executar comandos:
wp option update litespeed_cache-enable 1
wp option update litespeed_cache-browser 1
wp option update litespeed_cache-ttl 2592000
wp option update really-simple-ssl-HTTPS-redirect 1
wp option update really-simple-ssl-HSTS 1
wp option update wordfence_blockXmlrpc 1
wp option update wordfence_alertEmail 'contato@localrankbrasil.com'
wp option update wordfence_alertOnLogin 1

# Verificar as opções:
wp option list | grep litespeed
wp option list | grep really-simple
wp option list | grep wordfence
```

---

## Opção 3: Executar arquivo PHP direto

Se você tem acesso File Manager ou FTP:

```bash
# Criar arquivo no raiz do site:
# Nome: wp-setup-plugins.php

<?php
require( 'wp-load.php' );

// Executar as configurações
update_option( 'litespeed_cache-enable', 1 );
update_option( 'really-simple-ssl-HTTPS-redirect', 1 );
update_option( 'wordfence_alertOnLogin', 1 );

echo "✅ Plugins configurados com sucesso!";
?>

# Acesse no navegador:
https://mmouraoadvocacia.com.br/wp-setup-plugins.php

# Depois DELETAR o arquivo por segurança!
```

⚠️ **NÃO deixe este arquivo no servidor após executar**

---

## ✅ Verificação Pós-Configuração

Após implementar uma das opções acima, verifique:

### 1. LiteSpeed Cache
- [ ] WP Admin → Dashboard
- [ ] Ver se há botão "LiteSpeed Cache" no menu
- [ ] Verificar se cache está habilitado
- [ ] Checar aba "Cache Log"

### 2. Really Simple SSL
- [ ] WP Admin → Segurança
- [ ] Verificar "Status do certificado SSL"
- [ ] Confirmar redirecionamento HTTPS ativo
- [ ] Testar: https://mmouraoadvocacia.com.br (verde/seguro)

### 3. WordFence
- [ ] WP Admin → Wordfence
- [ ] Verificar "Dashboard"
- [ ] Confirmar "Firewall Status: ON"
- [ ] Verificar email de alertas em "Alert Settings"

---

## 🔧 Configurações Específicas Implementadas

### LiteSpeed Cache
```php
- Cache habilitado
- Object cache: ON
- Browser cache: ON (30 dias)
- WebP conversion: ON
- Lazy load: ON
- Critical CSS: ON
- Minificação CSS/JS/HTML: ON
```

### Really Simple SSL
```php
- HTTPS redirect: ON
- HSTS header: ON (31536000 segundos)
- X-Frame-Options: SAMEORIGIN
- X-Content-Type-Options: nosniff
- X-XSS-Protection: ON
- Referrer Policy: strict-origin-when-cross-origin
```

### WordFence
```php
- Firewall: ON
- Block fake bots: ON
- Brute force protection: ON
- Max failed logins: 5 em 10 minutos
- Lockout time: 1 hora
- XML-RPC blocking: ON
- Scan malware: Daily
- Email alerts: ON (contato@localrankbrasil.com)
- Alert on login: ON
- Alert on file changes: ON
```

---

## 📞 Suporte

| Serviço | Link |
|---------|------|
| LiteSpeed | https://www.litespeedtech.com/support |
| Really Simple SSL | https://www.really-simple-ssl.com/support |
| WordFence | https://www.wordfence.com/support |

---

**Documento criado:** 2026-06-13  
**Status:** Pronto para implementação  
**Responsável:** Local Rank Brasil
