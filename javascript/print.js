<p class="print_ignore"><input type="button" id="print" value="Print" /></p></div><script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
// updates current settings
if (window.parent.setAll) {
    window.parent.setAll('en', 'utf8_general_ci', '1', 'scoutswaikato', 'scoutmember', 'e8bb5852228bfb4eadcd9892005a82b1');
}
    // set current db, table and sql query in the querywindow
if (window.parent.reload_querywindow) {
    window.parent.reload_querywindow(
        'scoutswaikato',
        'scoutmember',
        '');
}
    
if (window.parent.frame_content) {
    // reset content frame name, as querywindow needs to set a unique name
    // before submitting form data, and navigation frame needs the original name
    if (typeof(window.parent.frame_content.name) != 'undefined'
     && window.parent.frame_content.name != 'frame_content') {
        window.parent.frame_content.name = 'frame_content';
    }
    if (typeof(window.parent.frame_content.id) != 'undefined'
     && window.parent.frame_content.id != 'frame_content') {
        window.parent.frame_content.id = 'frame_content';
    }
    //window.parent.frame_content.setAttribute('name', 'frame_content');
    //window.parent.frame_content.setAttribute('id', 'frame_content');
}
});

//]]>
</script>