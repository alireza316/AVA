<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Burger;
use App\Models\Pizza;
use App\Models\Salad;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public $foodNames = [
        'qty-Salad-sezar' => 'Sezar Salad',
        'qty-Salad-shirazi' => 'Shirazi Salad',
        'qty-Pizza-peperoni' => 'Peperoni Pizza',
        'qty-Burger-cheez_burger' => 'Cheese Burger',
        'ext-cheese-cheez_burger' => 'Burger Extra Cheese',
        'ext-beef-cheez_burger' => 'Burger Extra Beef',
        'ext-cheese-peperoni' => 'Pizza Extra Cheese',
        'ext-beef-peperoni' => 'Pizza Extra beef',
    ];

    public function getMenu()
    {
        $data = [];
        $data['Salad'] = Salad::all();
        $data['Burger'] = Burger::all();
        $data['Pizza'] = Pizza::all();

        return view('menu')->with('data', $data);
    }

    public function postMenu(Request $request)
    {
        $data = [];
        foreach ($request->request as $index => $item) {
            if (!is_null($item) && $index != '_token') {
                $data[$index] = $item;
            }
        }

        $returnee = [];
        foreach ($data as $index => $item) {
            if (array_key_exists($index, $this->foodNames)) {
                $returnee[$this->foodNames[$index]] = $item;
            }
        }

        return view('order')->with('data', $returnee);
    }
}
