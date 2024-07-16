<?php

// groq gpt code 
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keywords = $_POST['keywords'];
    $min_budget_amount = $_POST['min_budget_amount'];
    $max_budget_amount = $_POST['max_budget_amount'];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.groq.com/openai/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    $postdata = array(
        "messages" => [
            [
                "role" => "user",
                "content" => "I need a suitable title and description  related to ".$keywords.", budget from " . $min_budget_amount . " to " . $max_budget_amount . "US dollars, \nDo not include any company name ,  country name, how to apply section. This is not for applying to any company as employee.Add 3-4 skills related to " . $keywords . ".create a description in a manner like someone is posting a job post on sites like freelancer, upwork.  write it in within 200 words. always add full-stop or dot '.' after the title finishes.  Start directly with description.do not include 'her is the job post' or title before description.\n",
                
            ]
        ],
        "model" => "llama3-8b-8192",
        "temperature" => 1,
        "max_tokens" => 1024,
        "top_p" => 1,
        "stream" => false,
        "stop" => null,
    );

    $postdata = json_encode($postdata);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: Bearer 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';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error:" . curl_error($ch);
    } else {
        $response = json_decode($result, true);
        // print_r($response);
        if (isset($response['choices'][0]['message']['content'])) {
            $content = $response['choices'][0]['message']['content'];
            // Remove '**' from the content
            $cleaned_content = str_replace('**', '', $content);
            
            echo htmlspecialchars($cleaned_content);
        } else {
            echo "No content found in the response.";
        }
    }

    curl_close($ch);

}