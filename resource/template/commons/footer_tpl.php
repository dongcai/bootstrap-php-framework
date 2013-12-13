<?php
/**
 * the variable required in footer_tpl.php are:
 * $config @array 
 * 
 */
?>
<!-- Footer
        ================================================== -->
<footer class="bs-footer">
    <div class="container">
        Power by Bootstrap
    </div>
</footer>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo ASSETS_URL ?>/js/bootstrap.js"></script> 
<script src="<?php echo ASSETS_URL ?>/js/footable.js"></script>


<script src="<?php echo ASSETS_URL ?>/js/custom.js"></script>
<?php
//admin_mode is for edit form, so should not have this save link, which is for ajax (inline mode)
if ($this->get('isAdmin') && !$this->get('admin_mode')) {
    ?>
    <script src="<?php echo ASSETS_URL ?>/js/ckeditor/ckeditor.js"></script>
    <script>
        // <![CDATA[
        $('.click2save').click(function() {
            var summary = CKEDITOR.instances.cbwsummary.getData();
            var content = CKEDITOR.instances.cbwarticle.getData();
            var alias = $(this).attr('name');
            var table = $(this).attr('id');
            $.post('/admin/save.php', {
                'summary': summary,
                'content': content,
                'alias': alias,
                'table': table
            }, function(d) {
                alert(d);
            })
        });
        // ]]>
    </script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //CKEDITOR.replace('content');
    </script>

<?php } ?>

</body>
</html>

