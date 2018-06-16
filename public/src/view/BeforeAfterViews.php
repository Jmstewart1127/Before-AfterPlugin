<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 6/10/18
 * Time: 5:17 PM
 */

class BeforeAfterViews
{
    public function get_before_after_gallery($images)
    {
        ?>
        <div class="flex-row">
        <?php foreach ($images as $image) { ?>
        <div class="flex-column">
            <div id="twentytwenty1" class="twentytwenty-container">
                <img class="flex-column" src="<?php echo $image['before_url']; ?>" style=""/>
                <img class="flex-column" src="<?php echo $image['after_url']; ?>"/>
            </div>
        </div>
    <?php } ?>
        <script>
            $(window).on("load", function () {
                $("#twentytwenty1").twentytwenty();
            });
            $(function () {
                $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.7});
                $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({
                    default_offset_pct: 0.3,
                    orientation: 'vertical'
                });
            });
        </script>
        </div><?php
    }
}
