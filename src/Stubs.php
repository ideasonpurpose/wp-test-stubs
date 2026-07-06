<?php

namespace IdeasOnPurpose\WP\Test;

use stdClass;

/**
 * Wrapper class for importing our collected WordPress testing stubs and doubles
 * into the global namespace.
 */
class Stubs
{
    public static function init()
    {
        self::setupGlobals();

        $fixtures = __DIR__ . '/Fixtures';

        require_once "$fixtures/classes.php";
        require_once "$fixtures/classes/WP_Image_Editor.php";
        require_once "$fixtures/classes/WP_List_Table.php";
        require_once "$fixtures/classes/WP_Post_Type.php";
        require_once "$fixtures/classes/WP_REST_Controller.php";
        require_once "$fixtures/classes/WP_REST_Posts_Controller.php";
        require_once "$fixtures/classes/WP_REST_Request.php";
        require_once "$fixtures/classes/WP_REST_Server.php";
        require_once "$fixtures/classes/WP_Taxonomy.php";

        require_once "$fixtures/functions/get_object_taxonomies.php";
        require_once "$fixtures/functions/get_post_type.php";
        require_once "$fixtures/functions/get_post.php";
        require_once "$fixtures/functions/get_posts.php";
        require_once "$fixtures/functions/get_the_terms.php";
        require_once "$fixtures/functions/wp_list_pluck.php";

        require_once "$fixtures/acf.php";
        require_once "$fixtures/assets.php";
        require_once "$fixtures/attachments.php";
        require_once "$fixtures/constants.php";
        require_once "$fixtures/copies.php";
        require_once "$fixtures/hooks.php";
        require_once "$fixtures/i18n.php";
        require_once "$fixtures/is_.php";
        require_once "$fixtures/plugin.php";
        require_once "$fixtures/query_var.php";
        require_once "$fixtures/screen.php";
        require_once "$fixtures/stubs.php";
        require_once "$fixtures/transients.php";
        require_once "$fixtures/urls.php";
    }

    /**
     * Create placeholders for some WordPress global variables.
     */
    public static function setupGlobals()
    {
        global $wp, $wpdb;
        $wp = $wp ?? new stdClass();
        $wpdb = $wpdb ?? new stdClass();
    }

    /**
     * A utility proxy for PHP's native error_log().
     * Proxy this into the calling namespace with something like this:
     *
     *    namespace Test\Namespace;
     *    if (!function_exists(__NAMESPACE__ . '\error_log')) {
     *        function error_log($err)
     *        {
     *            Test\Stubs::error_log($err);
     *        }
     *    }
     */
    public static function error_log($err)
    {
        global $error_log;
        $error_log = "{(string) $error_log}\n{$err}";
    }
}
