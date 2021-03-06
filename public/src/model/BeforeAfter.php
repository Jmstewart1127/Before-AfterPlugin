<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 4:16 PM
 */

class BeforeAfter
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        register_activation_hook( __FILE__, array($this, 'create_db') );
        add_action( 'save_before_and_after', array($this, 'save_data') );
        $this->create_db();
    }

    private function initialize_jal()
    {
        global $jal_db_version;
        $jal_db_version = '1.0';
    }

    private function create_db()
    {
        $this->initialize_jal();
        global $wpdb;
        global $jal_db_version;

        $table_name = $wpdb->prefix . 'before_after';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		title varchar(55) NOT NULL,
		description varchar(255) NOT NULL,
		before_url varchar(255) DEFAULT '' NOT NULL, 
		after_url varchar(255) DEFAULT '' NOT NULL, 
		PRIMARY KEY  (id)
	) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        add_option( 'jal_db_version', $jal_db_version );
    }

    public function get_all_images()
    {
        $query_images_args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'posts_per_page' => - 1,
        );
        return new WP_Query( $query_images_args );
    }

    public function get_image_url($image)
    {
        return wp_get_attachment_url( $image->ID );
    }

    public function get_image_thumbnail($image)
    {
        return wp_get_attachment_image($image->ID, array('100', '100'), "", array( "class" => "img-responsive" ) );
    }

    private function get_form_data()
    {
        $data = array(
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'before' => $_POST['before'],
            'after' => $_POST['after']
        );
        return $data;
    }

    private function data_isset()
    {
        $all_data = $this->get_form_data();
        foreach ($all_data as $data) {
            if (!isset($data) || empty($data)) {
                return false;
            }
        }
        return true;
    }

    public function save_before_and_after_data()
    {
        global $wpdb;
        $data = $this->get_form_data();
        echo "sup";
        $wpdb->insert(
            'wp_before_after',
            array(
                'time' => current_time( 'mysql' ),
                'title' => $data['title'],
                'description' => $data['description'],
                'before_url' => $data['before'],
                'after_url' => $data['after'],
            )
        );
    }

    public function save_data()
    {
        if ($this->data_isset()) {
            $this->save_before_and_after_data();
        }
    }

    public static function create()
    {
        return new BeforeAfter();
    }
}
