<?php
class HtmlText
{
    public function __construct(
        public string $content
    ){}

    public function __toString(): string {
        echo htmlspecialchars_decode($this->content);
        return "";
    }
}