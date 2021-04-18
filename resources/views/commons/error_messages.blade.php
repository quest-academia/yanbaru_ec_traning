<!-- @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
    </ul>

@endif
-->

@if ($errors->any())
    <div class="card-text text-left alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
