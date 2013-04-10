<?php
namespace E100\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use E100\CoreBundle\Entity\Note;
use E100\CoreBundle\Entity\Theme;
use E100\CoreBundle\Entity\Text;

/**
 * Import association table for associate a Non-de Rham property to a de Rham agency based on zipcode.
 */
class ImportCommentCommand extends ContainerAwareCommand
{


    protected function configure()
    {
        $this
            ->setName('e100:import:comment')
            ->setDescription('Import and update comment 1 to 100')
            ->addArgument('source', InputArgument::REQUIRED, 'EXCEL file (.xlsx)')
            ->addOption('language', null, InputOption::VALUE_REQUIRED, '[fr|en|de|?] (don\t used actually)', 'en')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        @ini_set('memory_limit', -1);

        $inputFileName = $input->getArgument('source');
        $language = $input->getOption('language');
        $em = $this->getDoctrine()->getEntityManager();

        /*
         Excel document structure
            1 Text unique ID (1 to 100) text->setId()
            2 Theme ID (1 to 20) text->setThemeId()
            3 skip it --- Texte no (column to skip, internal)
            4 skip it --- Text title in english
            5 Bible reference (Genèse 2,15-22) text->setBibleReference()
            6 skip it --- Titre de la section
            7 skip it --- Intro not use for now
            8 skip it --- Image not use for now
            9 AuthorName --- Auteur not use for now
           10 AuthorDescription --- Auteur infos not use for now
           11 Titre text->setTitle()
           12 Teaser question text->setTeaserQuestion()
           13 Texte biblique text->setBibleText() do the Mathieu function
           14 Commentaire text->setComment()
           15 Priere text->setActionText()
           16 Link text->setLink()
        */
        $phpExcel = \PHPExcel_IOFactory::load($inputFileName);
        $data = $phpExcel->getActiveSheet()->toArray(null,true,true,true);


        $texts = $this->getTextsIndexedByNumber();

        // remove first line
        unset($data[1]);

        foreach ($data as $i => $line) {
            $textNumber = (int) $line['A'];
            $bibleText = $this->formatVerset($line['M'], $line['E']);

            if (isset($texts[$textNumber])) {
                $text = $texts[$textNumber];
            } else {
                // create a new Text if not exists
                $text = new Text();
            }
            
            if(!empty($language)) {
                $text->setTranslatableLocale($language);
            }
            
            $text->setTheme($this->getThemeById($line['B']));
            $text->setTextNumber($textNumber);
            $text->setBibleRef($line['E']);
            $text->setTitle($line['K'] ?: '[empty]');
            $text->setTeaserQuestion($line['L'] ?:'[empty]');
            $text->setBibleText($bibleText ?: '[empty]');
            $text->setAuthorName($line['I'] ?: '[empty]');
            $text->setAuthorDescription($line['J'] ?: '[empty]');
            $text->setComment($line['N'] ?: '[empty]');
            $text->setActionText($line['O'] ?: '[empty]');
            $text->setLink($line['P']);

            $em->persist($text);
        }

        $em->flush();
    }

    private function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
    }

    private function getTextsIndexedByNumber()
    {
        $results = $this->getDoctrine()->getRepository('E100CoreBundle:Text')->findAll();
        $texts = array();

        foreach($results as $text) {
            $texts[$text->getTextNumber()] = $text;
        }

        return $texts;
    }

    private function getThemeById($numberId)
    {
        $theme = $this->getDoctrine()->getRepository('E100CoreBundle:Theme')->findOneById((int)$numberId);

        return $theme;
    }

    private function formatVerset($text, $versetRef = null)
    {
        // Pattern for begin of each text
        $pattern1 = '#^([0-9]+)#';
        // Pattern for indices in the text
        $pattern = '#([,.»\n:\?!”]\s?)([0-9]+-[0-9]+|[0-9]{1,2})(\s*)#';
        $text = preg_replace($pattern, '$1<sup>$2</sup>$3', $text);
        $text = preg_replace($pattern1, '<sup>$1</sup>', $text);

        return $text;
    }

}
