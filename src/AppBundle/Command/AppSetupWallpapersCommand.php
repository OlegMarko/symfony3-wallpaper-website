<?php

namespace AppBundle\Command;

use AppBundle\Entity\Wallpaper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppSetupWallpapersCommand extends Command
{
    /**
     * @var string
     */
    private $rootDir;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * AppSetupWallpapersCommand constructor.
     *
     * @param string $rootDir
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(string $rootDir = null, EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->rootDir = $rootDir;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setName('app:setup-wallpapers')
            ->setDescription('Console command descriptions.');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $wallpapers = glob($this->rootDir . '/../web/images/*.*');
        $wallpaperCount = count($wallpapers);

        $io->title('Import images');
        $io->progressStart($wallpaperCount);

        $fileNames = [];
        foreach ($wallpapers as $item) {

            [
                'basename' => $filename,
                'filename' => $slug
            ] = pathinfo($item);

            [
                0 => $width,
                1 => $height
            ] = getimagesize($item);

            $wp = (new Wallpaper())
                ->setFilename($filename)
                ->setSlug($slug)
                ->setWidth($width)
                ->setHeight($height)
            ;

            $this->entityManager->persist($wp);

            $io->progressAdvance(1);
            $fileNames[] = [$filename];
        }

        $this->entityManager->flush();

        $io->progressFinish();

        $table = new Table($output);
        $table
            ->setHeaders(['file name'])
            ->setRows($fileNames)
        ;
        $table->render();

        $io->success(sprintf('Cool, we added %d wallpapers', $wallpaperCount));
    }

}
