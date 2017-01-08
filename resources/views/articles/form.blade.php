<!-- Title Form Input -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Form Input -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Created_at Form Input -->
<div class="form-group">
    {!! Form::label('created_at', 'Created On:') !!}
    {!! Form::input('date', 'created_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Tag Form Input -->
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}
</div>

<!-- Submit Button Form Input -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['id' => 'tag_list', 'class' => 'btn btn-primary form-control']) !!}
</div>

<!-- Select2 jQuery - Tag Select Box -->
@section('footer')
	<script>
		$('#tag_list').select2({
			placeholder: 'Choose a tag',
			tags: true
		});
	</script>
@endsection