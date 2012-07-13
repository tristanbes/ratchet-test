<?php

namespace Veille\ChatBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Ratchet\Server\IoServer;
use Veille\ChatBundle\Controller\RatchetController;
use Ratchet\WebSocket\WsServer;

class LaunchServerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('server:launch')
            ->setDescription('Lance le serveur ratchet');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $server = IoServer::factory(
            new WsServer(
                new RatchetController()
            )
          , 8000
        );

        $server->run();
    }
}
