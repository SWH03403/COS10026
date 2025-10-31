<?php
const ENTITIES = ENT_QUOTES | ENT_SUBSTITUTE;
function clean(string $data): string { return htmlspecialchars($data, ENTITIES, 'UTF-8'); }
