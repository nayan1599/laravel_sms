 <div class="row g-3">
     <div class="col-md-6">
         <label class="form-label">Organization Name <span class="text-danger">*</span></label>
         <input type="text" name="organization_name" class="form-control" value="{{ old('organization_name', $setting->organization_name ?? '') }}" required>
     </div>

     <div class="col-md-6">
         <label class="form-label">Slogan</label>
         <input type="text" name="slogan" class="form-control" value="{{ old('slogan', $setting->slogan ?? '') }}">
     </div>

     <div class="col-md-12">
         <label class="form-label">Address</label>
         <textarea name="address" class="form-control" rows="2">{{ old('address', $setting->address ?? '') }}</textarea>
     </div>

     <div class="col-md-6">
         <label class="form-label">Email</label>
         <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Phone</label>
         <input type="text" name="phone" class="form-control" value="{{ old('phone', $setting->phone ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Website</label>
         <input type="url" name="website" class="form-control" value="{{ old('website', $setting->website ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Established Year</label>
         <input type="text" name="established_year" class="form-control" value="{{ old('established_year', $setting->established_year ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Owner Name</label>
         <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name', $setting->owner_name ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Trade License</label>
         <input type="text" name="trade_license" class="form-control" value="{{ old('trade_license', $setting->trade_license ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">VAT Number</label>
         <input type="text" name="vat_number" class="form-control" value="{{ old('vat_number', $setting->vat_number ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Facebook Link</label>
         <input type="text" name="facebook_link" class="form-control" value="{{ old('facebook_link', $setting->facebook_link ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Twitter Link</label>
         <input type="text" name="twitter_link" class="form-control" value="{{ old('twitter_link', $setting->twitter_link ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">YouTube Link</label>
         <input type="text" name="youtube_link" class="form-control" value="{{ old('youtube_link', $setting->youtube_link ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">LinkedIn Link</label>
         <input type="text" name="linkedin_link" class="form-control" value="{{ old('linkedin_link', $setting->linkedin_link ?? '') }}">
     </div>

     <div class="col-md-6">
         <label class="form-label">Logo (image)</label>
         <input type="file" name="logo" class="form-control">
         @if(isset($setting) && $setting->logo)
         <img src="{{ asset('storage/' . $setting->logo) }}" height="40" class="mt-2 rounded border">
         @endif
     </div>

     <div class="col-md-6">
         <label class="form-label">Favicon (image)</label>
         <input type="file" name="favicon" class="form-control">
         @if(isset($setting) && $setting->favicon)
         <img src="{{ asset('storage/' . $setting->favicon) }}" height="20" class="mt-2 rounded border">
         @endif
     </div>
 </div>