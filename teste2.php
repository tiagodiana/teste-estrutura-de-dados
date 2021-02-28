<?php

class Calculadora
{
    private $num1;
    private $num2;


    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }


    private function verifyArray()
    {
        $error = [false, ''];
        foreach ($this->num1 as $val)
        {
            if (!is_numeric($val))
            {
                $error[0] = true;
                $error[1] = 'Array 1';
            }
        }

        foreach ($this->num2 as $val)
        {
            if (!is_numeric($val))
            {
                $error[0] = true;
                $error[1] = 'Array 2';
            }
        }
        return $error;
    }

    public function calc($type)
    {
        $result = [];
        if (count($this->num1) === count($this->num2))
        {
            for ($c = 0; $c < count($this->num1); $c++)
            {
                if ($type === 'soma')
                    array_push($result, (float) $this->num1[$c] + (float) $this->num2[$c]);
                elseif ($type === 'subtracao')
                    array_push($result, (float) $this->num1[$c] - (float) $this->num2[$c]);
                elseif ($type === 'multiplicacao')
                    array_push($result, (float) $this->num1[$c] * (float) $this->num2[$c]);
            }
        }
        elseif (count($this->num1) === 1)
        {
            for ($c = 0; $c < count($this->num1); $c++)
            {
                if ($type === 'soma')
                    array_push($result, (float) $this->num1[0] + (float) $this->num2[$c]);
                elseif ($type === 'subtracao')
                    array_push($result, (float) $this->num1[0] - (float) $this->num2[$c]);
                elseif ($type === 'multiplicacao')
                    array_push($result, (float) $this->num1[0] * (float) $this->num2[$c]);
            }
        }
        elseif (count($this->num2) === 1)
        {
            for ($c = 0; $c < count($this->num1); $c++)
            {
                if ($type === 'soma')
                    array_push($result, (float) $this->num1[$c] + (float) $this->num2[0]);
                elseif ($type === 'subtracao')
                    array_push($result, (float) $this->num1[$c] - (float) $this->num2[0]);
                elseif ($type === 'multiplicacao')
                    array_push($result, (float) $this->num1[$c] * (float) $this->num2[0]);
            }
        }
        else
        {
            $result = "Não foi possivel calcular a ". $type . ", os arrays devem ser iguais ou um deles conter apenas um valor";
        }
        return $result;
    }

    private function result($type)
    {
        $result = null;
        if (is_array($this->num1) && is_array($this->num2))
        {
            $error = $this->verifyArray();
            if (!$error[0])
            {
                $result = $this->calc($type);
            }
            else
            {
                $result = "Error!!... contem letras no " . $error[1];
            }
        }
        else
        {
            $result = (float) $this->num1 + (float) $this->num2;
        }
        return $result;
    }

    public function soma()
    {
        return $this->result('soma');
    }

    public function subtracao()
    {
        return $this->result('subtracao');
    }

    public function multiplicacao()
    {
        return $this->result('multiplicacao');
    }

    public function divisao()
    {
        if (!is_array($this->num1) && !is_array($this->num2))
        {
            if ($this->num2 === 0)
            {
                return "Erro, não é possivel dividir por 0";
            }
            else
            {
                return $this->num1 / $this->num2;
            }
        }
        else
        {
            return "Divisão não aceita arrays";
        }
    }


}

/*$val1 = [4, 3, 4, 5, 1];
$val2 = [6, 2, 3, 4, 2];
/*$val1 = 4;
$val2 = 2;*/

/*$calc = new Calculadora($val1, $val2);

echo "<pre>";
print_r($calc->divisao());
echo "</pre>";*/
