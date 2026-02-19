<?php
// Function to reverse a string safely
function reverseString($str) {
    // Ensure the input is a string
    if (!is_string($str)) {
        throw new InvalidArgumentException("Input must be a string.");
    }

    // Use strrev for simple ASCII strings
    return strrev($str);
}

// Function to reverse a string with multibyte (UTF-8) support
function reverseStringUTF8($str) {
    if (!is_string($str)) {
        throw new InvalidArgumentException("Input must be a string.");
    }

    // Split into array of characters considering UTF-8 encoding
    $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
    return implode('', array_reverse($chars));
}

// Example usage
try {
    $input = "Hello World!"; // You can change this
    echo "Original: " . $input . PHP_EOL;
    echo "Reversed (ASCII): " . reverseString($input) . PHP_EOL;

    // Example with UTF-8 characters
    $utf8Input = "Bonjour 🌍";
    echo "Original UTF-8: " . $utf8Input . PHP_EOL;
    echo "Reversed (UTF-8): " . reverseStringUTF8($utf8Input) . PHP_EOL;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!-- Explanation


strrev()

Fast and built-in for reversing ASCII strings.
Not safe for multibyte characters (e.g., emojis, accented letters).



UTF-8 Safe Reversal

Uses preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY) to split into Unicode characters.
Works correctly with emojis, accented letters, and non-Latin scripts.



Error Handling

Throws an exception if the input is not a string.




✅ Example Output
Original: Hello World!
Reversed (ASCII): !dlroW olleH
Original UTF-8: Bonjour 🌍
Reversed (UTF-8): 🌍 ruojnoB


If you want, I can also give you a one-line PHP reverse string script for quick use in the terminal or browser.
Do you want me to prepare that?
 -->