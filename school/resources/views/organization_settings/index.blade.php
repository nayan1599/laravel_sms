@extends('layouts.layouts')

@section('content')
<div class="container py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">🏢 Organization Settings</h3>
            <small class="text-muted">Manage school / organization information</small>
        </div>

        @if($setting)
            <a href="{{ route('organization_settings.edit', $setting->id) }}" class="btn btn-primary">
                ✏️ Edit Settings
            </a>
        @else
            <a href="{{ route('organization_settings.create') }}" class="btn btn-success">
                ➕ Create Settings
            </a>
        @endif
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($setting)
    <div class="card shadow-sm border-0">

        {{-- Card Header --}}
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">{{ $setting->organization_name }}</h5>
                <small class="text-muted">{{ $setting->slogan }}</small>
            </div>

            <div class="text-end">
                @if($setting->logo)
                    <img src="{{ asset('storage/'.$setting->logo) }}" class="img-fluid rounded" style="max-height: 60px;">
                @endif
                @if($setting->favicon)
                    <br>
                    <img src="{{ asset('storage/'.$setting->favicon) }}" class="mt-2" style="height: 24px;">
                @endif
            </div>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

            {{-- Basic Info --}}
            <h6 class="fw-bold text-primary mb-3">📌 Basic Information</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Owner Name:</strong> {{ $setting->owner_name }}</p>
                    <p><strong>Established Year:</strong> {{ $setting->established_year }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Trade License:</strong> {{ $setting->trade_license }}</p>
                    <p><strong>VAT Number:</strong> {{ $setting->vat_number }}</p>
                </div>
            </div>

            <hr>

            {{-- Contact Info --}}
            <h6 class="fw-bold text-primary mb-3">📞 Contact Information</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $setting->email }}</p>
                    <p><strong>Phone:</strong> {{ $setting->phone }}</p>
                    <p>
                        <strong>Website:</strong>
                        <a href="{{ $setting->website }}" target="_blank">
                            {{ $setting->website }}
                        </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Address:</strong></p>
                    <p class="text-muted">{{ $setting->address }}</p>
                </div>
            </div>

            <hr>

            {{-- Social Links --}}
            <h6 class="fw-bold text-primary mb-3">🌐 Social Media</h6>
            <div class="d-flex gap-3 flex-wrap">
                @if($setting->facebook_link)
                    <a href="{{ $setting->facebook_link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        Facebook
                    </a>
                @endif

                @if($setting->twitter_link)
                    <a href="{{ $setting->twitter_link }}" target="_blank" class="btn btn-outline-info btn-sm">
                        Twitter
                    </a>
                @endif

                @if($setting->youtube_link)
                    <a href="{{ $setting->youtube_link }}" target="_blank" class="btn btn-outline-danger btn-sm">
                        YouTube
                    </a>
                @endif

                @if($setting->linkedin_link)
                    <a href="{{ $setting->linkedin_link }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                        LinkedIn
                    </a>
                @endif
            </div>

        </div>
    </div>
    @endif

</div>
@endsection
