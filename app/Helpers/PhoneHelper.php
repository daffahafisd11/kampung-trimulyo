<?php

namespace App\Helpers;

class PhoneHelper
{
    public static function toWhatsApp($phone)
    {
        if (!$phone) return null;

        // Hapus semua karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Kalau diawali 0 → ganti jadi 62
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }
        // Kalau diawali 8 → tambah 62 di depan
        elseif (substr($phone, 0, 1) === '8') {
            $phone = '62' . $phone;
        }

        return $phone;
    }

    public static function waLink($phone, $message = '')
    {
        $phone = self::toWhatsApp($phone);
        if (!$phone) return null;

        $url = 'https://wa.me/' . $phone;

        if ($message) {
            $url .= '?text=' . urlencode($message);
        }

        return $url;
    }
}