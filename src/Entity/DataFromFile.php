<?php


namespace App\Entity;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class DataFromFile
{

    private $path;
    private $file;

    /**
     * DataFromFile constructor.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function openFile()
    {
        return $this->file = fopen($this->path, "r");
    }

    public function readFile()
    {
        $aa = function ($str) {
            $str = str_replace('"', '', $str);
            $str = trim($str);
            return $str;
        };
        $handle = $this->openFile();
        $lineNum = 0;
        $i = 0;
        $header = [];
        $content = [];
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if ($lineNum === 0) {
                    $header = explode(',', $line);
                    $header = array_map($aa, $header);

                    $lineNum++;
                } else {
                    $row = explode(',', $line);
                    $row = array_map($aa, $row);
                    if (count($row) === count($header)) {
                        $content[] = array_combine($header, $row);
                    }
                }


            }


            fclose($handle);
        }
        return $content;
    }


}

