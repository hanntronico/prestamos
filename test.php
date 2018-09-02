<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CKEditor</title>
		<script src="https://cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
		<script src="assets/js/config.js"></script>
	</head>
	<body>
		<textarea id="editor2"></textarea>
		<script>
			CKEDITOR.replace( 'editor2', {
				customConfig: 'assets/js/config.js'
			});
		</script>
	</body>
</html>