<?php
namespace SmoothPhp\Test\CommandBus;

/**
 * Class CommandTest
 * @author Simon Bennett <simon.bennett@smoothphp.com>
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function build_command_test()
    {
        $command = new TestCommand();

        $this->assertContains('SmoothPhp\Test\CommandBus\TestCommand:', (string)$command);

        $this->assertRegExp("/^(\{)?[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}(?(1)\})$/i",$command->getCommandId());
    }

    /**
     * @test
     */
    public function id_is_always_the_same_for_a_given_command()
    {
        $command = new TestCommand;
        $this->assertSame($command->getCommandId(), $command->getCommandId());

        $command2 = new TestCommand;
        $this->assertSame($command2->getCommandId(), $command2->getCommandId());

        $this->assertNotEquals($command->getCommandId(), $command2->getCommandId());
    }
}

