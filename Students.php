<?php

class Students
{
    private $data = [];

    public function __call($name, $arguments)
    {
        $prefix = substr($name, 0, 3);
        $varName = substr($name, 3);
        $args = implode(', ', $arguments);
        switch ($prefix) {
            case "set":
                $this->data[$varName] = $args;
                break;
            case "get" :
                return $this->data[$varName];
            case "has":
                return array_key_exists($varName, $this->data);
            case "uns":
                unset($this->data[$varName]);
                break;
            default:
                $msg = __FUNCTION__ . " {$name}({$args})";
                throw new Exception("$msg");
        }
    }
}

try {
    $student = new Students();
    $student->setFirstName("Anita");
    $student->setLastName("Rutnik");
    echo $student->getFirstName() . " " . $student->getLastName();
    echo "<br>";
    echo $student->Age(15);
    echo "<br>";
} catch (Exception $exception) {
    echo "Something went wrong: " . $exception->getMessage();
}