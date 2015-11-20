<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace O2Web\TourismeQuebec\Schema;

/**
 * Description of Constants
 *
 * @author fabriciobedoya
 */
class Constants
{

    private static $terms = array(
      'section' => 'ETBL_REG_SECTION_ID',
      'subsection' => 'ETBL_REG_SOUS_SEC_ID',
      'category' => 'ETBL_REG_CAT_ID',
      'region' => 'ETBL_REGION_ID',
      'city' => 'ETBL_VILLE_ID',
      'services' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'activities' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'rating' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'rates' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'amenities' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'accessibility' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'specialties' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'boat' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'hunting' => 'CARACTERISTIQUES.CARACT_ATTRIBUTS.CARACT_ATTRB_ID',
      'thematic' => 'THEMATIQUES.THEM_CLASSES.THEM_CLASS_ID',
      'range' => array(
        'ending' => 'PERIODES_EXPLOITATION.PER_EXPL_JJMMYYYY_FIN',
        'begining' => 'PERIODES_EXPLOITATION.PER_EXPL_JJMMYYYY_DEBUT',
      ),
    );
    
    public static function getTerm($key, $defaultValue = null) 
    {
        $value = $defaultValue;
        if (array_key_exists($key, static::$terms)) {
            $value = static::$terms[$key];
        }
        return $value;
    }

}
