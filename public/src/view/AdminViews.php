<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 4:49 PM
 */

require_once( plugin_dir_path( __FILE__ ) . '../model/BeforeAfter.php' );

class AdminViews
{
    private $before_after;

    public function __construct()
    {
        $this->before_after = new BeforeAfter();
    }

    public function get_admin_view($images)
    {
        ?>
        <div class="wrap">
        <h1>Before & After</h1>
        <form method="post" action="<?php do_action('save_before_and_after') ?>">
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
                    echo '<td>' . $this->get_image_thumbnail($image) . '</td>';
                    echo '<td><input type="radio" name="before" value="' . $this->get_image_url($image) . '" /></td>';
                    echo '<td>' . $this->get_image_thumbnail($image) . '</td>';
                    echo '<td><input type="radio" name="after" value="' . $this->get_image_url($image) . '" /></td>';
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

    private function get_image_url($image)
    {
        echo '<td>' . $this->before_after->get_image_url($image) . '</td>';
    }
}