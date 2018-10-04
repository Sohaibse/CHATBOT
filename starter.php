<?php
/**
 * Created by PhpStorm.
 * User: aravind
 * Date: 8/25/17
 * Time: 7:50 PM
 */
try {
    // create curl resource
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, "https://api.api.ai/v1/query?v=20150910&e=WELCOME&lang=en&sessionId=" . $sessionID);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer 935e71704f954fdd866f66d868cb1ceb'));
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output string
    $output = curl_exec($ch);
    // close curl resource to free up system resources
    curl_close($ch);
} catch (Exception $e) {
    $speech = $e->getMessage();
    $fulfillment = new stdClass();
    $fulfillment->speech = $speech;
    $result = new stdClass();
    $result->fulfillment = $fulfillment;
    $response = new stdClass();
    $response->result = $result;
    echo json_encode($response);
}
?>
<div id="dom-target" style="display: none;">
    <?php
    echo htmlspecialchars($output); /* You have to escape because the result will not be valid HTML otherwise. */
    ?>
</div>