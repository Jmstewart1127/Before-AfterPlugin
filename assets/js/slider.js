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