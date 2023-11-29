<?php

namespace App\Traits;

use App\Models\TrackSql;

trait Track
{

    public static function insertSql($table, $values)
    {
        $table = $table->getTable();
        $values = self::stringValues($values);
        $str = "INSERT INTO $table ($values[key]) VALUES ($values[val])";
        return static::createTrack($str);
    }

    public static function stringValues($values)
    {

        $count = 1;
        $stringVal = '';
        $stringKeys = [];

        foreach ($values as $val) {
            if ($count < count($values)) {
                $and = ',';
                $count++;
            } else {
                $and = '';
            }
            $stringVal .= "'$val'$and";
        }
        $stringKeys = implode(', ', array_keys($values));

        return [
            'val' => $stringVal,
            'key' => $stringKeys
        ];
    }
    public static function stringClause($clause)
    {
        $count = 1;
        $stringClause = '';
        foreach ($clause as $cls) {
            if ($count < count($clause)) {
                $and = ' AND ';
                $count++;
            } else {
                $and = '';
            }
            $keyClasue = array_keys($clause, $cls, true);
            $stringClause .= "$keyClasue[0]" . '=' . "'$cls'" . $and;
        }

        return $stringClause;
    }

    public static function deleteSql($table, $clause)
    {
        $table = $table->getTable();
        $stringClause = self::stringClause($clause);
        $str = "DELETE FROM $table WHERE $stringClause";
        return static::createTrack($str);
    }
    public static function updateSql($table, $values, $clause)
    {
        $table = $table->getTable();
        $keys = [];
        foreach ($values as $vals => $index) {
            $keys[] = "$vals='$index'";
        }
        $stringKeys = implode(",", $keys);
        $stringClause = self::stringClause($clause);
        $str =  "UPDATE $table SET $stringKeys WHERE $stringClause";
        return static::createTrack($str);
    }

    protected static function createTrack($sql)
    {
        $data = [
            'tanggal' => date('Y-m-d H:i:s'),
            'sqle' => $sql,
            'usere' => session()->get('pegawai')->nik,
        ];
        try {
            $result = TrackSql::create($data);
        } catch (\Illuminate\Database\QueryException $e) {
            $result = $e->errorInfo;
        }

        return $result;
    }
}
