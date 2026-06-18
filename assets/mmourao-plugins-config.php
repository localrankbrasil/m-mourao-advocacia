<?php
/**
 * Plugin Name: M. Mourão - Plugins Configuration
 * Description: Configura automaticamente plugins de segurança e performance
 * Version: 1.0.0
 * Author: Local Rank Brasil
 *
 * INSTALAÇÃO:
 * 1. Upload este arquivo para wp-content/mu-plugins/mmourao-plugins-config.php
 * 2. Arquivo será carregado automaticamente pelo WordPress
 * 3. Confira os logs em wp-content/debug.log
 *
 * NOTA: Este é um "Must-Use" plugin e é carregado antes de plugins normais
 */

// Executar configurações ao carregar
add_action( 'plugins_loaded', 'mmourao_configure_all_plugins', 1 );

function mmourao_configure_all_plugins() {

    // Evitar executar múltiplas vezes por request
    static $already_ran = false;
    if ( $already_ran ) {
        return;
    }
    $already_ran = true;

    $configured_key = 'mmourao_plugins_configured_v2';
    $configured_time = get_option( $configured_key );

    // Se já foi configurado hoje, não rodar novamente
    $today = gmdate( 'Y-m-d' );
    if ( $configured_time && strpos( $configured_time, $today ) === 0 ) {
        return;
    }

    // Log de início
    error_log( '[M. Mourão Plugins] Starting configuration at ' . current_time( 'Y-m-d H:i:s' ) );

    // ==========================================
    // 1. LITESPEED CACHE CONFIGURATION
    // ==========================================

    if ( defined( 'LITESPEED_V' ) ) {

        error_log( '[M. Mourão] Configuring LiteSpeed Cache v' . LITESPEED_V );

        $litespeed_options = array(

            // Cache Core
            'cache-enable'              => 1,
            'cache-object'              => 1,
            'cache-browser'             => 1,
            'cache-ttl'                 => 2592000,     // 30 dias

            // REST API
            'cache-rest'                => 1,

            // Mobile
            'cache-mobile'              => 1,

            // Image Optimization
            'img_optm-enable'           => 1,
            'img_optm-webp'             => 1,
            'img_optm-lazyload'         => 1,
            'img_optm-exclude'          => '', // Nenhuma exclusão padrão

            // Critical CSS
            'critical-enable'           => 1,
            'critical-defer-fontfaces'  => 1,

            // Minification
            'css_minify'                => 1,
            'js_minify'                 => 1,
            'html_minify'               => 1,

            // Database Optimization
            'db-optimize'               => 1,
            'db-clean-revisions'        => 1,
            'db-clean-transients'       => 1,

            // Advanced
            'cache-login'               => 1,
            'cache-commenters'          => 1,

        );

        foreach ( $litespeed_options as $option_name => $value ) {
            update_option( 'litespeed_' . $option_name, $value );
        }

        error_log( '[M. Mourão] LiteSpeed Cache configured with ' . count( $litespeed_options ) . ' options' );

    } else {
        error_log( '[M. Mourão] LiteSpeed Cache not detected' );
    }

    // ==========================================
    // 2. REALLY SIMPLE SSL CONFIGURATION
    // ==========================================

    error_log( '[M. Mourão] Configuring Really Simple SSL' );

    $rssl_options = array(

        // HTTPS & SSL
        'really-simple-ssl-https-frontend'          => 1,
        'really-simple-ssl-https-admin'             => 1,
        'really-simple-ssl-HTTPS-redirect'          => 1,
        'really-simple-ssl-mixed-content'           => 1,

        // HSTS (HTTP Strict Transport Security)
        'really-simple-ssl-HSTS'                    => 1,
        'really-simple-ssl-HSTS-includeSubDomains' => 1,
        'really-simple-ssl-HSTS-preload'           => 1,
        'really-simple-ssl-HSTS-max-age'           => 31536000, // 1 ano

        // Security Headers
        'really-simple-ssl-X-Frame-Options'        => 'SAMEORIGIN',
        'really-simple-ssl-X-Content-Type-Options' => 1,
        'really-simple-ssl-X-XSS-Protection'       => 1,
        'really-simple-ssl-Referrer-Policy'        => 'strict-origin-when-cross-origin',

        // Permissions Policy
        'really-simple-ssl-Permissions-Policy'     => 1,

        // Admin Protection
        'really-simple-ssl-block-wp-admin-access'  => 1,

        // XML-RPC
        'really-simple-ssl-no-index-xmlrpc'        => 1,

    );

    foreach ( $rssl_options as $option_name => $value ) {
        update_option( $option_name, $value );
    }

    error_log( '[M. Mourão] Really Simple SSL configured with ' . count( $rssl_options ) . ' options' );

    // ==========================================
    // 3. WORDFENCE SECURITY CONFIGURATION
    // ==========================================

    if ( defined( 'WORDFENCE_VERSION' ) || defined( 'WORDFENCE_PLUGIN_FILE' ) ) {

        error_log( '[M. Mourão] Configuring WordFence Security' );

        $wordfence_options = array(

            // Firewall Core
            'wordfence_blockFakeBots'                => 1,
            'wordfence_firewallEnabled'              => 1,
            'wordfence_disableAllFeatures'           => 0,

            // Brute Force Protection
            'wordfence_loginSec_blockUsers'          => 1,
            'wordfence_loginSec_maxFailures'         => 5,     // 5 tentativas
            'wordfence_loginSec_maxFailuresWindow'   => 600,    // em 10 minutos
            'wordfence_loginSec_lockoutTime'         => 3600,   // lockout de 1 hora
            'wordfence_loginSec_showCaptcha'         => 1,      // mostrar CAPTCHA

            // XML-RPC Protection
            'wordfence_blockXmlrpc'                  => 1,

            // Scanning & Malware Detection
            'wordfence_scanEnabled'                  => 1,
            'wordfence_scanFrequency'                => 'daily',
            'wordfence_scanType'                     => 'all',

            // Live Traffic Logging
            'wordfence_liveTrafficEnabled'           => 1,

            // Security Alerts
            'wordfence_alertEmail'                   => 'contato@localrankbrasil.com',
            'wordfence_alertOnLogin'                 => 1,
            'wordfence_alertOnFileChange'            => 1,
            'wordfence_alertOnPluginThemeUpdate'     => 1,

            // Advanced Security
            'wordfence_secure_cookies'               => 1,
            'wordfence_httpHeaders'                  => 1,
            'wordfence_disableGlobalNotification'    => 0,

        );

        foreach ( $wordfence_options as $option_name => $value ) {
            update_option( $option_name, $value );
        }

        error_log( '[M. Mourão] WordFence configured with ' . count( $wordfence_options ) . ' options' );

    } else {
        error_log( '[M. Mourão] WordFence not detected' );
    }

    // ==========================================
    // FINAL LOG
    // ==========================================

    update_option( $configured_key, $today . ' ' . current_time( 'H:i:s' ) );
    error_log( '[M. Mourão Plugins] Configuration completed successfully at ' . current_time( 'Y-m-d H:i:s' ) );

}

// Opcional: Hook para deletar opções se necessário reverter
function mmourao_reset_plugin_config() {
    // Comentar a função acima e descomentaar abaixo se precisar reverter
    // Isso vai remover TODAS as configurações personalizadas
}

// Gancho para checagem de saúde
add_action( 'wp_scheduled_delete', 'mmourao_verify_plugin_health' );

function mmourao_verify_plugin_health() {

    // Verificar se LiteSpeed está ativo
    if ( defined( 'LITESPEED_V' ) ) {
        $cache_enabled = get_option( 'litespeed_cache-enable' );
        if ( ! $cache_enabled ) {
            error_log( '[M. Mourão] Warning: LiteSpeed cache appears to be disabled' );
        }
    }

    // Verificar se HTTPS está habilitado
    $https_redirect = get_option( 'really-simple-ssl-HTTPS-redirect' );
    if ( ! $https_redirect ) {
        error_log( '[M. Mourão] Warning: HTTPS redirect may not be enabled' );
    }

    // Verificar se WordFence tem email de alerta
    $wf_email = get_option( 'wordfence_alertEmail' );
    if ( empty( $wf_email ) ) {
        error_log( '[M. Mourão] Warning: WordFence alert email not set' );
    }

}

?>
