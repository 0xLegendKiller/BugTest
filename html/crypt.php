<?php

$plaintext = "abcdef";
$key = "8b362e210615e66b3bf7f69f6c819056";
$cipher = "aes-256-ctr";
$iv = "ABCDEFGHIJKLMNOP";

function encrypt($plaintext) {
	global $cipher;
	global $key;
	global $iv;
	if (in_array($cipher, openssl_get_cipher_methods()))
	{
	    $ivlen = openssl_cipher_iv_length($cipher);
	    //echo '\n'.strlen($iv).'\n';
	    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);
	    return $ciphertext;
	} else {
    	echo "Encryption error";	
	}

}

function decrypt ($ciphertext) {
	global $cipher;
	global $key;
	global $iv;
	if (in_array($cipher, openssl_get_cipher_methods()))
	{
	    $ivlen = openssl_cipher_iv_length($cipher);
	    //$iv = openssl_random_pseudo_bytes($ivlen);
	    //store $cipher, $iv, and $tag for decryption later
	    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv);
	    //echo $original_plaintext."\n";
	    return $original_plaintext;
	}
}
/*
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);
    echo $ciphertext . "\n\n";
    //store $cipher, $iv, and $tag for decryption later
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv);
    echo $original_plaintext."\n";
}*/

//$ciphertext = encrypt($plaintext);
//echo $ciphertext . "\n";
//$d = decrypt($ciphertext);
//echo $d . "\n";
?>
