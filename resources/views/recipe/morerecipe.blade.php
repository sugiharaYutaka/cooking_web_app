@foreach ($recipePost as $post)
<div class="col-4 my-2 border">
    <p class="h5">{{ $post->title }}</p>

    <a href="{{ url('/recipe/onepost', $post->id) }}">
        <img src="{{ asset('/recipe/image/' . $post->dish_image_filename) }}" class="" style="width:100%;">
    </a>

    <p>{{ $post->description }}</p>

</div>

@endforeach