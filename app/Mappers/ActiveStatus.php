<?php

namespace App\Mappers;


class ActiveStatus
{
    const IN_ACTIVE = 0;
    const ACTIVE = 1;

    public static function handle($status = ActiveStatus::IN_ACTIVE)
    {
        switch($status) {
            case static::IN_ACTIVE:
                return "In Active";
            case static::ACTIVE:
                return "Active";
            default:
                return "";
        }
    }
}
