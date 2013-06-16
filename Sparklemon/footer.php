<?php
if (!isset($sidebar) && !isset($uploadBox)) {
	echo '</div>';
}
if (isset($uploadBox)) {
	/*echo '<div id="upload-box"><h2>Uploader</h2><p></p>
		<form class="upload" action="'.$prefs_sitebase.'/process/upload_item.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file" multiple>
		<button>Upload</button>
		<div>Upload files</div>
	</form>
	<table class="upload_files"></table>
	<table class="download_files"></table>
	<h2>Your Files</h2>
	<ul class="file-list"></ul>
	<a class="accented" href="'.$prefs_sitebase.'/submit.php">Want to submit an item?</a>
	</div>';*/	
}
?>
</div><div id="footer">&copy; <?php echo date("Y"); ?> Spark Lemon. All right reserved.</div>
<ul id="footer-links">
	<li><a href="<?php echo $prefs_sitebase; ?>/about.php">about</a></li>
    <li><a href="<?php echo $prefs_sitebase; ?>/contact">contact</a></li>
</ul>
<?php if ($uploading || isset($uploadBox)) : ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
    <script src="http://sparklemon.com/upload/jquery.fileupload.js"></script>
    <script src="http://sparklemon.com/upload/jquery.fileupload-ui.js"></script>
    <script>
    $(function () {
		loadFileList = function () {
			var url = '/php/get_filelist.php';
			$('.file-list').load(url);
            /* your code after all uplaods have completed */
        };
		loadFileList();
        $('.upload').fileUploadUI({
            uploadTable: $('.upload_files'),
            downloadTable: $('.download_files'),
            buildUploadRow: function (files, index) {
                var file = files[index];
                return $(
                    '<tr>' +
                    '<td>' + file.name + '<\/td>' +
                    '<td class="file_upload_progress"><div><\/div><\/td>' +
                    '<td class="file_upload_cancel">' +
                    '<div class="ui-state-default ui-corner-all ui-state-hover" title="Cancel">' +
                    '<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
                    '<\/div>' +
                    '<\/td>' +
                    '<\/tr>'
                );
            },
            buildDownloadRow: function (file) {
                return $(
                    '<tr><td>' + file.name + '<\/td><\/tr>'
                );
            },
			onComplete: function (event, files, index, xhr, handler) {
				loadFileList();
			}
		});
    });
    </script>
<?php endif; ?>
</body>
</html>