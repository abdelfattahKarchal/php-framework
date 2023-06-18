<?php

namespace KarchalAbdelfattah\Framework\Http;

class Response{

    public function __construct(
        // $_GET, $_POST, $_COOKIE, $_FILES, $_SERVER
        private ?string $content = '',
        private int $status = 200,
        private array $headers = [],
    )
    {
        
    }
    public function send(): void
    {
        echo $this->content;
    }
}