<?php

namespace App\Utilities;

use Illuminate\Support\Collection;


class PreProcessor
{
    protected Collection $data;

    protected string $fileName;

    protected array $renderKeys = [];

    protected bool $isAutoIncrement = true;

    public function setData(array | Collection $data)
    {
        $this->data = is_array($data) ? collect($data) : $data;
        return $this;
    }

    public function rename(string $newName)
    {
        $this->fileName = $newName . '.xlsx';
        return $this;
    }

    public function render(array $keys)
    {
        $this->renderKeys = $keys;
        return $this;
    }

    public function autoIncrement(bool $value = true)
    {
        $this->isAutoIncrement = $value;
        return $this;
    }
}
