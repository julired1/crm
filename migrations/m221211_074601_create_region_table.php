<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m221211_074601_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()
               
           
        ]);
        $this->batchInsert('region', ['id', 'name'], [
            [1, 'Республика Адыгея'],
            [2, 'Республика Башкортостан'],
            [3, 'Республика Бурятия'],
            [4, 'Республика Алтай'],
            [5, 'Республика Дагестан'],
            [6, 'Республика Ингушетия'],
            [7, 'Кабардино-Балкарская Республика'],
            [8, 'Республика Калмыкия'],
            [9, 'Карачаево-Черкесская Республика'],
            [10, 'Республика Карелия'],
            [11, 'Республика Коми'],
            [12, 'Республика Марий Эл'],
            [13, 'Республика Мордовия'],
            [14, 'Республика Мордовия'],
            [15, 'Республика Северная Осетия - Алания'],
            [16, 'Республика Татарстан'],
            [17, 'Республика Тыва'],
            [18, 'Удмуртская Республика'],
            [19, 'Республика Хакасия'],
            [20, 'Чеченская Республика'],
            [21, 'Чувашская Республика — Чувашия'],
            [22, 'Алтайский край'],
            [75, 'Забайкальский край'],
            [41, 'Камчатский край'],
            [23, 'Краснодарский край'],
            [24, 'Красноярский край'],
            [59, 'Пермский край'],
            [25, 'Приморский край'],
            [26, 'Ставропольский край'],
            [27, 'Хабаровский край'],
            [28, 'Амурская область'],
            [29, 'Архангельская область'],
            [30, 'Астраханская область'],
            [31, 'Белгородская область'],
            [32, 'Брянская область'],
            [33, 'Владимирская область'],
            [34, 'Волгоградская область'],
            [35, 'Вологодская область'],
            [36, 'Воронежская область'],
            [37, 'Ивановская область'],
            [38, 'Иркутская область'],
            [39, 'Калининградская область'],
            [40, 'Калужская область'],
            [42, 'Кемеровская область — Кузбасс'],
            [43, 'Кировская область'],
            [44, 'Костромская область'],
            [45, 'Курганская область'],
            [46, 'Курская область'],
            [47, 'Ленинградская область'],
            [48, 'Липецкая область'],
            [49, 'Магаданская область'],
            [50, 'Московская область'],
            [51, 'Мурманская область'],
            [52, 'Нижегородская область'],
            [53, 'Новгородская область'],
            [54, 'Новосибирская область'],
            [55, 'Омская область'],
            [56, 'Оренбургская область'],
            [57, 'Орловская область'],
            [58, 'Пензенская область'],
            [60, 'Псковская область'],
            [61, 'Ростовская область'],
            [62, 'Рязанская область'],
            [63, 'Самарская область'],
            [64, 'Саратовская область'],
            [65, 'Сахалинская область'],
            [66, 'Свердловская область'],
            [67, 'Смоленская область'],
            [68, 'Тамбовская область'],
            [69, 'Тверская область'],
            [70, 'Томская область'],
            [71, 'Тульская область'],
            [72, 'Тюменская область'],
            [73, 'Ульяновская область'],
            [74, 'Челябинская область'],
            [76, 'Ярославская область'],
            [77, 'Москва'],
            [78, 'Санкт-Петербург'],
            [80, 'Севастополь'],
            [79, 'Еврейская АО'],
            [83, 'Ненецкий АО'],
            [86, 'Ханты-Мансийский АО — Югра'],
            [87, 'Чукотский АО'],
            [89, 'Ямало-Ненецкий АО'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%region}}');
    }
}
