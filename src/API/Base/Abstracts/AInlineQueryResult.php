<?php

declare(strict_types=1);

namespace Telegram\API\Base\Abstracts;

use Telegram\API\InlineQuery;

abstract class AInlineQueryResult extends ABaseObject {

    protected static $_IdProp = 'id';

    public static function GetDatamodel() : array {
        $datamodel = [
            'type'                  => ['type' => ABaseObject::T_STRING,    'optional' => FALSE, 'external' => 'type'],
            'id'                    => ['type' => ABaseObject::T_STRING,    'optional' => FALSE, 'external' => 'id'],
            'title'                 => ['type' => ABaseObject::T_STRING,    'optional' => FALSE, 'external' => 'title'],
            'replyMarkup'           => ['type' => ABaseObject::T_OBJECT,    'optional' => TRUE,  'external' => 'reply_markup',          'class' => Type\InlineKeyboardMarkup::class],
            'inputMessageContent' => ['type' => ABaseObject::T_OBJECT,    'optional' => TRUE,  'external' => 'input_message_content', 'class' => [InlineQuery\Type\InputTextMessageContent::class, InlineQuery\Type\InputLocationMessageContent::class, InlineQuery\Type\InputVenueMessageContent::class, InlineQuery\Type\InputContactMessageContent::class]],
        ];
        return array_merge(parent::GetDatamodel(), $datamodel);
    }
}
