<section class="py-5 bg-light">
    @php
        $category = \App\Models\Category::where('name', 'news')->first();

        // ক্যাটাগরির পোস্ট থেকে প্রথমটি নাও, যদি থাকে
        $post = null;
        if ($category) {
            $post = \App\Models\Post::where('category_id', $category->id)
                ->where('status', 1) // Active পোস্ট হলে
                ->first();
        }
    @endphp

    <div class="container">
        <h1 class="text-center mb-4 fw-bold">About Us</h1>

        @if($post)
        <div class="row align-items-center">
            <!-- ইমেজ -->
            <div class="col-md-5 mb-3 mb-md-0">
                <img src="{{ asset('uploads/posts/'.$post->featured_image) }}" 
                     alt="{{ $post->title }}" 
                     class="img-fluid rounded shadow-sm">
            </div>

            <!-- কনটেন্ট -->
            <div class="col-md-7">
                <h3 class="fw-bold">{{ $post->title }}</h3>
                <p class="text-muted">{!! nl2br(e($post->content)) !!}</p>
            </div>
        </div>
        @else
        <p class="text-center text-danger">Sorry, no about content available.</p>
        @endif
    </div>
</section>
