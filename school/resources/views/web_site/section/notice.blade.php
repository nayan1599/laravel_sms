<section class="py-5 bg-light">
    @php
        use App\Models\Notice;
        // নতুন নোটিশের মধ্যে থেকে সর্বশেষ 2টি আনো
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
    @endphp

    <div class="container">
        <h2 class="text-center fw-bold mb-4">Latest Notices</h2>

        @if($notices->count() > 0)
        <div class="row">
            @foreach($notices as $notice)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="row g-0">
                        <!-- ✅ ইমেজ কলাম -->
                        <div class="col-md-4">
                            @if($notice->image && file_exists(public_path($notice->image)))
                                <img src="{{ asset($notice->image) }}" 
                                     alt="{{ $notice->title }}" 
                                     class="img-fluid rounded-start"
                                     style="height: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" 
                                     alt="No Image" 
                                     class="img-fluid rounded-start"
                                     style="height: 100%; object-fit: cover;">
                            @endif
                        </div>

                        <!-- ✅ কনটেন্ট কলাম -->
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="fw-bold">{{ $notice->title }}</h5>
                                <p class="text-muted mb-2">
                                    <small>
                                        <i class="bi bi-calendar"></i> 
                                        {{ $notice->created_at->format('d M, Y') }}
                                    </small>
                                </p>
                                <p>{{ Str::limit(strip_tags($notice->description), 100, '...') }}</p>
                                <a href="{{ route('notices.show', $notice->id) }}" class="btn btn-primary btn-sm">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-danger">No new notices available.</p>
        @endif

        <!-- ✅ See All Notices Button -->
        <div class="text-center mt-3">
            <a href="{{ route('notices.index') }}" class="btn btn-outline-primary">
                See All Notices
            </a>
        </div>
    </div>
</section>
