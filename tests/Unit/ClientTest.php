<?php

namespace Laradocs\Tests\Unit;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Response;
use Laradocs\Moguding\Client;
use PHPUnit\Framework\TestCase;
use Mockery;

class ClientTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testLogin(): void
    {
        $factory = Mockery::mock(Client::class . '[client]');
        $factory->shouldReceive('client')->andReturn($this->client());
        $data = $factory->login('android', 'xxx', 'xxx');

        $this->assertNotEmpty($data);
        $this->assertSame('student', $data ['userType']);
    }

    public function testGetPlan(): void
    {
        $factory = Mockery::mock(Client::class . '[client]');
        $factory->shouldReceive('client')->andReturn($this->client());
        $data = $factory->getPlan('xxx', 'student', 1);

        $this->assertNotEmpty($data);
        $this->assertSame("987654", $data [0]['planId']);
    }

    public function testSave(): void
    {
        $factory = Mockery::mock(Client::class . '[client]');
        $factory->shouldReceive('client')->andReturn($this->client());
        $data = $factory->save('123456', '10000', 'xxx', 'xxx', 'xxxxxxxxxx', 100.000000, 10.000000, 'xxx', 'xxxx', '987654');

        $this->assertNotEmpty($data);
        $this->assertSame('2022-01-15 11:35:58', $data ['createTime']);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSctSend(): void
    {
        $factory = Mockery::mock(Client::class);
        $factory->shouldReceive('sctSend');
        $factory->sctSend('xxx', '标题', '后文');
    }

    protected function client(): Guzzle
    {
        $factory = Mockery::mock(Guzzle::class);
        $factory->shouldReceive('post')->withAnyArgs()->andReturnUsing(function ($url) {
            if (str_contains($url, 'login')) {
                $body = file_get_contents(__DIR__ . '/../login.json');
            }
            if (str_contains($url, 'getPlanByStu')) {
                $body = file_get_contents(__DIR__ . '/../get_plan_by_stu.json');
            }
            if (str_contains($url, 'save')) {
                $body = file_get_contents(__DIR__ . '/../save.json');
            }

            return new Response(body: $body);
        });

        return $factory;
    }
}
