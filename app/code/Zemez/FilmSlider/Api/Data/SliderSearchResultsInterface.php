<?php
/**
 *
 * Copyright © 2015 Zemez. All rights reserved.
 * See COPYING.txt for license details.
 *
 */

namespace Zemez\FilmSlider\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SliderSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return mixed
     */
    public function getItems();


    /**
     * @param array $items
     * @return mixed
     */
    public function setItems(array $items);
}
