<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetOptimalCoutOfBox extends Controller
{
    public function __invoke(Request $request)
    {
        $countOfProduct = $request->input('products');
        $arrayWithRandomBoxes = array(rand(1, 15), rand(1, 15), rand(1, 15));
        rsort($arrayWithRandomBoxes);
        $countMaxBox = $countOfProduct / $arrayWithRandomBoxes[0];
        $remainder1 = $countOfProduct % $arrayWithRandomBoxes[0];

        $countMiddleBox = $remainder1 / $arrayWithRandomBoxes[1];
        $remainder2 = $remainder1 % $arrayWithRandomBoxes[1];

        $countMinBox = $remainder2 / $arrayWithRandomBoxes[2];
        if ($remainder2 % $arrayWithRandomBoxes[2] != 0) {
            $countMinBox++;
        }
        $arrayWithCountOfBox = [
            'Больших коробок с количеством ' . $arrayWithRandomBoxes[0]. ' продуктов получилось ' . floor($countMaxBox),
            'Средних коробок с количеством ' . $arrayWithRandomBoxes[1] . ' продуктов получилось ' . floor($countMiddleBox),
            'Маленьких коробок с количеством ' . $arrayWithRandomBoxes[2]. ' продуктов получилось ' . floor($countMinBox),
        ];
        return view('getCountOfBoxes', compact('arrayWithCountOfBox'));
    }
}
