<?php
namespace MatthiasWeb\RealMediaLibrary\rest;
use MatthiasWeb\RealMediaLibrary\base;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); // Avoid direct file request

/**
 * Enables the /reset, /migration, /import and /export REST for admins (manage_options).
 */
class Reset extends base\Base {
    /**
     * Register endpoints.
     */
    public function rest_api_init() {
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/order', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'resetOrder')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/count', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'resetCount')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/slugs', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'resetSlugs')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/relations', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'resetRelations')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/folders', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'resetFolders')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/export', array(
            'methods' => 'GET',
            'callback' => array($this, 'export')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/import', array(
            'methods' => 'POST',
            'callback' => array($this, 'import')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/import/taxonomy', array(
            'methods' => 'POST',
            'callback' => array($this, 'importTaxonomy')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/migration', array(
            'methods' => 'POST',
            'callback' => array($this, 'resetMigration')
        ));
        
        register_rest_route(Service::SERVICE_NAMESPACE, '/reset/debug', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'resetDebug')
        ));
    }
    
    /**
     * @api {delete} /realmedialibrary/v1/reset/order Resets the order of all available folders
     * @apiName ResetOrder
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetOrder($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        \MatthiasWeb\RealMediaLibrary\order\Sortable::delete_all_order();
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {delete} /realmedialibrary/v1/reset/count Resets the count of all available folders
     * @apiName ResetCount
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetCount($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        \MatthiasWeb\RealMediaLibrary\attachment\CountCache::getInstance()->resetCountCache();
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {delete} /realmedialibrary/v1/reset/slugs Resets the slugs of all available folders
     * @apiName ResetSlugs
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetSlugs($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        \MatthiasWeb\RealMediaLibrary\general\Util::getInstance()->resetAllSlugsAndAbsolutePathes("html_entity_decode");
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {delete} /realmedialibrary/v1/reset/relations Resets the relations of all available folders to attachments
     * @apiName ResetRelations
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetRelations($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        global $wpdb;
        $table_posts = $this->getTableName("posts");
        $wpdb->query("DELETE FROM $table_posts");
        \MatthiasWeb\RealMediaLibrary\attachment\CountCache::getInstance()->resetCountCache();
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {delete} /realmedialibrary/v1/reset/folders Deletes all available folders with relations
     * @apiName ResetFolders
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetFolders($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        global $wpdb;
        $table_posts = $this->getTableName("posts");
        $wpdb->query("DELETE FROM $table_posts");
        
        $table_name = $this->getTableName();
        $wpdb->query("DELETE FROM $table_name");
        
        $table_meta = $this->getTableName("meta");
        $wpdb->query("DELETE FROM $table_meta");
        
        \MatthiasWeb\RealMediaLibrary\attachment\CountCache::getInstance()->resetCountCache();
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {get} /realmedialibrary/v1/export Get exported folders as JSON string
     * @apiName Export
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function export($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        return new \WP_REST_Response(json_encode(\MatthiasWeb\RealMediaLibrary\comp\ExImport::getInstance()->getFolders()));
    }
    
    /**
     * @api {post} /realmedialibrary/v1/import Set exported folders as RML folders
     * @apiParam {string} import The JSON import string
     * @apiName Import
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function import($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        $import = urldecode($request->get_param("import"));
        $import = json_decode($import, true);
        \MatthiasWeb\RealMediaLibrary\comp\ExImport::getInstance()->import($import);
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {post} /realmedialibrary/v1/import/taxonomy Import a taxonomy to RML folders with relations to files
     * @apiParam {string} import The JSON import string
     * @apiName ImportTaxonomy
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function importTaxonomy($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        $taxonomy = $request->get_param("taxonomy");
        \MatthiasWeb\RealMediaLibrary\comp\ExImport::getInstance()->importTaxonomy($taxonomy);
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {post} /realmedialibrary/v1/reset/migration Do a upgrade command
     * @apiParam {string} build The migration build number
     * @apiName ImportTaxonomy
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetMigration($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        $build = $request->get_param("build");
        $migration = \MatthiasWeb\RealMediaLibrary\general\Migration::getInstance();
        switch ($build) {
            case "07102016":
                $migration->do_07102016();
                break;
            case "20161229":
                $migration->do_20161229();
                break;
            default:
                break;
        }
        
        return new \WP_REST_Response(true);
    }
    
    /**
     * @api {delete} /realmedialibrary/v1/reset/debug Reset the database log
     * @apiName ResetDebug
     * @apiGroup Reset
     * @apiVersion 1.0.0
     * @apiPermission manage_options
     */
    public function resetDebug($request) {
        $permit = $this->permit();
        if ($permit !== true) {
            return $permit;
        }
        
        global $wpdb;
        $tablename = $this->getTableName("debug");
        $wpdb->query("DELETE FROM $tablename", ARRAY_A);
        return new \WP_REST_Response(true);
    }
    
    /**
     * Permit access to reset functionality.
     * 
     * @returns {boolean|WP_Error}
     */
    private function permit() {
        if (current_user_can('manage_options')) {
            return true;
        }else{
            return new \WP_Error('rest_rml_reset_forbidden', __('Forbidden'), array('status' => 403));
        }
    }
}