@extends('layouts.layouts')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="main-title">🏢 Organization Settings</h2>

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

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($setting)
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-8">
                    <h4 class="fw-bold">{{ $setting->organization_name }}</h4>
                    <p class="text-muted">{{ $setting->slogan }}</p>
                    <p><strong>Owner:</strong> {{ $setting->owner_name }}</p>
                    <p><strong>Established:</strong> {{ $setting->established_year }}</p>
                    <p><strong>Trade License:</strong> {{ $setting->trade_license }}</p>
                    <p><strong>VAT No:</strong> {{ $setting->vat_number }}</p>
                </div>
                <div class="col-md-4 text-end">
                    @if($setting->logo)
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-fluid rounded mb-2" style="max-height: 60px;">
                    @endif
                    <br>
                    @if($setting->favicon)
                        <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" class="img-thumbnail" style="height: 24px;">
                    @endif
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $setting->email }}</p>
                    <p><strong>Phone:</strong> {{ $setting->phone }}</p>
                    <p><strong>Website:</strong> <a href="{{ $setting->website }}" target="_blank">{{ $setting->website }}</a></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Address:</strong><br>{{ $setting->address }}</p>
                </div>
            </div>

            <hr>

            <div>
                <p class="mb-1"><strong>Social Links:</strong></p>
                <ul class="list-inline">
                    @if($setting->facebook_link)
                        <li class="list-inline-item">
                            <a href="{{ $setting->facebook_link }}" target="_blank" class="text-primary">Facebook</a>
                        </li>
                    @endif
                    @if($setting->twitter_link)
                        <li class="list-inline-item">
                            <a href="{{ $setting->twitter_link }}" target="_blank" class="text-info">Twitter</a>
                        </li>
                    @endif
                    @if($setting->youtube_link)
                        <li class="list-inline-item">
                            <a href="{{ $setting->youtube_link }}" target="_blank" class="text-danger">YouTube</a>
                        </li>
                    @endif
                    @if($setting->linkedin_link)
                        <li class="list-inline-item">
                            <a href="{{ $setting->linkedin_link }}" target="_blank" class="text-secondary">LinkedIn</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
