<?php

namespace AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

use AdminBundle\Controller as Load;

class LoadInfoflotShipCommand extends ContainerAwareCommand
{

	private $container; 
	


    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            // a good practice is to use the 'app:' prefix to group all your custom application commands
            ->setName('loadinfoflot:ship')
			->setDescription('Загрузка теплохода, его описания и круизы с сайта Инфофлота')
			->addArgument('id')	
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id= $input->getArgument('id');

        $text = 'Hello '.$id;
		$load = $this->getContainer()->get('admin.loadshipinfoflot');
		//$load->load(10);


        $output->writeln($load->loadShip($id));
    }
	
}