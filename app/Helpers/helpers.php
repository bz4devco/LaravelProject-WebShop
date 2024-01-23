<?php

// uses aria

use App\Models\Market\CartItem;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\URL;
// uses aria

/////////////// FUNCTIONS //////////////////

// convert tiemstamp to jalali date
function jalaliDate($date, $format = '%A, %d %B %Y - H:i:s')
{
    return Jalalian::forge($date)->format($format);
}


//////////////////////////////////////////////////////////////////////////////////


// function for check charecters is valid 
function checkToken($token)
{
    $token = trim($token);
    $token = preg_replace('/[^0-9A-Za-z]/', '', $token);
    return $token;
}


//////////////////////////////////////////////////////////////////////////////////

// get category ids for show subset products
function get_category_table_ids($table, $id)
{
    $ids = array();
    $categories = $table::where('parent_id', $id)->get();

    foreach ($categories as $category) {
        $ids[] = $category->id;
        $ids = array_merge($ids, get_category_table_ids($table, $category->id));
    }

    return $ids;
}

//////////////////////////////////////////////////////////////////////////////////

// methods for default image size : 
//     banner (standard banner size)
//     slider (standard main slider size)
//     banner-width (standard fo fix banners 1 column state of width)
//     banner-two-col (standard fo fix banners 2 column state of width)
//     banner-four-col (standard fo fix banners 4 column state of width)
//     avatar (default image for admin and users default avatar image)
//     logo (default image for website logo)

// function for check has file and show otherwise show default image
function hasFileUpload($fileUrl, $method = null)
{

    $result = $fileUrl ? (file_exists(public_path($fileUrl)) ? asset($fileUrl) : null) : null;
    
    if (!$result) {
        switch ($method) {
            case 'banner':
                $result = URL::to('/') .'/defaults/images/banner/default.png';
                break;
            case 'slider':
                $result = URL::to('/') .'/defaults/images/slider/default.png';
                break;
            case 'banner-width':
                $result = URL::to('/') .'/defaults/images/banner/width/default.png';
                break;
            case 'banner-two-col':
                $result = URL::to('/') .'/defaults/images/banner/two-col/default.png';
                break;
            case 'banner-four-col':
                $result = URL::to('/') .'/defaults/images/banner/four-col/default.png';
                break;
            case 'logo':
                $result = URL::to('/') .'/defaults/images/logo/default.png';
                break;
            case 'avatar':
                $result = URL::to('/') .'/defaults/images/avatar/default.png';
                break;
            default:
                $result = URL::to('/') .'/defaults/images/default.png';
        }
    }

    return $result;
}


//////////////////////////////////////////////////////////////////////////////////


// check valid spcialcharecters for requests GET method 
function checkRequest($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//////////////////////////////////////////////////////////////////////////////////

// check text out CKeditor for xss injection
function checkEditorXss($data)
{
    $data = preg_replace('/<script\b[^>]*>(.*?)<\/script>/i', '', $data);
    return $data;
}

//////////////////////////////////////////////////////////////////////////////////

// convert persian numbers to english numbers
function convertPersianToEnglish($number)
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}


//////////////////////////////////////////////////////////////////////////////////


// convert english numbers to persian numbers
function convertEnglishToPersian($number)
{
    $number = str_replace('0', '۰', $number);
    $number = str_replace('1', '۱', $number);
    $number = str_replace('2', '۲', $number);
    $number = str_replace('3', '۳', $number);
    $number = str_replace('4', '۴', $number);
    $number = str_replace('5', '۵', $number);
    $number = str_replace('6', '۶', $number);
    $number = str_replace('7', '۷', $number);
    $number = str_replace('8', '۸', $number);
    $number = str_replace('9', '۹', $number);

    return $number;
}


//////////////////////////////////////////////////////////////////////////////////

// check valid national code input of users
function validateNationalCode($nationalCode)
{

    $nationalCode = trim($nationalCode, ' .');
    $nationalCode = convertPersianToEnglish($nationalCode);
    $babbdedArray = [
        '0000000000',
        '1111111111',
        '2222222222',
        '3333333333',
        '4444444444',
        '5555555555',
        '6666666666',
        '7777777777',
        '8888888888',
        '9999999999'
    ];


    if (empty($nationalCode)) {
        return false;
    } else if (count(str_split($nationalCode)) != 10) {
        return false;
    } else if (in_array($nationalCode, $babbdedArray)) {
        return false;
    } else {
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }

        $divideRemaining = $sum % 11;

        if ($divideRemaining < 2) {
            $lasrDigit = $divideRemaining;
        } else {
            $lasrDigit = 11 - ($divideRemaining);
        }

        if ((int) $nationalCode[9] == $lasrDigit) {
            return true;
        } else {
            return false;
        }
    }
}

//////////////////////////////////////////////////////////////////////////////////

// iteration for index list on admin panel
function iteration($inc, $paginate = null)
{
    return $inc + ($paginate ? ($paginate - 1) * 15  : 0);
}

//////////////////////////////////////////////////////////////////////////////////

// check has product to customer cart
function hasProductToCart($product)
{
    $result = CartItem::where('user_id', auth()->user()->id)->where('product_id', $product)->first();
    return ($result) ? $result->id : null;
}
