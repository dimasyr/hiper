<?php
/**
 * Created by PhpStorm.
 * User: Yusuf
 * Date: 13/08/2018
 * Time: 11.58
 */

use Carbon\Carbon;

if (!function_exists('getHariFromCarbon')) {
    /**
     * Mendapatkan nama hari dari object carbon
     *
     * @param \Carbon\Carbon $carbon
     * @return string
     */
    function getHariFromCarbon($carbon)
    {
        $daftarHari = [
            'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
        ];

        return $daftarHari[$carbon->dayOfWeek];
    }
}

if (!function_exists('getBulanFromCarbon')) {
    /**
     * Mendapatkan nama bulan dari object carbon
     *
     * @param \Carbon\carbon $carbon
     * @return string
     */
    function getBulanFromCarbon($carbon)
    {
        $daftarBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return $daftarBulan[$carbon->month - 1];
    }
}

if (!function_exists('zeroPrefix')) {
    /**
     * Memberi tambahan 0 pada angka yang lebih kecil dari 10
     *
     * @param int $number
     * @return string
     */
    function zeroPrefix($number)
    {
        if ($number < 10)
            return '0' . $number;

        return $number;
    }
}

if (!function_exists('formatDate')) {
    /**
     * Melakukan formatting tanggal
     *
     * @param Carbon $carbon
     * @return string
     */
    function formatDate(Carbon $carbon, $namaHari = false, $jam = true, $splitterHari = ', ') {
        return ($namaHari ? getHariFromCarbon($carbon).$splitterHari : '') . $carbon->day . ' ' . getBulanFromCarbon($carbon) . ' ' . $carbon->year . ($jam ? ', ' . zeroPrefix($carbon->hour) . ':' . zeroPrefix($carbon->minute) : '');
    }

}