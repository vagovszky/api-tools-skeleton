<?php
return [
    'doctrine' => [
        'driver' => [
            'my_annotation_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => __DIR__.'/../src/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'DoctrineTest\\Entity' => 'my_annotation_driver',
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'doctrine-test.rest.doctrine.planet' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/planet[/:planet_id]',
                    'defaults' => [
                        'controller' => 'DoctrineTest\\V1\\Rest\\Planet\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            0 => 'doctrine-test.rest.doctrine.planet',
        ],
    ],
    'api-tools-rest' => [
        'DoctrineTest\\V1\\Rest\\Planet\\Controller' => [
            'listener' => \DoctrineTest\V1\Rest\Planet\PlanetResource::class,
            'route_name' => 'doctrine-test.rest.doctrine.planet',
            'route_identifier_name' => 'planet_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'planet',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \DoctrineTest\Entity\Planet::class,
            'collection_class' => \DoctrineTest\V1\Rest\Planet\PlanetCollection::class,
            'service_name' => 'Planet',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'DoctrineTest\\V1\\Rest\\Planet\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'DoctrineTest\\V1\\Rest\\Planet\\Controller' => [
                0 => 'application/vnd.doctrine-test.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'DoctrineTest\\V1\\Rest\\Planet\\Controller' => [
                0 => 'application/vnd.doctrine-test.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            \DoctrineTest\Entity\Planet::class => [
                'route_identifier_name' => 'planet_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'doctrine-test.rest.doctrine.planet',
                'hydrator' => 'DoctrineTest\\V1\\Rest\\Planet\\PlanetHydrator',
            ],
            \DoctrineTest\V1\Rest\Planet\PlanetCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'doctrine-test.rest.doctrine.planet',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools' => [
        'doctrine-connected' => [
            \DoctrineTest\V1\Rest\Planet\PlanetResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'DoctrineTest\\V1\\Rest\\Planet\\PlanetHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'DoctrineTest\\V1\\Rest\\Planet\\PlanetHydrator' => [
            'entity_class' => \DoctrineTest\Entity\Planet::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'api-tools-content-validation' => [
        'DoctrineTest\\V1\\Rest\\Planet\\Controller' => [
            'input_filter' => 'DoctrineTest\\V1\\Rest\\Planet\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'DoctrineTest\\V1\\Rest\\Planet\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
