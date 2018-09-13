<div class="form-group">
	<label for="{{ 'name' }}">Name</label>
	<div class="form-controls">
		<input type="text" name="name" value="{{ isset($cat) ? $cat->name : "" }}" class="form-control">
	</div>
</div>
<div class="form-group">
	<label for="{{ 'dob' }}">Date_of_birth</label>
	<div class="form-controls">
		<input type="text" name="dob" value="{{ isset($cat) ? $cat->dob : "" }}" class="form-control datepicker">
	</div>
</div>
<div class="form-group">
	<label for="{{ 'breed_id' }}">Breed</label>
	<div class="form-controls">
		<select name="breed_id" class="form-control">
			@foreach($Breeds as $breed_id =>$breed_name)
			<option value="{{$breed_id}}" 
				 @if(old('breed_id', isset($cat) ? $cat->breed_id : '') == $breed_id) 
					selected="selected"
				@endif
				{{-- @if (isset($cat) ? $cat->breed_id : (isset('breed_id') ? breed_id : '') == $breed_id) 
				selected="selected" 
				@endif  --}}
			> {{$breed_name}}</option>
			@endforeach
		</select>
		
	</div>
</div>