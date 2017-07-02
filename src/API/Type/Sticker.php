<?php

declare(strict_types=1);

namespace Telegram\API\Type;

use Telegram\API\Base\Abstracts\ABaseObject;

class Sticker extends ABaseObject {

    protected static $_IdProp = 'fileId';

    public static function GetDatamodel() : array {
        $datamodel = [
            'fileId'    => ['type' => ABaseObject::T_STRING, 'optional' => FALSE,    'external' => 'file_id'],
            'width'     => ['type' => ABaseObject::T_INT,    'optional' => FALSE,    'external' => 'width'],
            'height'    => ['type' => ABaseObject::T_INT,    'optional' => FALSE,    'external' => 'height'],
            'thumb'     => ['type' => ABaseObject::T_OBJECT, 'optional' => TRUE,     'external' => 'thumb', 'class' => PhotoSize::class],
            'fileName'  => ['type' => ABaseObject::T_STRING, 'optional' => TRUE,     'external' => 'file_name'],
            'emoji'     => ['type' => ABaseObject::T_STRING, 'optional' => TRUE,     'external' => 'emoji'],
            'fileSize'  => ['type' => ABaseObject::T_INT,    'optional' => TRUE,     'external' => 'file_size']
        ];
        return array_merge(parent::GetDatamodel(), $datamodel);
    }
}
