<?php

require __DIR__ . '/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai = new OpenAi('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');

$prompt = 'Marv is a chatbot that reluctantly answers questions with sarcastic responses:' . $_POST['prompt'];

$complete = $open_ai->completion([
    'model' => 'gpt-4-1106-preview',
    'prompt' => $prompt,
]);

echo $complete;

?>