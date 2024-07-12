<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";
    protected $fillable = ['key', 'value'];
    protected static $data;

    public static function getValue($key)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : null;
    }

    public static function setValue($key, $value, $force = false)
    {
        $option = self::where('key', $key)->first();
        if ($option) {
            $option->value = $value;
            return $option->save();
        } elseif ($force) {
            $option = new self();
            $option->key = $key;
            $option->value = $value;
            return $option->save();
        }
    }

    public static function getAllKeyValue()
    {
        if (!self::$data) {
            $tmp = self::all();
            $d = [];
            foreach ($tmp as $option) {
                $d[$option->key] = $option->value;
            }
            self::$data = $d;
        }
        return self::$data;
    }
}