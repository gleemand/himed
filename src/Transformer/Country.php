<?php

namespace App\Transformer;

class Country extends AbstractList
{
    public const LIST = [
        'CA' => '0001',
        'US' => '001',
        'RU' => '007',
        'EG' => '020',
        'KM' => '0269',
        'ZA' => '027',
        'GR' => '030',
        'NL' => '031',
        'BE' => '032',
        'FR' => '033',
        'ES' => '034',
        'HU' => '036',
        'IT' => '039',
        'RO' => '040',
        'CH' => '041',
        'AT' => '043',
        'GB' => '044',
        'DK' => '045',
        'SE' => '046',
        'NO' => '047',
        'PL' => '048',
        'DE' => '049',
        'PE' => '051',
        'MX' => '052',
        'CU' => '053',
        'AR' => '054',
        'BR' => '055',
        'CL' => '056',
        'CO' => '057',
        'VE' => '058',
        'TF' => '0596',
        'MY' => '060',
        'AU' => '061',
        'ID' => '062',
        'PH' => '063',
        'NZ' => '064',
        'SG' => '065',
        'TH' => '066',
        'JP' => '081',
        'KR' => '082',
        'VN' => '084',
        'CN' => '086',
        'TR' => '090',
        'IN' => '091',
        'PK' => '092',
        'AF' => '093',
        'LK' => '094',
        'MM' => '095',
        'IR' => '098',
        'BS' => '1242',
        'BB' => '1246',
        'AG' => '1268',
        'PR' => '1787',
        'MA' => '212',
        'DZ' => '213',
        'TN' => '216',
        'LY' => '218',
        'GM' => '220',
        'SN' => '221',
        'MR' => '222',
        'ML' => '223',
        'GN' => '224',
        'CI' => '225',
        'BF' => '226',
        'NE' => '227',
        'TG' => '228',
        'BJ' => '229',
        'MU' => '230',
        'LR' => '231',
        'SL' => '232',
        'GH' => '233',
        'NG' => '234',
        'TD' => '235',
        'CF' => '236',
        'CM' => '237',
        'CV' => '238',
        'ST' => '239',
        'GQ' => '240',
        'GA' => '241',
        'CG' => '242',
        'CD' => '243',
        'AO' => '244',
        'GW' => '245',
        'SC' => '248',
        'SD' => '249',
        'RW' => '250',
        'ET' => '251',
        'SO' => '252',
        'DJ' => '253',
        'KE' => '254',
        'TZ' => '255',
        'UG' => '256',
        'BI' => '257',
        'MZ' => '258',
        'ZM' => '260',
        'MG' => '261',
        'ZW' => '263',
        'NA' => '264',
        'MW' => '265',
        'LS' => '266',
        'BW' => '267',
        'SZ' => '268',
        'YT' => '269',
        'VG' => '284',
        'SH' => '290',
        'ER' => '291',
        'AW' => '297',
        'FO' => '298',
        'GL' => '299',
        'VI' => '340',
        'KY' => '345',
        'GI' => '350',
        'PT' => '351',
        'LU' => '352',
        'IE' => '353',
        'IS' => '354',
        'AL' => '355',
        'MT' => '356',
        'CY' => '357',
        'FI' => '358',
        'BG' => '359',
        'LT' => '370',
        'LV' => '371',
        'EE' => '372',
        'MD' => '373',
        'AM' => '374',
        'BY' => '375',
        'AD' => '376',
        'MC' => '377',
        'SM' => '378',
        'UA' => '380',
        'RS' => '381',
        'ME' => '382',
        'HR' => '385',
        'SI' => '386',
        'BA' => '387',
        'MK' => '389',
        'LI' => '4175',
        'CZ' => '420',
        'SK' => '421',
        'GD' => '473',
        'FK' => '500',
        'BZ' => '501',
        'GT' => '502',
        'SV' => '503',
        'HN' => '504',
        'NI' => '505',
        'CR' => '506',
        'PA' => '507',
        'PM' => '508',
        'HT' => '509',
        'GP' => '590',
        'BO' => '591',
        'GY' => '592',
        'EC' => '593',
        'GF' => '594',
        'PY' => '595',
        'MQ' => '596',
        'SR' => '597',
        'UY' => '598',
        'AN' => '599',
        'MS' => '664',
        'MP' => '670',
        'GU' => '671',
        'AQ' => '672',
        'BN' => '673',
        'NR' => '674',
        'PG' => '675',
        'TO' => '676',
        'SB' => '677',
        'FJ' => '679',
        'PW' => '680',
        'CK' => '682',
        'NU' => '683',
        'AS' => '684',
        'WS' => '685',
        'KI' => '686',
        'NC' => '687',
        'PF' => '689',
        'TK' => '690',
        'FM' => '691',
        'MH' => '692',
        'LC' => '758',
        'DM' => '767',
        'VC' => '784',
        'BM' => '8009',
        'UM' => '808',
        'DO' => '809',
        'KP' => '850',
        'HK' => '852',
        'MO' => '853',
        'KH' => '855',
        'LA' => '856',
        'TT' => '868',
        'KN' => '869',
        'JM' => '876',
        'BD' => '880',
        'TW' => '886',
        'MV' => '960',
        'LB' => '961',
        'JO' => '962',
        'SY' => '963',
        'IQ' => '964',
        'KW' => '965',
        'SA' => '966',
        'YE' => '967',
        'OM' => '968',
        'AE' => '971',
        'IL' => '972',
        'BH' => '973',
        'QA' => '974',
        'BT' => '975',
        'MN' => '976',
        'NP' => '977',
        'TM' => '993',
        'AZ' => '994',
        'GE' => '995',
        'KG' => '996',
    ];
}
