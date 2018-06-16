<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 4:48 PM
 */

require_once( plugin_dir_path( __FILE__ ) . '../model/BeforeAfter.php' );
require_once( plugin_dir_path( __FILE__ ) . '../model/Admin.php' );
require_once( plugin_dir_path( __FILE__ ) . '../view/AdminViews.php' );

class AdminController
{
    private $before_after;
    private $admin_views;

    public function __construct()
    {
        $this->before_after = new BeforeAfter();
        $this->admin_views = new AdminViews();
    }

    public function get_admin_view()
    {
        $this->admin_views->get_admin_view($this->before_after->get_all_images());
    }
}