<div class="text-center">
    @if(session()->has('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif @if(session()->has('deleted'))
        <p class="alert alert-danger">{{ session('deleted') }}</p>
    @endif @if(session()->has('edited'))
        <p class="alert alert-success">{{ session('edited') }}</p>
    @endif
</div>
