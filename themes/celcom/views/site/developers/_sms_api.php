<style>
    .api-params p {
        margin-bottom: 0.23em;
    }
</style>
<article class="docs-article" id="bulkSms">
    <header class="docs-header">
        <h1 class="docs-heading fs-3 mb-2 pb-2">Introduction <span class="docs-time">Last updated: 2021-09-23</span>
        </h1>
        <section class="docs-intro">
            <p>
                Effortlessly integrate your system with our Bulk SMS services
                using our user-friendly APIs.
                Our robust SMS gateway ensures fast and efficient
                message delivery to multiple recipients, allowing you to reach your audience quickly and
                effectively.
            </p>
        </section>
    </header>
    <section class="docs-section mt-5">
        <h5 id="apiParams">API PARAMS:</h5>
        <div class="api-params">
            <p>apikey : Valid API KEY. Get this by clicking the button above "GET API KEY & PARTNER ID" in your
                account.</p>
            <p>partnerID : Valid Partner ID. Get this by clicking the button above "GET API KEY & PARTNER ID" in your
                account.</p>
            <p>message : URL Encoded Text Message with valid GSM7 Characters.</p>
            <p>shortcode : Valid Sender ID / Shortcode.</p>
            <p>mobile : Valid Mobile Number.</p>
        </div>
    </section>
    <section class="docs-section mt-4">
        <h5 id="smsGetRequest">GET METHOD:</h5>
        <p>API Endpoint url :
            <code>
                https://isms.celcomafrica.com/api/services/sendsms/?
            </code>
        </p>
        <p>Sample GET Request (PHP) </p>
        <pre class="bg-sample-code rounded language-js">
        <code>
    $partnerID = "useraccountpartnerId";
    $apikey = "useraccountapikey";
    $shortcode = "INFOTEXT";

    $mobile = "254712345678"; // Bulk messages can be comma separated
    $message = "This is a test message + = # special characters @ _ -";

    $finalURL = "https://isms.celcomafrica.com/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" .
    urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";
    $ch = curl_init();
    \curl_setopt($ch, CURLOPT_URL, $finalURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    echo "Response: $response";
    </code>
    </pre>
    </section>
    <section class="docs-section">
        <h5 id="smsPostRequest">POST METHOD</h5>
        <p>API Endpoint url :
            <code>
                https://isms.celcomafrica.com/api/services/sendsms/
            </code>
        </p>
        <p>Sample Code for POST request in PHP</p>
        <pre class="bg-sample-code rounded language-js">
    <code>
    $url = 'https://isms.celcomafrica.com/api/services/sendsms/';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header

    $curl_post_data = array(

    //Fill in the request parameters with valid values
    'partnerID' => '00',
    'apikey' => 'xxxxxxxxxxx',
    'mobile' => '0712345678',
    'message' => 'This is a test message',
    'shortcode' => 'INFOTEXT',
    'pass_type' => 'plain', //bm5 {base64 encode} or plain
    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);
    print_r($curl_response);
    </code>
    </pre>
    </section>
    <section class="docs-section">
        <h5 class="pt-4" id="smsSampleResponse">Sample Response</h5>
        <p>For a successfully sent message you get:</p>
        <pre class="bg-sample-code rounded language-js">
    <code>
    {
        "responses":[
            {
                "respose-code":200,
                "response-description":"Success",
                "mobile":254713482448,
                "messageid":8290842,
                "networkid":"1"
            }
        ]
    }
    </code>
    </pre>
        <p>where 8290842 is the message id. This is the message id to use when querying delivery reports.
        </p>
    </section>
    <section class="docs-section">
        <h5 id="apiReadResponse">Read API Response.</h5>
        <p>Below is a sample code written in PHP.</p>
        <pre class="bg-sample-code rounded language-js">
    <code>
    $response ='{
        "responses":[
            {
                "respose-code":200,
                "response-description":"Success",
                "mobile":254713482448,
                "messageid":8290842,
                "networkid":"1"
            },
            {"respose-code":200,
                "response-description":"Success",
                "mobile":254713482448,
                "messageid":8290843,
                "networkid":"1"
            }
        ]
    }';

    $count = 0;

    if ($response != null) {
        $responseData = json_decode($response, TRUE);
        foreach ($responseData as $responseItem) {
            foreach ($responseItem as $smsdetails) {
            $messageID = $responseData['responses'][$count]['messageid'];
            $count++;
        }
      }
    } else {
         echo "Null Response";
    }
    </code>
    </pre>
    </section>
    <section class="docs-section">
        <h5 class="pt-4" id="smsSchedulingMessages">Scheduling Messages.</h5>
        <p>For messages to be sent at a future time, you will need to pass an optional parameter 'timeToSend' with a
            valid
            date string that resolves to a Unix timestamp or the unix timestamp itself.
        </p>
        <pre class="bg-sample-code rounded language-js">
    <code>
    {
        "apikey":"123456789",
        "partnerID":"123",
        "message":"this is a test message",
        "shortcode":"SENDERID",
        "mobile":"254712345678",
        "timeToSend":"2019-09-01 18:00"
    }

    </code>
    </pre>
    </section>
    <section class="docs-section">
        <h5 class="pt-4" id="apiGetDlrs">Getting Delivery Reports.</h5>
        <p>API Endpoint url :
            <code>
                https://isms.celcomafrica.com/api/services/getdlr/
            </code>
        </p>
        <p>Example below is in PHP.</p>
        <pre class="bg-sample-code rounded language-js">
    <code>
    $url = 'https://isms.celcomafrica.com/api/services/getdlr/';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header


    $curl_post_data = array(
    //Fill in the request parameters with valid values
    'partnerID' => '00',
    'apikey' => 'xxxxxxxxxxxxx',
    'messageID' => '123456789',
    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);
    print_r($curl_response);
    </code>
    </pre>
    </section>
    <section class="docs-section">
        <h5 class="pt-4" id="apiGetAccountBal">Getting Account Balance. </h5>
        <p>API Endpoint url :
            <code>
                https://isms.celcomafrica.com/api/services/getbalance/
            </code>
        </p>
        <p>Example below is in PHP.</p>
        <pre class="bg-sample-code rounded language-js">
    <code>
    $url = 'https://isms.celcomafrica.com/api/services/getbalance/';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header


    $curl_post_data = array(
    //Fill in the request parameters with valid values
    'partnerID' => '00',
    'apikey' => 'xxxxxxxxxxxxx',
    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);
    print_r($curl_response);
    </code>
    </pre>
    </section>
    <section class="docs-section">
        <h5 class="py-4" id="apiReturnCodes">API Return codes / Description</h5>
        <p><code style="margin-right: 5px">• 200: </code>
            Successful Request all</p>
        <p><code style="margin-right: 5px">• 1001: </code>
            Invalid sender id</p>
        <p><code style="margin-right: 5px">• 1002: </code>
            Network not allowed</p>
        <p><code style="margin-right: 5px">• 1003: </code>
            Invalid mobile number</p>
        <p><code style="margin-right: 5px">• 1004: </code>
            Low bulk credits</p>
        <p><code style="margin-right: 5px">• 1005: </code>
            Failed. System error</p>
        <p><code style="margin-right: 5px">• 1006: </code>
            Invalid credentials</p>
        <p><code style="margin-right: 5px">• 1007: </code>
            Failed. System error</p>
        <p><code style="margin-right: 5px">• 1008: </code>
            No Delivery Report</p>
        <p><code style="margin-right: 5px">• 1009: </code>
            unsupported data type</p>
        <p><code style="margin-right: 5px">• 1010: </code>
            unsupported request type</p>
        <p><code style="margin-right: 5px">• 4090: </code>
            Internal Error. Try again after 5 minutes</p>
        <p><code style="margin-right: 5px">• 4091: </code>
            No Partner ID is Set</p>
        <p><code style="margin-right: 5px">• 4092: </code>
            No API KEY Provided</p>
        <p><code style="margin-right: 5px">• 4093: </code>
            Details Not Found</p>
    </section>
</article>