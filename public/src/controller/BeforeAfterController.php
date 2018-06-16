<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 4:42 PM
 */

class BeforeAfterController
{
    private $before_after;
    private $before_after_views;

    public function __construct()
    {
        $this->before_after = new BeforeAfter();
        $this->before_after_views = new BeforeAfterViews();
        $this->includes();
        $this->add_actions();
    }

    private function includes()
    {
        require_once( plugin_dir_path( __FILE__ ) . '../model/BeforeAfter.php' );
        require_once( plugin_dir_path( __FILE__ ) . '../view/BeforeAfterViews.php' );
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