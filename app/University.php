<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use Notifiable;
    protected $guarded = ['id'];
}
