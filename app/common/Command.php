<?php

namespace common;
interface Command
{
    public function execute(string $url, array $data = []): string;
}
