<?php

declare(strict_types=1);

namespace Telegram\API\Type;

use Telegram\API\Base\Abstracts\ABaseObject;

class Audio extends ABaseObject {

    protected static $_IdProp = 'fileId';

    public static function GetDatamodel() : array {
        $datamodel = [
            'fileId'    => ['type' => ABaseObject::T_STRING,    'optional' => FALSE,    'external' => 'file_id'],
            'duration'  => ['type' => ABaseObject::T_INT,       'optional' => FALSE,    'external' => 'duration'],
            'performer' => ['type' => ABaseObject::T_STRING,    'optional' => TRUE,     'external' => 'performer'],
            'title'     => ['type' => ABaseObject::T_STRING,    'optional' => TRUE,     'external' => 'title'],
            'mimeType'  => ['type' => ABaseObject::T_STRING,    'optional' => TRUE,     'external' => 'mime_type'],
            'fileSize'  => ['type' => ABaseObject::T_INT,       'optional' => TRUE,     'external' => 'file_size']
        ];
        return array_merge(parent::GetDatamodel(), $datamodel);
    }
}
