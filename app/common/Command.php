<?php

namespace common;
interface Command
{
    public function execute(array $data = []): string;
}
