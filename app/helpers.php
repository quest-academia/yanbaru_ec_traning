<?php
if (! function_exists('formatDate')) {
    /**
     * 日付の文字列を/区切りにする関数
     *
     * @param string $date 2020-12-08 00:10:13
     * @return string
     */
    function formatDate($date)
    {
        $slashDate = '';
        if ($date) {
            $year  = substr($date, 0, 4);
            $month = substr($date, 5, 2);
            $day   = substr($date, 8, 2);
            $slashDate = $year . '/' . $month . '/' . $day;
        }
        return $slashDate;
    }
}

if (! function_exists('formatPostal')) {
    /**
     * 日付の文字列を/区切りにする関数
     *
     * @param string $zip
     * @return string
     */
    function formatPostal($zip)
    {
        $postalCode = '';
        $pattern = '-';// 検索対象
        $zip = mb_convert_kana($zip, 'a', 'UTF-8');
        // 入力文字列（郵便番号）にハイフンが含まれているか
        $pos = strpos($zip, $pattern);
        // ハイフンが無かったらハイフンを挿入する
        if ($pos === false) {
            $postalCode = substr_replace($zip, $pattern, 3, 0);
        }
        return $postalCode;
    }
}
