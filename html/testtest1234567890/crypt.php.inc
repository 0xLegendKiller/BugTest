<?

$plaintext = "abcdef";
$key = "8b362e210615e66b3bf7f69f6c819056";
$cipher = "aes-256-ctr";
$iv = "ABCDEFGHIJKLMNOP";

function encrypt($plaintext) {
	if (in_array($cipher, openssl_get_cipher_methods()))
	{
	    $ivlen = openssl_cipher_iv_length($cipher);
	    echo '\n'.strlen($iv).'\n';
	    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);
	    if ($ciphertext) {
	    return $ciphertext;
	} else {
    	echo "Encryption error";	
	}

 } 

}

