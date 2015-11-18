<?php

namespace O2Web\TourismeQuebec\Template;

/**
 * Description of TwigTemplater
 *
 * @author fabriciobedoya
 */
class TwigTemplater
{

    public static function renderTwigDateFiche($langBrut = 'EN')
    {
        $lang = strtoupper($langBrut);
        $code = "
        {% set debut = res['PERIODES_EXPLOITATION']['PER_EXPL_JJMM_DEBUT']|split('-') %}
        {% set month = debut[1] %}
        {% set day = debut[0] %}
        {% if res['PERIODES_EXPLOITATION']['PER_EXPL_AAAA_DEBUT'] %}
            {% set year1 = res['PERIODES_EXPLOITATION']['PER_EXPL_AAAA_DEBUT']|abs %}
        {% else %}
            {% set year1 = \"now\"|date(\"Y\") %}   
        {% endif %}
        {% set starting_date = year1 ~ '/' ~ month ~ '/' ~ day %}
        {% set fin = res['PERIODES_EXPLOITATION']['PER_EXPL_JJMM_FIN']|split('-') %}
        {% set month = fin[1] %}
        {% set day = fin[0] %}
        {% if res['PERIODES_EXPLOITATION']['PER_EXPL_AAAA_FIN'] %}
            {% set year2 = res['PERIODES_EXPLOITATION']['PER_EXPL_AAAA_FIN']|abs %}
        {% else %}
            {% set year2 = \"now\"|date(\"Y\") %}
        {% endif %}
        {% set ending_date = year2 ~ '/' ~ month ~ '/' ~ day %}
        {% if year1 == year2 %}";
        $date1 = static::renderTwigFormatDate('starting_date', $lang, false);
        $date2 = static::renderTwigFormatDate('ending_date', $lang, false);
        $code .= ' ' . $date1 . '-' . $date2 . ' {{ year1 }} ';
        $code .= ' {% else %} ';
        $dateYear1 = static::renderTwigFormatDate('starting_date', $lang, true);
        $dateYear2 = static::renderTwigFormatDate('ending_date', $lang, true);
        $code .= ' ' . $dateYear1 . '-' . $dateYear2;
        $code .= '{% endif %}';
        return $code;
    }

    public static function renderTwigFormatDate($field, $langBrut = 'EN', $display_year = true)
    {
        $lang = strtoupper($langBrut);
        if ($lang === 'EN') {
            $code = "{{ month_names[$field|date(\"n\")] ~ ' ' ~ $field|date(\"d\") ";
            $separator = ', ';
        } else {
            $code = "{{ $field|date(\"d\") ~ ' ' ~ month_names[$field|date(\"n\")] ";
            $separator = ' ';
        }
        if ($display_year) {
            $code .= " ~ '$separator' ~ $field|date(\"Y\")"; //' ~ ' . $separator. ' ~ '.$field.'|date("Y")';
        }
        $code .= ' }}';
        return $code;
    }

    public static function renderUrlTwig($langBrut = 'EN')
    {
        $lang = strtoupper($langBrut);
        $codeUrl = "{{ res['ETBL_URL_FR'] }}";
        if ($lang === 'EN') {
            $codeUrl = "{{ res['ETBL_URL_EN'] }}";
        }
        return $codeUrl;
    }

}
