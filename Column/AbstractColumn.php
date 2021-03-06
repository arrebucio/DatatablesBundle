<?php

/**
 * This file is part of the SgDatatablesBundle package.
 *
 * (c) stwe <https://github.com/stwe/DatatablesBundle>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sg\DatatablesBundle\Column;

/**
 * Class AbstractColumn
 *
 * @package Sg\DatatablesBundle\Column
 */
abstract class AbstractColumn implements ColumnInterface
{
    /**
     * An entity's property.
     *
     * @var null|string
     */
    private $property;

    /**
     * Used to read data from any JSON data source property.
     *
     * @var mixed
     */
    private $mData;

    /**
     * Enable or disable filtering on the data in this column.
     *
     * @var boolean
     */
    private $bSearchable;

    /**
     * Enable or disable sorting on this column.
     *
     * @var boolean
     */
    private $bSortable;

    /**
     * Enable or disable the display of this column.
     *
     * @var boolean
     */
    private $bVisible;

    /**
     * The title of this column.
     *
     * @var null|string
     */
    private $sTitle;

    /**
     * This property is the rendering partner to mData
     * and it is suggested that when you want to manipulate data for display.
     *
     * @var null|mixed
     */
    private $mRender;

    /**
     * Class to give to each cell in this column.
     *
     * @var string
     */
    private $sClass;

    /**
     * Allows a default value to be given for a column's data,
     * and will be used whenever a null data source is encountered.
     * This can be because mData is set to null, or because the data
     * source itself is null.
     *
     * @var null|string
     */
    private $sDefaultContent;

    /**
     * Defining the width of the column.
     * This parameter may take any CSS value (em, px etc).
     *
     * @var null|string
     */
    private $sWidth;


    //-------------------------------------------------
    // Ctor.
    //-------------------------------------------------

    /**
     * Ctor.
     *
     * @param null|string $property An entity's property
     */
    public function __construct($property = null)
    {
        $this->property = $property;
    }


    //-------------------------------------------------
    // ColumnInterface
    //-------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * {@inheritdoc}
     */
    public function setMData($mData)
    {
        $this->mData = $mData;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMData()
    {
        return $this->mData;
    }

    /**
     * {@inheritdoc}
     */
    public function setBSearchable($bSearchable)
    {
        $this->bSearchable = $bSearchable;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBSearchable()
    {
        return $this->bSearchable;
    }

    /**
     * {@inheritdoc}
     */
    public function setBSortable($bSortable)
    {
        $this->bSortable = $bSortable;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBSortable()
    {
        return $this->bSortable;
    }

    /**
     * {@inheritdoc}
     */
    public function setBVisible($bVisible)
    {
        $this->bVisible = $bVisible;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBVisible()
    {
        return $this->bVisible;
    }

    /**
     * {@inheritdoc}
     */
    public function setSTitle($sTitle)
    {
        $this->sTitle = $sTitle;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSTitle()
    {
        return $this->sTitle;
    }

    /**
     * {@inheritdoc}
     */
    public function setMRender($mRender)
    {
        $this->mRender = $mRender;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMRender()
    {
        return $this->mRender;
    }

    /**
     * {@inheritdoc}
     */
    public function setSClass($sClass)
    {
        $this->sClass = $sClass;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSClass()
    {
        return $this->sClass;
    }

    /**
     * {@inheritdoc}
     */
    public function setSDefaultContent($sDefaultContent)
    {
        $this->sDefaultContent = $sDefaultContent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSDefaultContent()
    {
        return $this->sDefaultContent;
    }

    /**
     * {@inheritdoc}
     */
    public function setSWidth($sWidth)
    {
        $this->sWidth = $sWidth;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSWidth()
    {
        return $this->sWidth;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options)
    {
        if (array_key_exists('searchable', $options)) {
            $this->setBSearchable($options['searchable']);
        }
        if (array_key_exists('sortable', $options)) {
            $this->setBSortable($options['sortable']);
        }
        if (array_key_exists('visible', $options)) {
            $this->setBVisible($options['visible']);
        }
        if (array_key_exists('title', $options)) {
            $this->setSTitle($options['title']);
        }
        if (array_key_exists('render', $options)) {
            $this->setMRender($options['render']);
        }
        if (array_key_exists('class', $options)) {
            $this->setSClass($options['class']);
        }
        if (array_key_exists('default', $options)) {
            $this->setSDefaultContent($options['default']);
        }
        if (array_key_exists('width', $options)) {
            $this->setSWidth($options['width']);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaults()
    {
        $this->setMData($this->property);
        $this->setBSearchable(true);
        $this->setBSortable(true);
        $this->setBVisible(true);
        $this->setSTitle(null);
        $this->setMRender(null);
        $this->setSClass('');
        $this->setSDefaultContent(null);
        $this->setSWidth(null);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getClassName();
}