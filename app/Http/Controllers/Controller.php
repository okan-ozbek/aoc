<?php

namespace App\Http\Controllers;

use App\AOC\TwentyThree\code\Days\One;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private static function getDays(): array
    {
        $days = [];
        $dayClasses = glob(app_path('AOC/TwentyThree/code/Days/*.php'));
        foreach ($dayClasses as $dayClass) {
            $dayClass = str_replace('.php', '', $dayClass);
            $dayClass = str_replace(app_path('AOC/TwentyThree/code/Days/'), '', $dayClass);
            $dayClass = 'App\\AOC\\TwentyThree\\code\\Days\\' . $dayClass;
            $days[] = new $dayClass();
        }
        return $days;
    }

    public function dashboard()
    {
        $days = self::getDays();

        return view('dashboard',
        [
            'days' => $days
        ]
        );
    }

    public function day()
    {
        return view(
            'view',
            [
                'day' => new One()
            ]
        );
    }
}
