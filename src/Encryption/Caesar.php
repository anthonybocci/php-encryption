<?php

namespace AnthonyBocci\Encryption;

class Caesar
{
    private $shift;

    public function __construct($shift)
    {
        $this->shift = $shift;
    }

    /**
     * Encrypt a text using Caesar
     * @param  string $plainText Text to encrypt
     * @return string            Encrypted text
     */
    public function encrypt($plainText)
    {
        $result = "";
        $textLength = strlen($plainText);
        for ($i = 0; $i < $textLength; $i++) {
            $result .= $this->encryptOne($plainText[$i]);
        }
        return $result;
    }

    /**
     * Decrypt a text using Caesar
     * @param  string $encryptedText Text to decrypt
     * @return string                Decrypted text
     */
    public function decrypt($encryptedText)
    {
        $result = "";
        $textLength = strlen($encryptedText);
        for ($i = 0; $i < $textLength; $i++) {
            $result .= $this->decryptOne($encryptedText[$i]);
        }
        return $result;
    }



    /**
     * Encrypt a char using Caesar
     * @param  char $char Char to encrypt
     * @return char       Encrypted char
     */
    private function encryptOne($char)
    {
        return chr(ord($char) + $this->shift);
    }

    /**
     * Decrypt a char using Caesar
     * @param  char $char Char to decrypt
     * @return char       Decrypted char
     */
    private function decryptOne($char)
    {
        return chr(ord($char) - $this->shift);
    }
}
