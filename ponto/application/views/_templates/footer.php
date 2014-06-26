        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo URL; ?>public/js/jquery-1.10.2.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.uploadify.min.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo URL; ?>public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- Page-Level Plugin Scripts - Dashboard 
    <script src="<?php echo URL; ?>public/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo URL; ?>public/js/plugins/morris/morris.js"></script>
   	-->
    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo URL; ?>public/js/sb-admin.js"></script>
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference 
    <script src="<?php echo URL; ?>public/js/demo/dashboard-demo.js"></script>
    -->
    <script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : '<?php echo URL; ?>public/swf/uploadify.swf',
				'uploader' : '<?php echo URL; ?>public/uploadify.php'
			});
		});
	</script>
</body>
</html>