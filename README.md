# Palindrome-UTF8
Find whether inputed string is palindrome ( you could read it from the left to the right same as right-to-left). 
Script does not works with any punctuation symbols. Works for only alphabetic symbols.

I wrote this script for one of my job reviews.

Licensed MIT.


## Methods and outputs
### The main method of the class is ```testString('STRING HERE');```

It will test given string for palindrome. If it so, this function will output full given string. 

#### Example
For given input:
```
$pal->testString('Sum summus mus'); // tests
```
Output:
```
Sum summus mus
```

If the full string is not a palindrome, but it contains a palindromes it will output longest of inner palidnromes.

To do so class uses it's protected method ``` findLongestPalindrome($str); ``` This functions calls another public method ``` getSubstrings($wordsArray);``` which returns all possible substrings for given words array.

**Make sure to filter and preserve only unique values, as the function will return many empty strings and many repeats.**
```
$allPossibleSubstrings = array_filter(array_unique($this->getSubstrings($words)));
```

#### Example
For given input:
```
$pal->testString('Аргентина манит негра раз А роза упала на лапу Азора два три'); // tests
```
Output:
```
А роза упала на лапу Азора
```

If given string does not contains a palindrome this method will output only the first character of string.

#### Example
For given input:
```
$pal->testString('Тестируем не палиндром'); // tests
```
Output:
```
Т
```


### Function that tests given string for palindrome 

``` protected function isPalindrome($str);  ```

Return values :
``` bool (true) ``` if given string is fully a palindrome
``` bool (false) ``` if other

### Function to get all possible substrings from a given words array 

``` public function getSubstrings($wordsArray, &$substrings = array()); ```

Return: 
**NOT UNIQUE AND CONTAINS EMPTY VALUES**
Array of substrings

### Method to find the longest inner palindrome in the string 

``` protected function findLongestPalindrome($str); ```

Return:
String contains only longest found palindrome.

## Setup and using
1. First you need to include class file to the project
```
require_once ('Palindrome.php'); // load class file
```
2. Then set internal encoding to UTF-8.
```
mb_internal_encoding('utf8'); // set encoding for UTF-8
```
3. Create class instance
```
$pal = new Palindrome(); // create new object for palindrome
```
4. Use it

```
$pal->testString("Аргентина манит негра"); // tests
$pal->testString('Sum summus mus'); // tests
$pal->testString('Тестируем не палиндром'); // tests
$pal->testString('Аргентина манит негра раз А роза упала на лапу Азора два три'); // tests
```

Given inputs will output the following:
```
Аргентина манит негра
Sum summus mus
Т
А роза упала на лапу Азора
```
