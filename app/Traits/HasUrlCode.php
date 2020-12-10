<?php

namespace App\Traits;

use App\Urlcode;

trait HasUrlCode{
	public function addCode(){
		$urlcode = new Urlcode(['codable_type' => static::class, 'codable_id' => $this->id]);
		do{
			$code = substr(base64_encode(sha1(mt_rand())), 0, 6);
		}
		while(Urlcode::where(['code' => $code, 'codable_type' => $urlcode->codable_type, 'codable_id' => $urlcode->codable_id])->first());
		$urlcode->code = $code;
		$urlcode -> save();
	}

	public static function findByCode($code)
    {
        $urlcode = Urlcode::where('code', $code)->first();
        if(!$urlcode || $urlcode->codable_type != static::class){
            return null;
        }
        return self::find($urlcode->codable_id);
    }
}