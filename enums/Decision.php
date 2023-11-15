<?php
namespace app\enums;

enum Decision: string
{
    case APPROVED = 'approved';
    case DECLINED = 'declined';
}