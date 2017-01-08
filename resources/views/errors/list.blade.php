<!-- Form Error Message Display -->
@if ($errors->any())
    <!-- Bootstrap Error Classes -->
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif