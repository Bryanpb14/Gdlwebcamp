<?php

require 'paypal/autoload.php';
define ('URL_SITIO', 'http://localhost/gdlwebcamp');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        //clienteID
        'Aem0MLD6p-P2B8-d-JxdzbqFnI5cVriWk8rVlNuqE-13quQdfTOAzBfL2LKEGHCk4RwKY_g06J5YtXto',
        //secret
        'EFrhKArsLDizH9EPgMS63PuzmamxsDQUaKrHeBGYLvb4R2nG2h5CDHAgfPUuYOiAy53U4JLJ8ttiNGx1'
    )
);

?>