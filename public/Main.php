<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 3:41 PM
 */
require_once 'src/model/BeforeAfter.php';
require_once 'src/model/Admin.php';

class Main
{
    public function __construct()
    {
        add_action('save_before_and_after', 'save_data');
        add_action('insert_before_and_after', 'save_before_and_after_data');
        $this->enqueue_styles();
        $this->enqueue_scripts();
        new BeforeAfter();
        new Admin();
    }

    private function enqueue_styles()
    {
        wp_enqueue_style( 'foundation-css',  plugins_url('assets/css/foundation.css',__FILE__) , false );
        wp_enqueue_style( 'twentytwenty-css',  plugins_url('assets/css/twentytwenty.css',__FILE__) , false );
        wp_enqueue_style( 'foundation-nocompass-css',  plugins_url('assets/css/twentytwenty-no-compass.css',__FILE__) , false );
    }

    private function enqueue_scripts()
    {
        wp_register_script( 'jquery-event-move', plugins_url( 'assets/js/jquery.event.move.js', __FILE__ ), array( 'jquery' ), null );
        wp_register_script( 'jquery-twentytwenty', plugins_url( 'assets/js/jquery.twentytwenty.js', __FILE__ ), array( 'jquery' ), null );
    }

}