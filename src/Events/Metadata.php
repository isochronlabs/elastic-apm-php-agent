<?php

namespace PhilKra\Events;

use PhilKra\Agent;
use PhilKra\Helper\Config;

/**
 *
 * Metadata Event
 *
 * @link https://www.elastic.co/guide/en/apm/server/7.3/metadata-api.html
 *
 */
class Metadata extends EventBean implements \JsonSerializable
{

    /**
     * @var Config
     */
    private $config;

    /**
     * @param array $contexts
     * @param Config $config
     */
    public function __construct($contexts, $config)
    {
        parent::__construct($contexts);
        $this->config = $config;
    }

    /**
     * Generate request data
     *
     * @return array
     */
    final public function jsonSerialize()
    {
        $framework_name = $this->config->get('framework');

        if ( ! isset($framework_name)) {
            $framework_name = '';
        }

        $framework_version = $this->config->get('frameworkVersion');

        if ( ! isset($framework_version)) {
            $framework_version = '';
        }

        return [
            'metadata' => [
                'service' => [
                    'name'    => $this->config->get('appName'),
                    'version' => $this->config->get('appVersion'),
                    'framework' => [
                        'name' => $framework_name,
                        'version' => $framework_version,
                    ],
                    'language' => [
                        'name'    => 'php',
                        'version' => phpversion()
                    ],
                    'process' => [
                        'pid' => getmypid(),
                    ],
                    'agent' => [
                        'name'    => Agent::NAME,
                        'version' => Agent::VERSION
                    ],
                    'environment' => $this->config->get('environment')
                ],
                'system' => [
                    'hostname'     => $this->config->get('hostname'),
                    'architecture' => php_uname('m'),
                    'platform'     => php_uname('s')
                ]
            ]
        ];
    }

}
