<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class Loguin extends TestCase
{
    public function testCanBeCreatedFromValidemailAddress(): void
    {
        $this->assertInstanceOf(
            UserData::class,
            Password::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromgetbyMail(): void
    {
        $this->expectException(GetbyMail::class);
        email::fromString('invalid');
    }
    }
}
