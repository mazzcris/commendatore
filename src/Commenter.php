<?php

namespace App;

class Commenter
{
    /** @var string */
    private $filePath;
    /** @var string  */
    private $outputPath;

    public function __construct(string $filePath, string $outputPath)
    {
        $this->filePath = $filePath;
        $this->outputPath = $outputPath;
    }

    public function commentOnNewFile()
    {
        $lines = [];
        $handle = fopen($this->filePath, "r");
        while (($line = fgets($handle)) !== false) {
            if ($this->lineIsMethodSignature($line)) {
                $lines[] = $this->getWhiteSpace($line).'// '.$this->getComment($line).''."\n";
            }
            $lines[] = $line;
        }
        fclose($handle);

        $handle = fopen($this->outputPath, 'w');
        foreach ($lines as $line) {
            fwrite($handle, $line);
        }
        fclose($handle);
    }

    private function lineIsMethodSignature($line)
    {
        return preg_match('/(public|private|protected)\s(static\s|final\s)*(function)/', $line);
    }

    private function getWhiteSpace($line)
    {
        preg_match('/(\s*)\S/', $line, $m);

        return $m[1];
    }

    private function getComment(string $line)
    {
        preg_match('/\s(.*)\(/', $line, $m);
        $signaturePieces = explode(' ', $m[0]);
        $methodName = str_replace('(', '', $signaturePieces[count($signaturePieces) - 1]);
        $arr = preg_split('/(?=[A-Z])/', $methodName);

        $comment = ucwords($this->thirdPerson($arr[0]));
        for ($i = 1; $i < count($arr); $i++) {
            $comment .= ' ' . strtolower($arr[$i]);
        }

        return $comment;
    }

    private function thirdPerson($word)
    {
        if(preg_match('/(get|set|add|remove|delete|find|save|load)/', strtolower($word))){
            return $word.'s';
        }

        if(preg_match('/(search)/', strtolower($word))){
            return $word.'es';
        }

        return $word;
    }
}