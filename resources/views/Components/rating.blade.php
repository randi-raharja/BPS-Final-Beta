<div class="rating  items-center">
    <input disabled type="radio" {{ $rating == 1 ? 'checked' : '' }} name="rating-{{ $id }}" 
        class="mask mask-star" />
    <input disabled type="radio" {{ $rating == 2 ? 'checked' : '' }} name="rating-{{ $id }}" 
        class="mask mask-star" />
    <input disabled type="radio" {{ $rating == 3 ? 'checked' : '' }} name="rating-{{ $id }}" 
        class="mask mask-star" />
    <input disabled type="radio" {{ $rating == 4 ? 'checked' : '' }} name="rating-{{ $id }}" 
        class="mask mask-star" />
    <input disabled type="radio" {{ $rating == 5 ? 'checked' : '' }} name="rating-{{ $id }}" 
        class="mask mask-star" />
</div>
