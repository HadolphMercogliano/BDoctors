<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'description', 'curriculum_vitae', 'photo', 'address', 'visible'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function stars()
    {
        return $this->belongsToMany(Star::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
     public function getPictureUri() {
      if(!empty($this->photo)) {
        if(Str::startsWith($this->photo, 'http')) return $this->photo; 
        else return url('storage/' . $this->photo);
      }
      else return 'https://www.frosinonecalcio.com/wp-content/uploads/2021/09/default-placeholder.png';
    } 
}