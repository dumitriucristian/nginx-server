<?php

namespace App\Services;

use App\Entity\Classroom;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer
{


    public function serialize($classes, array $attributes = null)
    {

        $attributes = (empty($attributes)) ?? 'attributes' ;
        $serializer = new \Symfony\Component\Serializer\Serializer([new ObjectNormalizer()], [new JsonEncoder()]);

        $rsp = $serializer->serialize($classes, 'json',[
            AbstractNormalizer::IGNORED_ATTRIBUTES => ['password'],
            AbstractNormalizer::ATTRIBUTES => $attributes,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function($object, $format, $context) {
                return $object->getId();
            },
        ]);

        return $rsp;
    }

}