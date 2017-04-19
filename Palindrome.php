<?php

/**
 * Created by PhpStorm.
 * User: MeGa
 * E-mail: megasent1@ya.ru
 * Date: 19.04.2017
 * Time: 16:21
 *
 *
 * Class for help detecting palindrome in string.
 */
class Palindrome {
    public function testString($str) {
        $isPalindrome = $this->isPalindrome($str);

        if ($isPalindrome) {
            echo $str . '<br>';
        } else {
            // check for semi palindrome
            if ($semiPalindrome = $this->findLongestPalindrome($str)) {
                echo $semiPalindrome . '<br>';
            } else {
                echo mb_substr($str, 0,1) . '<br>';
            }
        }
    }

    protected function isPalindrome($str) {
        $str = str_replace(' ', '', $str);
        $len = mb_strlen($str);
        $str = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);; // разбиение нужно т.к. с utf-8 строками  возникают всякие неполадки, а тут каждый символ идет как элемент массива
        for ($i = 0; $i < $len; $i++) {
            if (mb_strtolower($str[$i]) != mb_strtolower($str[$len-1-$i]) ) {
                return false;
            }
        }

        return true;
    }

    protected function findLongestPalindrome($str) {
        $words = explode(' ', $str);
        $allPossibleSubstrings = array_filter(array_unique($this->getSubstrings($words)));
        $longest = array(
            'length' => 0,
            'id' => null,
        );
        foreach ($allPossibleSubstrings as $id => $substring) {
            if ($this->isPalindrome($substring)) {
                if ($longest['length'] < mb_strlen($substring)) {
                    $longest['length'] = mb_strlen($substring);
                    $longest['id'] = $id;
                }
            }
        }
        if ($longest['length'] == 0) {
            return false;
        } else {
            return $allPossibleSubstrings[$longest['id']];
        }
    }

    public function getSubstrings($wordsArray, &$substrings = array()) {
        $cnt = count($wordsArray);
        if ($cnt == 0) {
            $substrings[] = $wordsArray[0];
        } else {
            $new0 = array_slice($wordsArray, 0, $cnt-1);
            $new1 = array_slice($wordsArray, 1);
            $substrings[] = implode(' ', $new0);
            $substrings[] = implode(' ', $new1);

            $this->getSubstrings($new1, $substrings);
            $this->getSubstrings($new0, $substrings);

        }

        return $substrings;
    }
}