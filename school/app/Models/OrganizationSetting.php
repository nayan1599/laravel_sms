<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'slogan',
        'address',
        'email',
        'phone',
        'website',
        'logo',
        'favicon',
        'established_year',
        'owner_name',
        'trade_license',
        'vat_number',
        'facebook_link',
        'twitter_link',
        'youtube_link',
        'linkedin_link',
    ];

 
}
