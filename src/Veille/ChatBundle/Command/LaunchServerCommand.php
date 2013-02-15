<?php

namespace Veille\ChatBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Veille\ChatBundle\Controller\RatchetController;


class LaunchServerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('ratchet:launch')
            ->setDescription('Launch the Ratchet server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $server = IoServer::factory(new WsServer(new RatchetController), 8080);
        $server->run();
    }
}
