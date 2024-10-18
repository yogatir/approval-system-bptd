<?php

if (!function_exists('getStatusClass')) {
    function getStatusClass($status)
    {
        return match ($status) {
            0 => ['Menunggu Proses', 'bg-gray-300'],
            1 => ['Dalam Proses', 'bg-orange-300'],
            2 => ['Disetujui', 'bg-green-300'],
            3 => ['Ditolak', 'bg-red-300'],
            default => ['Unknown', 'bg-gray-300'],
        };
    }
}
