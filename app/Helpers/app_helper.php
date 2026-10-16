<?php

if (!function_exists('format_date')) {
    function format_date($date, $format = 'dd/MM/yyyy')
    {
        if (empty($date) || $date === '0000-00-00') return '-';
        $timestamp = strtotime($date);
        $map = [
            'dd/MM/yyyy' => 'd/m/Y',
            'yyyy-MM-dd' => 'Y-m-d',
            'dd MMM yyyy' => 'd M Y',
        ];
        $phpFormat = $map[$format] ?? $format;
        return date($phpFormat, $timestamp);
    }
}

if (!function_exists('calculate_age')) {
    function calculate_age($birthDate)
    {
        if (empty($birthDate)) return 0;
        $birth = new DateTime($birthDate);
        $today = new DateTime();
        return $birth->diff($today)->y;
    }
}

if (!function_exists('gender_label')) {
    function gender_label($gender)
    {
        return $gender === 'M' ? 'Mane' : 'Feto';
    }
}

if (!function_exists('status_badge')) {
    function status_badge($status, $type = 'active')
    {
        $colors = [
            'active' => 'success',
            'inactive' => 'secondary',
            'pending' => 'warning',
            'verified' => 'info',
            'not_verified' => 'danger',
        ];
        $color = $colors[$type] ?? 'secondary';
        return '<span class="badge badge-' . $color . '">' . $status . '</span>';
    }
}

if (!function_exists('generate_nik')) {
    function generate_nik()
    {
        return date('Ymd') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('get_age_group')) {
    function get_age_group($age)
    {
        if ($age <= 5) return '0-5';
        if ($age <= 12) return '6-12';
        if ($age <= 17) return '13-17';
        if ($age <= 25) return '18-25';
        if ($age <= 35) return '26-35';
        if ($age <= 50) return '36-50';
        return '50+';
    }
}
