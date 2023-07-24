<?php

namespace App\Transformer;

use App\Himed\Patient\Patient;
use RetailCrm\Api\Model\Entity\Customers\Customer;

class Transformer
{
    private const SEX = [
        'male' => 'M',
        'female' => 'F',
    ];

    public function toHimed(Customer $customer): Patient
    {
        $patient = new Patient();
        $patient->tipo_documento = strtoupper($customer->customFields['tipo_doc'] ?? '');
        $patient->id_paciente = $customer->customFields['cedula'] ?? '';
        $patient->primer_nombre = $customer->firstName;
        $patient->segundo_nombre = $customer->patronymic;
        $patient->primer_apellido = $customer->lastName;
        $patient->segundo_apellido = $customer->customFields['segundo_apellido'] ?? '';
        $patient->fecha_nacimiento = $customer->birthday ? $customer->birthday->format('Y-m-d') : '';
        $patient->lugar_nacimiento = $customer->customFields['lugar_de_nacimiento'] ?? '';
        $patient->estado_civil = $customer->customFields['estado_civ'] ?? '';
        $patient->sexo = self::SEX[$customer->sex] ?? '';
        $patient->escolaridad = $customer->customFields['escolaridad'] ?? '';
        $patient->ocupacion = $customer->customFields['ocupacion'] ?? '';
        $patient->pais = Country::toHimed($customer->address->countryIso ?? '');
        $patient->departamento = Region::toHimed($customer->address->region ?? '');
        $patient->municipio = Municipio::toHimed($customer->address->city ?? '');
        $patient->direccion = $customer->customFields['direccion_de_residencia'] ?? '';
        $patient->zona_residencial = $customer->customFields['zona_residencial'] ?? '';
        $patient->telefono_uno = count($customer->phones) ? current($customer->phones)->number : '';
        $patient->email = $customer->email;
        $patient->entidad = $customer->customFields['entidad'] ?? '';
        $patient->etnia = $customer->customFields['etnia'] ?? '';

        return $patient;
    }
}