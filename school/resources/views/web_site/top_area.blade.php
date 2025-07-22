<section class="top_area">
    <div class="container">
        @php
        use App\Models\OrganizationSetting;
        $setting = OrganizationSetting::first();
        @endphp
        @if($setting)
        <div class="d-flex justify-content-between align-items-center flex-wrap py-2">
            {{-- Left Side: Social & Email Links --}}
            <div class="p-2 flex-grow-1">
                <ul class="d-flex list-unstyled gap-3 mb-0">
                    <li>
                        <a href="{{ $setting->facebook }}" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $setting->youtube }}" target="_blank" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $setting->email }}" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- Right Side: Email & Phone --}}
            <div class="p-2 d-flex align-items-center gap-4">
                @if($setting->email)
                <div class="d-flex align-items-center">
                    <i class="fas fa-envelope text-primary me-2"></i>
                    <span>{{ $setting->email }}</span>
                </div>
                @endif

                @if($setting->phone)
                <div class="d-flex align-items-center">
                    <i class="fas fa-phone text-success me-2"></i>
                    <span>{{ $setting->phone }}</span>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</section>