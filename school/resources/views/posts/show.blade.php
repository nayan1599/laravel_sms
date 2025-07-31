 
<div class="container py-5">
    <h2 class="fw-bold mb-3">{{ $post->title }}</h2>
    <img src="{{ asset($post->feature_image) }}" 
         alt="{{ $post->title }}" 
         class="img-fluid mb-4 rounded shadow">
    <p>{!! nl2br(e($post->content)) !!}</p>
</div>
 