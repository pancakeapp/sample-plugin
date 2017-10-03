<?php

class Plugin_Sample_plugin extends Plugin {

    /**
     * Version of the plugin.
     */
    public $version = '1.0.0';

    /**
     * Author of the plugin to be displayed in the admin panel.
     */
    public $author = 'Pancake Payments';

    /**
     * URL for the plugin to be displayed in the admin panel.
     */
    public $url = '';

    /**
     * Identifier for referencing Plugin.
     */
    public $alias = 'sample_plugin';

    /**
     * The name of the plugin that will be displayed.
     */
    public $name = array(
        'en' => "Sample Plugin",
    );

    /**
     * The description of the plugin that will be displayed.
     */
    public $description = array(
        'en' => "<p>This plugin simply creates test frontend and backend controllers, with a test view and a test model. It also includes a sample registered event to let you see how events should work.</p><p>You can access the admin at: yourpancakeurl/admin/sample_plugin/test_module/hello</p><p>And the frontend at: yourpancakeurl/sample_plugin/test_module/hello</p>",
    );

    /**
     * Array of config settings.
     */
    public $config = array(
        'fields' => array(
            /* You can get the value of fields by using `$this->get("test_field");` */
            'test_field' => array(
                'name' => 'test_field',
                'label' => array('en' => 'Test field label'),
                'type' => 'text',
                'default' => '3',
                'value' => '',
                'required' => true,
            ),
        ),
    );

    /**
     * Register events that extend the core functionality of Pancake.
     * This is only called if the plugin is enabled.
     */
    public function register_events() {
        # Hook into a specific event.
        Events::register('test_event', array($this, 'test_handler'));

        # Hook into the cron job (will run every time the cron runs).
        Events::register('cron', array($this, 'cron'));

        # Hook into the generic insert/update/delete events.
        Events::register('model_insert', array($this, 'model_insert'));
        Events::register('model_update', array($this, 'model_update'));
        Events::register('model_delete', array($this, 'model_delete'));

        # Register a new navbar link.
        \Pancake\Navigation::registerNavbarLink("admin/sample_plugin/test_module/hello", "Hello, world!");

        # Register a new Quick Links link with the Calendar icon, for the Projects page.
        \Pancake\Navigation::registerQuickLink("admin/sample_plugin/test_module/hello", "Hello, World!", "admin/projects", "calendar");

        # For more information, check out developer/api_reference/index.html, which comes with your Pancake.
        # It contains a complete description of everything you can do with the Navigation API.
    }

    /**
     * Run the install code for the plugin.
     * Pancake will only run this once per version of the plugin.
     * If it detects a change in the plugin's code, it will re-run it.
     * To avoid problems with code being run twice (and to deal with custom table prefixes),
     * use the following functions:
     * - $this->create_table($table)
     * - $this->drop_table($table)
     * - $this->add_column($table, $name, $type, $constraint = null, $default = '', $null = false, $after_field = '', $on_after_create = null)
     * - $this->drop_column($table, $column)
     * - $this->add_relationship_column($table, $column, $rel_table, $rel_column = "id", $type = "unsigned_int", $constraint = 11, $on_update = "cascade", $on_delete = "restrict")
     * - $this->drop_relationship_column($table, $column)
     * Those are idempotent functions, which means they can be called repeatedly,
     * and they'll handle it without causing problems.
     */
    public function install() {
        $this->create_table("test");
        $this->drop_table("test");
    }

    public function test_handler($data) {
        debug($data); # This clears the output buffer, outputs all the contents of data in a easy-to-read way, and dies.

        $processed_data = "test customized data";
        return $processed_data;
    }

    public function cron() {
        # Do whatever you want to do during the cron job's execution.
    }

    public function model_insert($args) {
        /** @var Invoice_m $model */
        $model = $args['model'];

        /** @var array $data */
        $data = $args['data'];

        /** @var int $id */
        $id = $args['primary_key'];

        if (get_class($model) == "Invoice_m") {
            # An invoice was created.
            # The invoice's data is in $data.

            # You can access external resources with cURL, or you can use Guzzle.
        }
    }

    public function model_update($args) {
        /** @var Invoice_m $model */
        $model = $args['model'];

        /** @var array $previous */
        $previous = $args['previous'];

        /** @var array $data */
        $data = $args['data'];

        /** @var int $id */
        $id = $args['primary_key'];

        if (get_class($model) == "Invoice_m") {
            # An invoice was edited.
            # The invoice's data after the edit is in $data.
            # The invoice's data before the edit is in $previous.

            # You can access external resources with cURL, or you can use Guzzle.
        }
    }

    public function model_delete($args) {
        /** @var Invoice_m $model */
        $model = $args['model'];

        /** @var int $id */
        $id = $args['primary_key'];

        if (get_class($model) == "Invoice_m") {
            # An invoice was deleted.
            # The invoice's ID is $id.

            # You can access external resources with cURL, or you can use Guzzle.
        }
    }
}
