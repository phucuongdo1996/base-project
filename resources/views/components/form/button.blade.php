<button id="{{ $attributes['id'] ?? "" }}" type="button" class="btn btn-primary btn-common {{ $attributes['class'] ?? "" }}">
    {{ $slot }}
</button>
