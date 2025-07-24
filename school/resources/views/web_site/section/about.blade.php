<section>
 
@php
   $category = \App\Models\Category::where('name', 'news')->first();

    // ক্যাটাগরির পোস্ট থেকে প্রথমটি নাও, যদি থাকে
    $post = null;
    if ($category) {
        $post = \App\Models\Post::where('category_id', $category->id)
            ->where('status', 1)   // Active পোস্ট হলে
            ->first();
    }
@endphp

 
    <div class="container">
        <h1>About Us</h1>

        @if($post)
            <h3>{{ $post->title }}</h3>
            <p>{!! nl2br(e($post->content)) !!}</p>
        @else
            <p>Sorry, no about content available.</p>
        @endif
    </div>
</section>