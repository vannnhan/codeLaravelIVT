<div class="form-group">
	<label for="{{ 'name' }}">Name</label>
	<div class="form-controls">
		<input type="text" name="name" value="{{ isset($breed) ? $breed->name : "" }}" class="form-control">
	</div>
</div>