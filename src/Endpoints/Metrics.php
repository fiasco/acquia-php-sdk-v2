<?php

namespace AcquiaCloudApi\Endpoints;

use AcquiaCloudApi\Connector\ClientInterface;
use AcquiaCloudApi\Response\MetricsResponse;
use AcquiaCloudApi\Response\MetricResponse;

/**
 * Class Client
 * @package AcquiaCloudApi\CloudApi
 */
class Metrics implements CloudApi
{

    /** @var ClientInterface The API client. */
    protected $client;

    /**
     * Client constructor.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves aggregate usage data for an application.
     *
     * @return MetricsResponse
     * @param string $applicationUuid
     */
    public function getAggregateData($applicationUuid)
    {
        return new MetricsResponse($this->client->request(
            'get',
            "/applications/${applicationUuid}/metrics/usage/data"
        ));
    }

    /**
     * Retrieves aggregate usage metric data for an application.
     *
     * @return MetricResponse
     * @param string $applicationUuid
     * @param string $usageMetric
     */
    public function getAggregateUsageMetrics($applicationUuid, $usageMetric)
    {
        return new MetricResponse($this->client->request(
            'get',
            "/applications/${applicationUuid}/metrics/usage/${usageMetric}"
        ));
    }

    /**
     * Retrieves usage data for an application, broken down by environment.
     *
     * @return MetricsResponse
     * @param string $applicationUuid
     */
    public function getDataByEnvironment($applicationUuid)
    {
        return new MetricsResponse($this->client->request(
            'get',
            "/applications/${applicationUuid}/metrics/usage/data-by-environment"
        ));
    }

    /**
     * Retrieves views data for an application, broken down by environment.
     *
     * @return MetricsResponse
     * @param string $applicationUuid
     */
    public function getViewsByEnvironment($applicationUuid)
    {
        return new MetricsResponse($this->client->request(
            'get',
            "/applications/${applicationUuid}/metrics/usage/views-by-environment"
        ));
    }

    /**
     * Retrieves visits data for an application, broken down by environment.
     *
     * @return MetricsResponse
     * @param string $applicationUuid
     */
    public function getVisitsByEnvironment($applicationUuid)
    {
        return new MetricsResponse($this->client->request(
            'get',
            "/applications/${applicationUuid}/metrics/usage/visits-by-environment"
        ));
    }
}
