 @extends('layouts.web')
 @section('title', $post->title)
 @section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-3 my-2">
             @include('web_site.section.sidebar')
         </div>
         <div class="col-md-9 my-2">
             <div class="image_section mb-3">
                 <img src="{{ asset($post->feature_image) }}" alt="{{ $post->title }}" class="img-fluid mb-4">
             </div>
             <h2 class="fw-bold mb-3">{{ $post->title }}</h2>
             <p>{!! nl2br(e($post->content)) !!}</p>
         </div>
     </div>
 </div>
 @endsection