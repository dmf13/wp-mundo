<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'U6]%g~4fqTb<o$iW|Z]UzDxc9:dk8B+1@$*WPa3__|t>hPz|dej^uR[pzz(!|!W-');
define('SECURE_AUTH_KEY',  ';ex$^Avgb9xg3W1atI,}Kmd7m`q++4SMII-6P]-({(VX{.>i#wx`U0nB@|*+@sPi');
define('LOGGED_IN_KEY',    'TOVfzg%6BwLRBQ>7Ot{:9$|G`FqtuR5Hp|nkG>C:.I80+x@YxkG{-v2N0Q0hpBpM');
define('NONCE_KEY',        '20I@?T=[aD`Q 7:vt)DX@WZc3cUn).oV9=-13^x%dm@n+m2*DpgAL-xVHZ+p!8Rc');
define('AUTH_SALT',        '[ZDh7I1P&!S+sH8p,01^6QYG=:s$V}KXM4|kE#R<Au^bc`V%DvXi))f_;*K5}-*M');
define('SECURE_AUTH_SALT', 'N.<;V[dLua;=BJB*dh8^^;_NDQ:X*)6V6/yr<B(.yetNo|U,k-:0e^YV9G;FOM.]');
define('LOGGED_IN_SALT',   '1<)$5|*}j0]&Jvz{x/f@MuEPPjUZiAmB,b~1I;s7Mc,*dW|cK?<rn{b0+Yn3pIUU');
define('NONCE_SALT',       'h& sWz&Qv0|w|K]&+Rz27:T9:,P47-C`r+^;|zt09z+;[pG(KkT-N2wAhuNp)j9N');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
