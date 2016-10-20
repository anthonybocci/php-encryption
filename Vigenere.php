<?php

namespace AnthonyBocci\Encryption;

/**
 * @class Vigenere
 * Encrypt or Decrypt a text using Vigenere algorithm
 */
class Vigenere
{

    private $key;

    /**
     * Constructor
     * @param string $key The key, used to crypt/decrypt
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Generate a key that has the right length to encrypt/decrypt a text
     * @param  int $resultLength The result key's length
     * @return string            The generated key
     */
    private function generateKey($resultLength)
    {
        $keyLength = strlen($this->key);
        $charMissing = $resultLength - $keyLength;
        //If key is long enough, keep it
        if ($charMissing <= 0) {
            return $this->key;
        }
        $result = $this->key;
        //else, add needed chars
        for ($i = 0; $i < $charMissing; $i++) {
            $result .= $this->key[$i % $keyLength];
        }
    }

    /**
     * Encrypt a text using Vigenere
     * @param  string $plainText Text to encrypt
     * @return string            Encrypted text
     */
    public function encrypt($plainText)
    {
        $result = "";
        $textLength = strlen($plainText);
        $key = $this->generateKey($textLength);
        for ($i = 0; $i < $textLength; $i++) {
            $result .= $this->encryptOne($plainText[$i], $key[$i]);
        }
        return $result;
    }

    /**
     * Decrypt a text using Vigenere
     * @param  string $encryptedText Text to decrypt
     * @return string            Decrypted text
     */
    public function decrypt($encrytedText)
    {
        $result = "";
        $textLength = strlen($encrytedText);
        $key = $this->generateKey($textLength);
        for ($i = 0; $i < $textLength; $i++) {
            $result .= $this->decryptOne($encrytedText[$i], $key[$i]);
        }
        return $result;
    }

    /**
     * Encrypt a char using Vigenere
     * @param  char $charToEncrypt The char to encrypt
     * @param  char $charKey       The used char to encrypt
     * @return char                The char after encryption
     */
    private function encryptOne($charToEncrypt, $charKey)
    {
        return chr(ord($charToEncrypt) + ord($charKey));
    }

    /**
     * Decrypt a char using Vigenere
     * @param  char $charToDecrypt The char to decrypt
     * @param  char $charKey       The used char to decrypt
     * @return char                The decrypted char
     */
    private function decryptOne($charToDecrypt, $charKey)
    {
        return chr(ord($charToDecrypt) - ord($charKey));
    }
}
