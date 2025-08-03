
<aside class="sidebar bg-light p-4">
    <h3 class="fw-bold mb-4">Sidebar</h3>
    @php
        // Fetch related posts, categories, and archives for the sidebar
        $relatedPosts = App\Models\Post::where('id', '!=', $post->id)->take(5)->get();
        $categories = App\Models\Category::all();
        $archives = App\Models\Post::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();
    @endphp

    <div class="sidebar_section">
        <h4 class="fw-bold">Search</h4>
        
    </div>
    <div class="sidebar_section">
        <h4 class="fw-bold">Recent Posts</h4>
        <ul class="list-unstyled">
            @foreach($relatedPosts as $relatedPost)
                <li>
                    <a href="{{ route('posts.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar_section">
        <h4 class="fw-bold">Categories</h4>
        <ul class="list-unstyled">
            @foreach($categories as $category)
                <li>        
                    <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('categories.index') }}">View All Categories</a>
            </li>
        </ul>
    </div>
    <div class="sidebar_section">
        <h4 class="fw-bold">Archives</h4>
        
    </div>
</aside>