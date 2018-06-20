<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 4:42 PM
 */

require_once( plugin_dir_path( __FILE__ ) . '../model/BeforeAfter.php' );
require_once( plugin_dir_path( __FILE__ ) . '../view/BeforeAfterViews.php' );

class BeforeAfterController
{
    private $before_after_views;
    private $before_after;

    public function __construct()
    {
        $this->before_after_views = new BeforeAfterViews();
        $this->before_after = new BeforeAfter();
        $this->add_actions();
    }

    private function add_actions()
    {
        add_action( 'display_gallery', array($this, 'display_gallery') );
    }

    public function display_gallery()
    {
        $this->before_after_views->get_before_after_gallery($this->before_after->get_all_images());
    }
}