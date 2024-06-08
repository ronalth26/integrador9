<?php

return [
    'messages' => [
        'welcome' => '¡Bienvenido a nuestra aplicación!',
        'msg1' => 'Usuario actualizado correctamente',
        'alertDelete' => 'Usuario eliminado correctamente',
        'feedbackMsgSuccess' => 'Feedback enviado correctamente',
    ],
    'functions' => [],
    'words' => [
        'hello' => 'Hola',
    ],
    //$this->estados['aprobado'];
    'estados' => [
        'activo' => 1,
        'desactivo' => 0,

        'PENDIENTE_DE_REVISION' => 1,
        'EN_PROCESO' => 2,
        'APROBADA' => 3,
        'RECHAZADA' => 4,
        'ACTIVA' => 5,
        'SUSPENDIDA' => 6,
        'REVOCADA' => 7,
        'VENCIDA' => 8,
        'RENOVACION_PENDIENTE' => 9,
        'RENOVADA ' => 10,
        'EXTRAVIADA ' => 11,
        'DUPLICADO_SOLICITADO ' => 12,

    ],
];