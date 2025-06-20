<?php

$data = file_get_contents('php://input');
$transaction = json_decode($data);

file_put_contents('response.log', var_export($transaction, true));
http_response_code(200);
return 'Ok';