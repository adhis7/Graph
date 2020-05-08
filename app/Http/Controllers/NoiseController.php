<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Noise;

class NoiseController extends Controller
{
    public function payload()
    {
        $noise = Noise::all();
        $result[] = ['DateTime','Payload'];
        foreach ($noise as $key => $value) {
            $string= $value->raw_payload;
            $decrypt = base64_decode($string,false) ;
            $str = ltrim($decrypt);
            $result[++$key] = [$value->time,(int)$str];
            $overview[++$key]=(int)$str;
        }
        $max=max($overview);
        $min=min($overview);
        $avg=array_sum($overview)/count(array_filter($overview));
        return view('noise-payload')
            ->with('graph',json_encode($result), 200, [], JSON_NUMERIC_CHECK)
            ->with('max',$max)->with('min',$min)->with('avg',$avg);
    }
}
