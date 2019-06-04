<?php

namespace Modules\Order\Dtos;

use Foundation\Abstracts\Dtos\Dto;

class CreateOrderData extends Dto
{
    /**
     * @var int $item_id
     */
    public $item_id;

    /**
     * @var int $style_id
     */
    public $style_id;

    /**
     * @var int $size_id
     */
    public $size_id;

    /**
     * @var string $item_name
     */
    public $item_name;

    /**
     * @var string $item_name
     */
    public $item_size;

    /**
     * @var string $item_url
     */
    public $item_url;

    /**
     * @var string $style
     */
    public $item_style;

    /**
     * @var string $item_image
     */
    public $item_image;

    /**
     * @var string $region
     */
    public $region;

    /**
     * @var bool
     */
    public $mobile_api;

    /**
     * @var bool
     */
    public $recaptcha_bypass;

    /**
     * @var float|int
     */
    public $checkout_delay;

    /**
     * @var null|float
     */
    public $checkout_duration;

    /**
     * @var float
     */
    public $atc_duration;

    /**
     * @var null|float
     */
    public $checkout_load_duration;

    /**
     * @var null|float
     */
    public $checkout_fill_duration;

    /**
     * @var float
     */
    public $checkout_response_duration;

    /**
     * @var string
     */
    public $status;
}
