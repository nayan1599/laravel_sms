
<section class="py-5 bg-light">
    @php
        use App\Models\SchoolCommittee;

        // প্রথম 3টি কমিটি মেম্বার আনো
        $committees = SchoolCommittee::take(3)->get();
    @endphp

    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our School Committee</h2>

        <div class="row">
            @foreach($committees as $member)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm text-center">
                        <img src="{{ asset('storage/'.$member->profile_photo) }}" 
                             class="card-img-top img-fluid" 
                             alt="{{ $member->name }}"
                             style="height:250px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $member->name }}</h5>
                            <p class="text-muted mb-3">{{ $member->designation }}</p>
                            <a href="{{ route('committees.show', $member->id) }}" 
                               class="btn btn-primary btn-sm">
                               See More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
