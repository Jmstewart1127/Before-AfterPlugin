<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/15/18
 * Time: 9:51 PM
 */

require_once( plugin_dir_path( __FILE__ ) . 'BeforeAfter.php' );

class Admin {

    private $before_after;

    public function __construct()
    {
        add_action( 'admin_menu', array($this,'pluginskeleton_menu') );
        $this->before_after = new BeforeAfter();
    }

    public function pluginskeleton_menu()
    {
        add_menu_page( 'Application Users', 'Application Users', 'manage_options',
            'application-users.php',array($this,'application_users_page'));
    }

    public function application_users_page()
    {
        $images = $this->before_after->get_all_images();
        ?>
        <div class="wrap">
        <h1>Before & After</h1>
        <form method="post" action="<?php do_action( 'save_before_and_after' ) ?>">
            <?php settings_fields( 'settings-group' ); ?>
            <?php do_settings_sections( 'settings-group' ); ?>
            <input type="text" name="title" placeholder="Title"><br>
            <input type="text" name="description" placeholder="Description">
            <table class="form-table">
                <tr valign="top">
                    <th>Before</th>
                    <th></th>
                    <th>After</th>
                    <th></th>
                </tr>
                <?php
                foreach ( $images->posts as $image ) {
                    echo '<tr>';
                    $this->get_image_thumbnail($image);
                    $this->get_image_url_before($image);
                    $this->get_image_thumbnail($image);
                    $this->get_image_url_after($image);
                    echo '<tr>';
                }
                ?>
            </table>

            <?php submit_button(); ?>

        </form>
        </div><?php
    }

    private function get_image_thumbnail($image)
    {
        echo '<td>' . $this->before_after->get_image_thumbnail($image) . '</td>';
    }

    private function get_image_url_before($image)
    {
        echo '<td><input type="radio" name="before" value="' . $this->before_after->get_image_url($image) . '" /></td>';
    }

    private function get_image_url_after($image)
    {
        echo '<td><input type="radio" name="after" value="' . $this->before_after->get_image_url($image) . '" /></td>';
    }

}