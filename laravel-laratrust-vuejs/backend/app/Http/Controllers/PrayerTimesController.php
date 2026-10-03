<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerTimes;
use App\Http\Resources\PrayerTimesResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PrayerTimesController extends Controller
{

    public function index()
    {
        $data = [];

        $city_id_object = DB::connection('prayer_times')->table('default_setting')
            ->select('city_id')
            ->first();
        $city_name_object = DB::connection('prayer_times')->table('city')
            ->select('city_name')
            ->where('city_id', '=', $city_id_object->city_id)
            ->first();
        $data['city_name'] = $city_name_object->city_name;
        $data['prayer_times'] = PrayerTimesResource::collection(PrayerTimes::where([
            'month_number' => Carbon::now()->month,
            'day_number' => Carbon::now()->day,
            'city_id' => $city_id_object->city_id
        ])->get());

        return $data;
    }
}
