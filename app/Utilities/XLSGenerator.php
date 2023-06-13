<?php

namespace App\Utilities;

use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XLSGenerator extends DOMParser
{
    protected function computeData()
    {
        if (!$this->data || $this->data->count() === 0) {
            return collect([]);
        }

        if (count($this->renderKeys) === 0) {
            return $this->data;
        }

        if ($this->data->count() === 1) {
            return $this->data
                ->only($this->renderKeys);
        }

        return $this->data->map(function ($data) {
            return collect($data)
                ->only($this->renderKeys)
                ->all();
        });
    }

    protected function adjustPosition($startCell, $endCell)
    {
        return "$startCell:$endCell";
    }

    public function generate()
    {
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($this->headers as $header) {
            $position = $header['position'];
            $content = $header['content'];
            [$mainCell] = explode(':', $position);
            $columnLetter = $mainCell[0];
            $worksheet->setCellValue($mainCell, $content)->mergeCells($position);
            $worksheet->getColumnDimension($columnLetter)->setAutoSize(true);
        }

        for ($i = 1; $i <= $this->computeData()->count(); $i++) {
            $index = $i - 1;
            $data = $this->computeData()[$index];
            $row = $i + $this->headerRowsCount;

            $letter = 'A';
            if ($this->isAutoIncrement) {
                $worksheet->setCellValue($letter . $row, $i);
                $letter = 'B';
            }

            foreach ($data as $value) {
                $cell = $letter++ . $row;
                $worksheet->setCellValue($cell, $value);
            }
        }

        ob_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($this->fileName) . '"');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        $spreadsheet->disconnectWorksheets();

        unset($spreadsheet);
    }
}
