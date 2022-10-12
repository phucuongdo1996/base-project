<?php

use Illuminate\Http\JsonResponse;

if (! function_exists('returnDataNotFound')) {
    /**
     * Return when no data found.
     *
     * @return JsonResponse|void
     */
    function returnDataNotFound()
    {
        if (request()->ajax()) {
            return response()->json([
                'message' => 'The requested data was not found.'
            ], 404);
        }
        abort(404);
    }
}

if (! function_exists('convertDate')) {
    /**
     * Convert date
     *
     * @param $strDate
     * @param string $format
     * @return false|string
     */
    function convertDate($strDate, string $format = 'Y-m-d')
    {
        return date($format, strtotime($strDate));
    }
}
