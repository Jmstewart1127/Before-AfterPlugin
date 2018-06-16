<?php
/**
 * TwentyTwenty
 *
 * Allows you to show before-and-after images in your blog, with an interactive slider. Uses TwentyTwenty by Zurb.
 *
 * @package   TwentyTwenty
 * @author    Corey Martin <coreym@gmail.com>
 * @license   GPL-2.0+
 * @link      http://wordpress.org/plugins
 * @copyright Plugin (c) Corey Martin, TwentyTwenty (c) ZURB
 *
 * @wordpress-plugin
 * Plugin Name:       Before & After
 * Plugin URI:        http://wordpress.org/plugins
 * Description:       Allows you to show before-and-after images in your blog, with an interactive slider. Uses TwentyTwenty by Zurb.
 * Version:           1.0
 * Author:            Jake
 * Author URI:
 * Text Domain:       twentytwenty
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI:
 */
class TwentyTwenty
{
    public function __construct()
    {
        echo plugin_dir_path( __FILE__ );
        $this->init();
    }

    private function init()
    {
        require_once( plugin_dir_path( __FILE__ ) . 'public/Main.php' );
        require_once( plugin_dir_path( __FILE__ ) . 'public/src/model/Admin.php' );
        require_once( plugin_dir_path( __FILE__ ) . 'public/src/model/BeforeAfter.php' );
        require_once( plugin_dir_path( __FILE__ ) . 'public/src/controller/AdminController.php' );
        $this->addActions();
        $this->getAdminMenu();

    }

    private function getAdminMenu()
    {
        return new Admin();
    }

    public static function test()
    {
        return new TwentyTwenty();
    }

    private function addActions()
    {
        add_action( 'inti', 'test' );
    }
}

TwentyTwenty::test();