<?php


class UniqueID
{
    private $letters;
    private $numbers;

    private $bin;

    public function __construct()
    {
        $this->letters = str_split('abcdefghijklmnopqrstuvwxyz'
                                        .'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->numbers = str_split('123456789');
    }

    private function generateUnique()
    {
        $unique_array = [];
        for ($d = 0; $d < 4; $d++)
        {
            $unique = '';
            for ($c = 0 ; $c < 4; $c++)
            {
                if ($c % 2 == 0)
                {
                    $unique .= $this->letters[(time() * rand(0, 4)) % 48];
                }
                else
                {
                    $unique .= $this->generateBin();
                }
            }
            array_push($unique_array, $unique);
        }

        return implode('-', $unique_array);
    }

    private function generateBin()
    {
        $key = '';
        foreach (array_rand($this->numbers, 4) as $val)
        {
            $key .= $val % 2;
        }
        if (bindec($key) > 9)
        {
            return bindec($key) % 5;
        }
        elseif (bindec($key) == 0)
        {
            $key = '';
            foreach (array_rand($this->numbers, 4) as $val)
            {
                $key .= $val % 2;
            }
            return bindec($key);
        }
        else
            return bindec($key);
    }

    public function uniqueId()
    {
        return $this->generateUnique();
    }
}


$unique = new UniqueID();

$id = $unique->uniqueId();

echo $id;



