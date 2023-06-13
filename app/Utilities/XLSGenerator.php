<?php

namespace App\Utilities;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XLSGenerator extends DOMParser
{
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
            $align = $header['align'];
            [$mainCell] = explode(':', $position);
            $columnLetter = $mainCell[0];
            $worksheet->setCellValue($mainCell, $content)->mergeCells($position);
            $worksheet->getColumnDimension($columnLetter)->setAutoSize(true);
            $worksheet->getStyle($position)->getFont()->setBold(true);
            $worksheet->getStyle($position)->getAlignment()->setHorizontal('center')->setVertical('center');
            if (!empty($align)) {
                $columnStart = $mainCell;
                $columnEnd = $mainCell[0] . $this->modifiedData->count() + $this->headerRowsCount;
                $verticalRange = $columnStart . ':' . $columnEnd;
                $worksheet->getStyle($verticalRange)->getAlignment()->setHorizontal($align)->setVertical('center');
            }
        }

        for ($i = 1; $i <= $this->modifiedData->count(); $i++) {
            $index = $i - 1;
            $data = $this->modifiedData[$index];
            $row = $i + $this->headerRowsCount;

            $letter = 'A';
            if ($this->isAutoIncrement) {
                $cell = $letter . $row;
                $worksheet->setCellValue($cell, $i);
                $worksheet->getStyle($cell)->getAlignment()->setHorizontal('center')->setVertical('center');
                $letter = 'B';
            }

            if (empty($this->renderKeys)) {
                foreach ($data as $value) {
                    $cell = $letter++ . $row;
                    $worksheet->setCellValue($cell, $value);
                }
            } else {
                foreach ($this->renderKeys as $key) {
                    $d = $data->toArray();
                    $cell = $letter++ . $row;
                    $worksheet->setCellValue($cell, $d[$key]);
                }
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
