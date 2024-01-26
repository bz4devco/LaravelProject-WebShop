<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Market\OrderItem;
use App\Models\Market\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getData()
    {
        $month = 6;

        $paymentSuccess = Payment::SpanningPayment($month, true);
        $paymentUnSuccess = Payment::SpanningPayment($month, false);

        $labels = $this->getLastMonths($month);
        $value['success'] = $this->checkCount($paymentSuccess->pluck('published'), $month);
        $value['unsuccess'] = $this->checkCount($paymentUnSuccess->pluck('published'), $month);


        return response()->json([
            'labels' => $labels,
            'data' =>  $value['success'],
            'data2' => $value['unsuccess'],
        ]);
    }

    public function getSoldData()
    {
        $month = 6;

        $soldProducts = OrderItem::SpanningSoldProducts($month);

        $labels = $this->getLastMonths($month);
        $value['success'] = $this->checkCount($soldProducts->pluck('sold'), $month);


        return response()->json([
            'labels' => $labels,
            'data' =>  $value['success']
        ]);
    }


    private function getLastMonths($month)
    {
        for($i = 0; $i < $month; $i++){
            $labels[] = jdate(Carbon::now()->subMonths($i))->format('%B');
        }

        return array_reverse($labels);
    }


    private function checkCount($count, $month)
    {
        for($i = 0; $i < $month; $i++){
            $new[$i] = empty($count[$i]) ? 0 : $count[$i];
        }

        return array_reverse($new);
    }
}
