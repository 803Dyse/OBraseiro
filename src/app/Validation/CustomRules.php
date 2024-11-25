<?php

namespace App\Validation;

/**
 * Clase para la validacion de las fechas a la hora de pasar datos en formato date para la BD
 */
class CustomRules {

    public function date_greater_than_equal(string $str, string $minDate, array $data): bool {
        $inputDate = \DateTime::createFromFormat('d-m-Y', $str);
        $compareDate = \DateTime::createFromFormat('d-m-Y', $minDate);

        if (!$inputDate || !$compareDate) {
            return false;
        }

        return $inputDate >= $compareDate;
    }

    public function date_less_than_equal(string $str, string $maxDate, array $data): bool {
        $inputDate = \DateTime::createFromFormat('d-m-Y', $str);
        $compareDate = \DateTime::createFromFormat('d-m-Y', $maxDate);

        if (!$inputDate || !$compareDate) {
            return false;
        }

        return $inputDate <= $compareDate;
    }
}
