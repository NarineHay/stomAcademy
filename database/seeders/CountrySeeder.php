<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    public function run()
    {

        $countries = [
                'AU' => 'Австралия',
                'AT' => 'Австрия',
                'AZ' => 'Азербайджан',
                'AX' => 'Аландские о-ва',
                'AL' => 'Албания',
                'DZ' => 'Алжир',
                'AS' => 'Американское Самоа',
                'AI' => 'Ангилья',
                'AO' => 'Ангола',
                'AD' => 'Андорра',
                'AQ' => 'Антарктида',
                'AG' => 'Антигуа и Барбуда',
                'AR' => 'Аргентина',
                'AM' => 'Армения',
                'AW' => 'Аруба',
                'AF' => 'Афганистан',
                'BS' => 'Багамы',
                'BD' => 'Бангладеш',
                'BB' => 'Барбадос',
                'BH' => 'Бахрейн',
                'BY' => 'Беларусь',
                'BZ' => 'Белиз',
                'BE' => 'Бельгия',
                'BJ' => 'Бенин',
                'BM' => 'Бермудские о-ва',
                'BG' => 'Болгария',
                'BO' => 'Боливия',
                'BQ' => 'Бонэйр, Синт-Эстатиус и Саба',
                'BA' => 'Босния и Герцеговина',
                'BW' => 'Ботсвана',
                'BR' => 'Бразилия',
                'IO' => 'Британская территория в Индийском океане',
                'BN' => 'Бруней-Даруссалам',
                'BF' => 'Буркина-Фасо',
                'BI' => 'Бурунди',
                'BT' => 'Бутан',
                'VU' => 'Вануату',
                'VA' => 'Ватикан',
                'GB' => 'Великобритания',
                'HU' => 'Венгрия',
                'VE' => 'Венесуэла',
                'VG' => 'Виргинские о-ва (Великобритания)',
                'VI' => 'Виргинские о-ва (США)',
                'UM' => 'Внешние малые о-ва (США)',
                'TL' => 'Восточный Тимор',
                'VN' => 'Вьетнам',
                'GA' => 'Габон',
                'HT' => 'Гаити',
                'GY' => 'Гайана',
                'GM' => 'Гамбия',
                'GH' => 'Гана',
                'GP' => 'Гваделупа',
                'GT' => 'Гватемала',
                'GN' => 'Гвинея',
                'GW' => 'Гвинея-Бисау',
                'DE' => 'Германия',
                'GG' => 'Гернси',
                'GI' => 'Гибралтар',
                'HN' => 'Гондурас',
                'HK' => 'Гонконг (САР)',
                'GD' => 'Гренада',
                'GL' => 'Гренландия',
                'GR' => 'Греция',
                'GE' => 'Грузия',
                'GU' => 'Гуам',
                'DK' => 'Дания',
                'JE' => 'Джерси',
                'DJ' => 'Джибути',
                'DM' => 'Доминика',
                'DO' => 'Доминиканская Республика',
                'EG' => 'Египет',
                'ZM' => 'Замбия',
                'EH' => 'Западная Сахара',
                'ZW' => 'Зимбабве',
                'IL' => 'Израиль',
                'IN' => 'Индия',
                'ID' => 'Индонезия',
                'JO' => 'Иордания',
                'IQ' => 'Ирак',
                'IR' => 'Иран',
                'IE' => 'Ирландия',
                'IS' => 'Исландия',
                'ES' => 'Испания',
                'IT' => 'Италия',
                'YE' => 'Йемен',
                'CV' => 'Кабо-Верде',
                'KZ' => 'Казахстан',
                'KH' => 'Камбоджа',
                'CM' => 'Камерун',
                'CA' => 'Канада',
                'QA' => 'Катар',
                'KE' => 'Кения',
                'CY' => 'Кипр',
                'KG' => 'Киргизия',
                'KI' => 'Кирибати',
                'CN' => 'Китай',
                'KP' => 'КНДР',
                'CC' => 'Кокосовые о-ва',
                'CO' => 'Колумбия',
                'KM' => 'Коморы',
                'CG' => 'Конго - Браззавиль',
                'CD' => 'Конго - Киншаса',
                'CR' => 'Коста-Рика',
                'CI' => 'Кот-д’Ивуар',
                'CU' => 'Куба',
                'KW' => 'Кувейт',
                'CW' => 'Кюрасао',
                'LA' => 'Лаос',
                'LV' => 'Латвия',
                'LS' => 'Лесото',
                'LR' => 'Либерия',
                'LB' => 'Ливан',
                'LY' => 'Ливия',
                'LT' => 'Литва',
                'LI' => 'Лихтенштейн',
                'LU' => 'Люксембург',
                'MU' => 'Маврикий',
                'MR' => 'Мавритания',
                'MG' => 'Мадагаскар',
                'YT' => 'Майотта',
                'MO' => 'Макао (САР)',
                'MW' => 'Малави',
                'MY' => 'Малайзия',
                'ML' => 'Мали',
                'MV' => 'Мальдивы',
                'MT' => 'Мальта',
                'MA' => 'Марокко',
                'MQ' => 'Мартиника',
                'MH' => 'Маршалловы Острова',
                'MX' => 'Мексика',
                'MZ' => 'Мозамбик',
                'MD' => 'Молдова',
                'MC' => 'Монако',
                'MN' => 'Монголия',
                'MS' => 'Монтсеррат',
                'MM' => 'Мьянма (Бирма)',
                'NA' => 'Намибия',
                'NR' => 'Науру',
                'NP' => 'Непал',
                'NE' => 'Нигер',
                'NG' => 'Нигерия',
                'NL' => 'Нидерланды',
                'NI' => 'Никарагуа',
                'NU' => 'Ниуэ',
                'NZ' => 'Новая Зеландия',
                'NC' => 'Новая Каледония',
                'NO' => 'Норвегия',
                'BV' => 'о-в Буве',
                'IM' => 'о-в Мэн',
                'NF' => 'о-в Норфолк',
                'CX' => 'о-в Рождества',
                'SH' => 'о-в Св. Елены',
                'PN' => 'о-ва Питкэрн',
                'TC' => 'о-ва Тёркс и Кайкос',
                'HM' => 'о-ва Херд и Макдональд',
                'AE' => 'ОАЭ',
                'OM' => 'Оман',
                'KY' => 'Острова Кайман',
                'CK' => 'Острова Кука',
                'PK' => 'Пакистан',
                'PW' => 'Палау',
                'PS' => 'Палестинские территории',
                'PA' => 'Панама',
                'PG' => 'Папуа — Новая Гвинея',
                'PY' => 'Парагвай',
                'PE' => 'Перу',
                'PL' => 'Польша',
                'PT' => 'Португалия',
                'PR' => 'Пуэрто-Рико',
                'KR' => 'Республика Корея',
                'RE' => 'Реюньон',
                'RU' => 'Россия',
                'RW' => 'Руанда',
                'RO' => 'Румыния',
                'SV' => 'Сальвадор',
                'WS' => 'Самоа',
                'SM' => 'Сан-Марино',
                'ST' => 'Сан-Томе и Принсипи',
                'SA' => 'Саудовская Аравия',
                'MK' => 'Северная Македония',
                'MP' => 'Северные Марианские о-ва',
                'SC' => 'Сейшельские Острова',
                'BL' => 'Сен-Бартелеми',
                'MF' => 'Сен-Мартен',
                'PM' => 'Сен-Пьер и Микелон',
                'SN' => 'Сенегал',
                'VC' => 'Сент-Винсент и Гренадины',
                'KN' => 'Сент-Китс и Невис',
                'LC' => 'Сент-Люсия',
                'RS' => 'Сербия',
                'SG' => 'Сингапур',
                'SX' => 'Синт-Мартен',
                'SY' => 'Сирия',
                'SK' => 'Словакия',
                'SI' => 'Словения',
                'US' => 'Соединенные Штаты',
                'SB' => 'Соломоновы Острова',
                'SO' => 'Сомали',
                'SD' => 'Судан',
                'SR' => 'Суринам',
                'SL' => 'Сьерра-Леоне',
                'TJ' => 'Таджикистан',
                'TH' => 'Таиланд',
                'TW' => 'Тайвань',
                'TZ' => 'Танзания',
                'TG' => 'Того',
                'TK' => 'Токелау',
                'TO' => 'Тонга',
                'TT' => 'Тринидад и Тобаго',
                'TV' => 'Тувалу',
                'TN' => 'Тунис',
                'TM' => 'Туркменистан',
                'TR' => 'Турция',
                'UG' => 'Уганда',
                'UZ' => 'Узбекистан',
                'UA' => 'Украина',
                'WF' => 'Уоллис и Футуна',
                'UY' => 'Уругвай',
                'FO' => 'Фарерские о-ва',
                'FM' => 'Федеративные Штаты Микронезии',
                'FJ' => 'Фиджи',
                'PH' => 'Филиппины',
                'FI' => 'Финляндия',
                'FK' => 'Фолклендские о-ва',
                'FR' => 'Франция',
                'GF' => 'Французская Гвиана',
                'PF' => 'Французская Полинезия',
                'TF' => 'Французские Южные территории',
                'HR' => 'Хорватия',
                'CF' => 'Центрально-Африканская Республика',
                'TD' => 'Чад',
                'ME' => 'Черногория',
                'CZ' => 'Чехия',
                'CL' => 'Чили',
                'CH' => 'Швейцария',
                'SE' => 'Швеция',
                'SJ' => 'Шпицберген и Ян-Майен',
                'LK' => 'Шри-Ланка',
                'EC' => 'Эквадор',
                'GQ' => 'Экваториальная Гвинея',
                'ER' => 'Эритрея',
                'SZ' => 'Эсватини',
                'EE' => 'Эстония',
                'ET' => 'Эфиопия',
                'GS' => 'Южная Георгия и Южные Сандвичевы о-ва',
                'ZA' => 'Южно-Африканская Республика',
                'SS' => 'Южный Судан',
                'JM' => 'Ямайка',
                'JP' => 'Япония'
        ];
        foreach ($countries as $key => $value) {
            Country::create(['title' => $value,'code'=>$key]);
        }
    }
}
