<div>
	<form action="">
		<textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
	</form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>